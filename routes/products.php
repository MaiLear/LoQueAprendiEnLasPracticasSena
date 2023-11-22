<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/get', [ProductController::class, 'getData'])->name('products.get')->middleware('auth.admin');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/prueba/{id}', function($id){
    return "Este es el numero de".$id;
});

Route::get('/products/prueba/{name}', function($name){
    return "Hola".$name;
})->where('name', '[a-zA-Z]+');


Route::resource('products', ProductController::class)->except([
    'destroy','index'
])->middleware('auth.admin');
