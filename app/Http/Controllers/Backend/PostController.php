<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest; //Cambiamos al nombre del resquest que creamos


//Esta clase la importamos para eliminar una imagen
use Illuminate\Support\Facades\Storage;

/**
 * Una vez tengamos exportada la clase nos vamos al metodo de actualizar(update)
 * y hacemos la configuraciones lo mismo para la clase destroy
 *
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //Listamos todos los post

     $posts = Post::orderBy('id', 'desc')->get();


      return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
    {   //Retorna la vista que esta en la carpeta: 'posts con el nombre create' VERIFICAR
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //salvar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ]+ $request->all());

        //mage

        if($request->file('file')){
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }


        //retornar

        return back()->with('status', 'Creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
     return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */


    public function update(PostRequest $request, Post $post)
    {
        /**
         * dd es un helper de laravel que muestra como recibimos los datos
         * tambien nos sirve para encontrar errores mas facilmente.
         */
        //dd($request->all());
        $post->update($request->all());


        if($request->file('file')){
            //Eliminar imagen
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }
        return back()->with('status', 'Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    //configuramos la funcion de eliminar


    public function destroy(Post $post)
    {
        //Eliminacion de la imagen

        Storage::disk('public')->delete($post->image);//cuando se elimine un post que tambien se elimine la imagen
        $post->delete();

        return back()->with('status', 'Eliminado con exito');
    }
}
