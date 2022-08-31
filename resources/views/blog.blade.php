@extends('template')

    @section('content')
        <h1>Listado</h1>
        
        <!-- Tomamos la variable enviada en las rutas. -->
        @foreach ($posts as $post)
            
        <p>
            <strong> {{ $post->id }} </strong>
            <a href=" {{ route('post', $post->slug ) }} "> {{ $post->title }} </a>
            <form action="{{ route('posts.destroy', $post) }} " method="POST" >
            
                 @csrf
                @method('DELETE')

                <input  type="submit"
                        value="Eliminar"
                        class="bg-gray-800 text-white rounded px-4 py-2"
                        onclick="return confirm('Desea eliminar?')">

            </form>
        </p>

        <br>

        <span> {{ $post->user->name }} </span>

        

        @endforeach

        {{ $posts->links() }}

    @endsection