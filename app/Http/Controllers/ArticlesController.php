<?php

namespace App\Http\Controllers;

use App\Article;
use View;


class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::with(['categories','user'])->orderBy('created_at','desc')->paginate(5);
        return view('articles.index',compact('articles'));
    }

    public function show(Article $article){
        $article = $article->load('comments.user');
        return view('articles.show',compact('article'));
    }
}
