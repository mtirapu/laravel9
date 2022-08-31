<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/* 
    Route::get      -> Consultar
    Route::post     -> Guardar una informacion
    Route::delete   -> Eliminar
    Route::put      -> Actualizar
*/

/* Si nos dirigimos a la direccion / (raiz), obtendremos la vista view->welcome 
Route::get('/', [PageController::class, 'home'] )->name('home');

Route::get('blog', [PageController::class, 'blog'] )->name('blog');


/* Podemos enviar una variable ($slug) a la funcion e imprimirla
Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');

*/

/* Para no estar repitiendo el nombre del controlador, utilizamos
    los grupos. */

Route::controller(PageController::class)->group( function () {

    Route::get('/',             'home' )->name('home');

    Route::get('blog',          'blog' )->name('blog');

    Route::get('blog/{post:slug}',   'post' )->name('post');

} );

Route::resource('posts', PostController::class)->except('show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
