<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'ArticlesController@index')->name('articles.index');


Route::resource('articles','ArticlesController')->only(['show']);
Route::resource('categories','CategoriesController')->only(['show']);

Route::group([
    'middleware'=> 'checkRole:blogger',
    'prefix' => 'blogger',
    'namespace' => 'Blogger'
    ],function(){
    Route::resource('articles','ArticlesController')->except(['index','show']);
    Route::get('cabinet-articles','ArticlesController@allArticles')->name('blogger-cabinet-articles');
    Route::get('articles/{article_id}','CommentsController@storeGetComment')->name('comments.store-get-comment');
    Route::delete('articles/comment/{comment_id}/delete','CommentsController@delete')->name('comments.delete');
});