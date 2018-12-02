<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected  $fillable = [
        'title','description','image'
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function getCategories(){
        $categories = array();
        $collection =  $this->categories;
        foreach ( $collection as $model ){
            array_push($categories,$model->name);
        }
        return implode(",",$categories);
    }
}
