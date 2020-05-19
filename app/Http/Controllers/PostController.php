<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts() {
      // el metodo load pemite obtener del usuario de cada post despues de ejecutar la consulta de eloquent  cada relacion debe pasar por ese metodo
      // el metodo with es antes de ejecutar la consuta eloquent
      return view('posts/index', [ 'posts' => post::with('user')->latest()->paginate()]);
    }

  public function post(post $post) {

    return view('posts/show', [ 'post' =>$post ]);
  }
}
