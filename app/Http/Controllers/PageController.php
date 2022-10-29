<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Post;  //hace referencia a la clase Post.php

class PageController extends Controller
{
    public function posts()
    {
        //Esta vista retorna todos los posts en plural
       return view('posts', [

            'posts' => Post::with('user')->latest()->paginate()
            /**
             * Usamos paginate para que los datos retornen con una estructura de paginacion
             *
             */

        ]);
    }


    //Esta vista retorna solo una vista un unico post cuando damos click en leer mas

    public function post(Post $post) //'blog/{post}' es el mismo argumento que pasamos en las rutas
    {
      return view('post', [ 'post' => $post ]);
    }

    /**
     * recordar hacer las relaciones en la clases: poost.php y user.php
     * si es de 1 a 1 o de M a M
     *
    */

}
