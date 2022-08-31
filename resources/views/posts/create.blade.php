<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- El método en la ruta será UPDATE y se le enviará un $post para editar su información. -->
                    <!-- El method va a ser POST porque queremos alterar la BD. -->
                    <form action=" {{ route('posts.store', $post) }} " method="POST">

                        <!-- El guión bajo lo usamos para hacer referencia a una vista que no funciona directamente.  -->
                        <!-- Sino que funciona como parte de otra.  -->
                        @include('posts._form')

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
