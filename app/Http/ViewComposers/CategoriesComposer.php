<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoriesComposer
{
    public function compose(View $view){
        $view->with('categories',Category::all());
    }
}