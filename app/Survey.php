<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Givebutter\LaravelCustomFields\Traits\HasCustomFields;
class Survey extends Model
{
    use HasCustomFields;

    protected $table = 'surveis';
    protected $fillable = ['name'];
}
