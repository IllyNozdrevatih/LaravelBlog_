<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticle;
use Illuminate\Support\Facades\Auth;
use App\Article;
use View;

class ArticlesController extends Controller
{
    public function allArticles(){
        $user = Auth::user();
        $articles = $user->articles;
        return view('blogger.articles.index',compact('articles'));
    }

    public function create(){
        return view('blogger.articles.create',compact('categories'));
    }

    public function store(StoreArticle $request){
        $user = Auth::user();
        $title = $request->title;
        $description = $request->description;
        $categories = $request->categories;
        $image = $request->file('image')->store('image','public');
        $article = new Article(compact('title','description','image'));
        $user->articles()->save($article);
        $article->categories()->attach($categories);
        return redirect()->route('articles.index');
    }

    public function edit(Article $article){
        return view('blogger.articles.edit',compact('article'));
    }

    public function update(StoreArticle $request, Article $article){
        $image = $request->file('image')->store('image','public');
        $article->categories()->detach();
        $article->update($request->except('_method','_token','categories'));
        $article->update(compact('image'));
        $article->categories()->attach($request->categories);
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article){
        $article->categories()->detach();
        $article->delete();
        return redirect()->back();
    }
}
