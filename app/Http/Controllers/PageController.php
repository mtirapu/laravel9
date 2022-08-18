<?php

// Esta es la ruta de este controlador.
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


/* Este controlador se va a encargar de administrar
    las paginas de nuestro proyecto. */

class PageController extends Controller
{
    public function home() {

        return view('home');

    }

    public function blog() {
        
        // Traemos los Post.

        // $posts = Post::get();
        //$post = Post::first();
        //$post = Post::find(25);

        //dd($post);

        $posts = Post::latest()->paginate();

        

        /* Vamos a devolver una vista y tambien un array con los posts. */
        return view('blog', [ 'posts' => $posts ]);

    }

    public function post( Post $post ) {

        return view('post', [ 'post' => $post ]);

    }
}
