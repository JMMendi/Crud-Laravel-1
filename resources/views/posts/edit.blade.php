@extends('plantillas.principal')
@section('titulo')
Modificar Post
@endsection
@section('cabecera')
Modificar Post
@endsection
@section('contenido')


<form class="max-w-sm mx-auto" action="{{route('posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-5">
        <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
        <input type="titulo" value="{{old('titulo', $post->titulo)}}" id="titulo" name="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        @error('titulo')
            <x-error>
                {{$message}}
            </x-error>
        @enderror
    </div>
    <div class="mb-5">
        <label for="contenido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
        <textarea id="contenido" name="contenido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('contenido', $post->contenido)}}</textarea>
        @error('contenido')
            <x-error>
                {{$message}}
            </x-error>
        @enderror
    </div>
    <div class="mb-2">
        <input id="publicado" type="radio" name="categoria" @checked(@old("categoria", $post->categoria) == "Publicado") value="Publicado"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="publicado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-4">Publicado</label>
        <input id="borrador" type="radio" name="categoria" @checked(@old("categoria", $post->categoria) == "Borrador") value="Borrador" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="borrador" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-4">Borrador</label>
        @error('categoria')
            <x-error>
                {{$message}}
            </x-error>
        @enderror
    </div>

    <div class="mt-4 flex justify-between">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modificar</button>
        <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <a href="{{route('posts.index')}}">Volver</a>
        </button>
    </div>

</form>

@endsection