<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ContactsController extends Controller
{
    public function __invoke() {
        return view('contacts', [
            'metadata' => [
                'h1' => 'Театральний Портал',
                'title' => 'Контакти - Театральний Портал',
                'description' => 'Зв\'яжіться з Театральним Порталом за допомогою контактної інформації. Ми завжди раді вам надати інформацію про театральні вистави та допомогти з покупкою квитків.',
                'keywords' => 'контакти, театр, театральний портал, зв\'язок',
            ],
        ]);
    }
}
