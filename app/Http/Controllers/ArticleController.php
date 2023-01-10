<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontEndController
{
    public function getListArticle()
    {
        $articles = Article::simplePaginate(7);
        $articlesHot = Article::where('a_hot', Article::HOT)->get();

        return view('article.index', compact('articles','articlesHot'));
    }
    public function getDetailArticle(Request $request)
    {
        $arrayURl = (preg_split("/(-)/i", $request->segment(2)));

        $id = array_pop($arrayURl);
        if ($id) 
        {
            $articleDetail = Article::find($id);
            $articles = Article::simplePaginate(5);
            $articlesHot = Article::where('a_hot', Article::HOT)->get();

            $viewData = [
                'articles' => $articles,
                'articleDetail' => $articleDetail,
                'articlesHot' => $articlesHot
            ];
            return view('article.detail', $viewData);
        }
        return redirect('/');
    }

}
