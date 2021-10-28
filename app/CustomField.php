<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'answers' => 'array',
    ];


}
