<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentResults extends Model
{
    protected $fillable = ['student_id', 'grade' , 'seating_number'];



///////////////    Relation    ///////////

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }


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




}
