<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // return view ('posts.index', ['posts' => $posts]);
        return view ('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'titulo' => ['required', 'string', 'min:5', 'max:80', 'unique:posts,titulo'],
            'contenido' => ['required', 'string', 'min:5', 'max:250'],
            'categoria' => ['required', 'in:Publicado,Borrador'],
        ]);
        // Si la validación falla nos devuelve automaticamente a create
        // 2- Insertamos los datos
        Post::create($request->all());
        // 3- Volvemos al index y mandamos un mensaje con sweetalert2
        return redirect()->route('posts.index')->with('mensaje', 'Se ha creado un post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // return view('posts.edit', ['post' => $post]);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validamos los datos
        $request->validate([
            'titulo' => ['required', 'string', 'min:5', 'max:80', 'unique:posts,titulo,'.$post->id], // No dejar espacios en blanco, todo pegado
            'contenido' => ['required', 'string', 'min:5', 'max:250'],
            'categoria' => ['required', 'in:Publicado,Borrador'],
        ]);
        // Si la validación falla nos devuelve automaticamente a update
        // 2- Insertamos los datos
        $post->update($request->all());
        // 3- Volvemos al index y mandamos un mensaje con sweetalert2
        return redirect()->route('posts.index')->with('mensaje', 'Se ha modificado el post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('mensaje', 'Se ha eliminado el post');

    }
}
