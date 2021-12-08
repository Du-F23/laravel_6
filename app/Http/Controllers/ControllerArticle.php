<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use App\Images;
use Illuminate\Http\Request;

class ControllerArticle extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::latest()->paginate(20);
        return view('Articles.index',[
            'articles'=> $articles
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article;
        $categorias = Category::select('id', 'name')->orderBy('name')->get();
        $imagenes = Images::select('id', 'name')->orderBy('name')->get();
        return view('article.form', compact('article', 'categorias', 'imagenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Article::create([
        'title'=>$request->title,
        'img'=>$request->img,
        'subtitle'=>$request->subtitle,
        'body'=>$request->body,
        'category_id'=>$request->category_id,
        'img_id'=>$request->img_id
        ]);
        return ('el article se dio de alta de manera correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //obtines el article
        $categoria= Category::find($id);
        $article = Article::find($id);

        return $article;

        return view('article.edit',[
            '$articel' => $article,
            '$categoria' => $categorias
        ]);

    }

    public function edit($id)
    {
         $article = Article::findOrFail($id);
            //return $article;
            //printr ($article);
            return view('Articles.show',['article'=>$article]);
    }


    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

            $article->update($request->all());

            //return back();

            return redirect('/articles')->with('mesageUpdate', 'la categoria se ha modificado exitosamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
