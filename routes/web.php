<?php

use Illuminate\Support\Facades\Route;

/* 
    Route::get      -> Consultar
    Route::post     -> Guardar una informacion
    Route::delete   -> Eliminar
    Route::put      -> Actualizar
*/

/* Si nos dirigimos a la direccion / (raiz), obtendremos la vista view->welcome */
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('blog', function () {

    /* Como necesitamos un listado de las publicaciones,
        vamos a realizar una consulta a la BD */

    // Consulta BD

    $posts = [
        [ 'id' => 1, 'title' => 'PHP', 'slug' => 'php'],
        [ 'id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
    ];

    /* Vamos a devolver una vista y tambien un array con los posts. */
    return view('blog', [ 'posts' => $posts ]);
})->name('blog');


/* Podemos enviar una variable ($slug) a la funcion e imprimirla */
Route::get('blog/{slug}', function ($slug) {

    // Consulta a BD

    $post = $slug;

    return view('post', [ 'post' => $post ]);
})->name('post');