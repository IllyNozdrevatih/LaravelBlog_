<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function show($id){
        $articles = Category::find($id)->articles()->paginate(5);
        return view('category.show',compact('articles'));
    }
}
