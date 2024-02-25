<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('test', 'tailwindcss')->name('test');
    Route::view('e-commence/products', 'products')->name('e-commence.products');

    Route::view('form', 'form')->name('form');

});

Route::view('/', 'welcome');
Route::get('/search-options', function (){
    $res = [
        'results' => [
            [
                'id' => 1,
                'text' => '11111111'
            ],
            [
                'id' => 2,
                'text' => '222222222'
            ],
            [
                'id' => 3,
                'text' => '33333333'
            ],
        ]
    ];


    return json_encode($res);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
