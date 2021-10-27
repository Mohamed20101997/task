<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Givebutter\LaravelCustomFields\Traits\HasCustomFieldResponses;
class SurveyResponse extends Model
{
    use HasCustomFieldResponses;
    protected $table = 'survey__responses';
    protected $fillable = ['name'];
}
