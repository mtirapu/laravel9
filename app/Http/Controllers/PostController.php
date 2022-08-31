<?php

namespace App\Http\Controllers;

// Importamos el archivo que representa a la tabla (Modelo).
// Nuestros archivos.
use App\Models\Post;

// Archivos propios del FrameWork.
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', ['post' => $post]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            // Definimos que solamente sea unico el campo slug.
            'slug'  => 'required|unique:posts,slug',
            'body'  => 'required'
        ]);

        // Creamos el registro.
        $post = $request->user()->posts()->create([

            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body

        ]);

        return redirect()->route( 'posts.edit', $post );
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:posts,slug,' . $post->id,
            'body' => 'required'
        ]);
        
        // Creamos el registro.
        $post->update([

            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body

        ]);

        return redirect()->route( 'posts.edit', $post );
    }



    /* Dentro de los parentesis declaramos lo que va a 
        recibir esta funcion. En este caso, recibira el
        post que se va a eliminar. */
    public function destroy(Post $post)
    {
        $post->delete();

        // Retornamos a la ruta anterior.
        return back();
    }
}
