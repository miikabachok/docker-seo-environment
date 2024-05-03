<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\MongoDB\Show;

class IndexController extends Controller
{
    public function __invoke() {
        return view('about-us', [
            'shows' => Show::orderBy('start_at')->get(),
            'metadata' => [
                'h1' => 'Театральний Портал',
                'title' => 'Театральний Портал - Ваш вхід до світу неповторних вистав',
                'description' => 'Ласкаво просимо на Театральний Портал - ваш вхід до світу захоплюючих вистав. Дізнайтеся про найновіші вистави, купуйте квитки та насолоджуйтеся неповторною атмосферою театру.',
                'keywords' => 'театр, вистави, квитки, афіша, театральний портал',
            ],
        ]);
    }
}
