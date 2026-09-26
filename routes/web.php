<?php

use App\Http\Controllers\Admincontroller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});






Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth');


Route::get('/', [HomeController::class, 'index']);



Route::get('/products',[Admincontroller::class, 'products']);




Route::post('/uploadproduct',[Admincontroller::class, 'uploadproduct']);

Route::get('/showproduct',[Admincontroller::class, 'showproduct']);

Route::get('/deleteproduct/{id}',[Admincontroller::class, 'deleteproduct']);

Route::get('/updateview/{id}',[Admincontroller::class, 'updateview']);

Route::post('/updateproduct/{id}',[Admincontroller::class, 'updateproduct']);

Route::get('/search',[HomeController::class, 'search']);

Route::post('/addcard/{id}',[HomeController::class, 'addcard']);

Route::get('/showcart',[HomeController::class, 'showcart']);

Route::get('/remove/{id}',[HomeController::class, 'remove']);

Route::post('/order',[HomeController::class, 'confirmorder']);

Route::get('/showorder',[Admincontroller::class, 'showorder']);

Route::get('/updatestatus/{id}',[Admincontroller::class, 'updatestatus']);