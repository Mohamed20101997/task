<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $fillable = ['name','email','website','comment','save','article_id'];

    public function article(){
        return $this->belongsTo(Article::class, 'article_id');
    }


    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch
}
