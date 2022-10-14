<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Post;  //hace referencia a la clase Post.php

class PageController extends Controller
{
    public function posts()
    {
        return view('posts', [

            'posts' => Post::with('user')->latest()->paginate()  // usamos paginacion

        ]);
    }

    public function post(Post $post)
    {
      return view('post', [ 'post' => $post ]);
    }
}
