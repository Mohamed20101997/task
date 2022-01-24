<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['f_name','s_name','t_name','l_name','email'];
    protected $appends = ['full_name'];


    //scope -----------------------------------

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('f_name' , 'like' , "%$search%")
                     ->orWhere('s_name' , 'like' , "%$search%")
                     ->orWhere('t_name' , 'like' , "%$search%")
                     ->orWhere('l_name' , 'like' , "%$search%")
                     ->orWhere('email' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch


    public function getFullNameAttribute()
    {
        return "{$this->f_name} {$this->s_name} {$this->t_name} {$this->l_name}";
    }
}
