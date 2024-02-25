<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\MongoDB\Order;
use App\Models\MongoDB\Show;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class ShowController extends Controller
{
    public function router(Request $request, ?string $showId = null): View|JsonResponse|RedirectResponse
    {
        if ($request->isMethod('post') && !\is_null($showId)) {
            return $this->buy($request, $showId);
        } else if ($request->isMethod('get') && !\is_null($showId)) {
            return $this->show($request, $showId);
        } else {
            return $this->shows($request);
        }
    }

    private function shows(Request $request): View
    {
        $shows = Show::whereBetween(
            'start_at',
            [(new \DateTime()), (new \DateTime())->add(new \DateInterval('P60D'))]
        )->orderBy('start_at')->get();

        return view('shows', [
            'metadata' => [
                'h1' => 'Вистави - Театральний Портал',
                'title' => 'Вистави - Театральний Портал',
                'description' => 'Дізнайтеся про найновіші вистави на Театральному Порталі та оберіть ту, яка зацікавить вас найбільше. Купуйте квитки та отримуйте неповторний театральний досвід.',
                'keywords' => 'вистави, театр, афіша, квитки, театральний портал',
            ],
            'shows' => $shows,
        ]);
    }

    private function show(Request $request, string $showId): View|RedirectResponse
    {
        $show = Show::find($showId);

        if (\is_null($show)) {
            return redirect()->route('shows');
        }

        $metadata = $show->meta->toArray();
        $hall = $show->hall;
        $gallery = $show->gallery()->get();
        $occupiedSeats = $show->orderSeats()->get()->pluck('seat')->toArray();

        return view('show', [
            'show' => $show,
            'gallery' => $gallery,
            'metadata' => $metadata,
            'hall' => $hall,
            'occupied_seats' => $occupiedSeats
        ]);
    }

    private function buy(Request $request, string $showId): JsonResponse
    {
        $show = Show::find($showId);

        if (\is_null($show)) {
            return response()->json(['message' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.'], 403);
        }

        $hall = $show->hall;

        $data = $request->validate(
            [
                'full_name' => [
                    'required',
                    'bail',
                    'string',
                    'max:255',
                    'regex:/^[АаБбВвГгҐґДдЕеЄєЖжЗзИиІіЇїЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЬьЮюЯяA-Z\'\-ʼ.\s]+$/i',
                ],
                'phone' => [
                    'required',
                    'bail',
                    'string',
                    'max:13',
                    'regex:/^(\+380)[0-9]{9}$/i',
                ],
                'email' => [
                    'required',
                    'bail',
                    'string',
                    'max:255',
                    'email',
                ],
                'comment' => [
                    'bail',
                    'string',
                    'nullable',
                    'max:500',
                    'regex:/^[АаБбВвГгҐґДдЕеЄєЖжЗзИиІіЇїЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЬьЮюЯяA-Z\'\-ʼ.\s]+$/i',
                ],
                'seats' => [
                    'required',
                    'bail',
                    'array',
                    'min:1',
                ],
                'seats.*' => [
                    'required',
                    'bail',
                    'integer',
                    'min:1',
                    'max:' . $hall->seats,
                ],
            ],
            [
                'seats.required' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
                'seats.array' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
                'seats.min' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
                'seats.*.required' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
                'seats.*.integer' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
                'seats.*.min' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
                'seats.*.max' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.',
            ],
        );

        $seats = $data['seats'];

        // TODO: У MongoDB не працюють транзакції. Потребує перевірки.
        try {
//            DB::beginTransaction();

            if ($show->orderSeats()->whereIn('seat', $seats)->count() > 0) {
//                DB::rollBack();

                return response()->json([
                    'message' => 'Одне із обраних вами місць уже зайняте. Оновіть сторінку, та оберіть місце із переліку вільних місць.'
                ], 403);
            }

            $order = Order::create([
                'show_id' => $showId,
                'full_name' => $data['full_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'comment' => $data['comment'],
            ]);

            $orderId = $order->getKey();

            $show->orderSeats()->createMany((function() use ($seats, $showId, $orderId) {
                $result = [];

                foreach ($seats as $seat) {
                    $result[] = ['seat' => $seat, 'show_id' => $showId, 'order_id' => $orderId];
                }

                return $result;
            })());

//            DB::commit();
        } catch (\Exception $exception) {
//            DB::rollBack();
            Log::critical($exception->getMessage());

            return response()->json(['message' => 'Щось пішло не так. Оновіть сторінку, щоб повторити спробу.'], 403);
        }

        $request->session()->flash(
            'alerts',
            [['level' => 'success', 'message' => 'Замовлення успішно створено і оплачено. Квитки відправлені на вашу адресу електронної пошти.']]
        );

        return response()->json(['redirect' => URL::route('shows', ['id' => $showId])]);
    }
}
