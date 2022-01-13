<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* mandamos a llamar a nuestro modelos */
use App\User;
use App\Category;
use App\Images;
use App\Article;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* obtenemos nuestros usuarios con el metodo count */
        $users = User::count();
        $categoryes = Category::count();
        $images = Images::count();
        $articles = Article::count();
        //dd ($articles);
        //dd(User::count());
        //dd ($images);
        return view('index', [
            'users' => $users,
            'categoryes' => $categoryes,
            'images' => $images,
            'articles' => $articles

        ]);
    }

    /* obtener cuanto usuarios hay dentro de base de datos */


}
