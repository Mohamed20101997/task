<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

 protected $fillable = ['title','description','image','category_id'];

  //Start of Relations
  public function category(){
      return $this->belongsTo(Category::class, 'category_id','id');
  }


    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('title' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch


    public function scopeWhenCategory($query , $category)
    {
        return $query->when($category , function($q) use($category) {

            return $q->whereHas('category', function($qu) use($category){
                return $qu->whereIn('category_id', (array)$category)
                    ->orWhereIn('name', (array)$category);
            });

        });

    } //scopeWhenCategory

}
