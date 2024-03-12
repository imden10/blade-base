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

Route::group(['prefix' => 'filemanager', 'middleware' => ['auth', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::get('/multimedia/files', [\App\Http\Controllers\FileManagerController::class, 'file'])->name('multimedia.files');
    Route::get('/multimedia/images', [\App\Http\Controllers\FileManagerController::class, 'image'])->name('multimedia.images');
    Route::get('/multimedia/get-info', [\App\Http\Controllers\FileManagerController::class, 'getInfo'])->name('multimedia.get-info');
    Route::get('/multimedia/get-info-file', [\App\Http\Controllers\FileManagerController::class, 'getInfoFile'])->name('multimedia.get-info-file');


    Route::view('test', 'tailwindcss')->name('test');
    Route::view('e-commence/products', 'products')->name('e-commence.products');

    Route::view('form', 'form', ['breadcrumb' => [
        [
            'title' => 'Форми'
        ]
    ]])->name('form');

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
