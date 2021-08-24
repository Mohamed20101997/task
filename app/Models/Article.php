<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

 protected $fillable = ['name','description','image','category_id','admin_id','type_id'];

  //Start of Relations
  public function category(){
      return $this->belongsTo(Category::class, 'category_id','id');
  }

  //Start of Relations
  public function type(){
      return $this->belongsTo(Type::class, 'type_id','id');
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


    public function tags(){

      return $this->belongsToMany( Tag::class ,ArticleTags::class, 'article_id', 'tag_id');
    }
}
