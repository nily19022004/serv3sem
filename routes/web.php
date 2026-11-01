<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('main/hello');
});

Route::get('/about', function () {
    return view('main/about');
});

Route::get('/contact', function(){
    $contact = [
        'name' => 'Polytech',
        'adres' => 'B.Semenovskaya',
        'phone' => '8(495) 423-2323',
        'email'=> '@mospolytech.ru',
    ];
    return view('main/contact', ['contact' => $contact]);
});