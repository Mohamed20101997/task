<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['about','address','phone','email','social_links','term_condition','privacy','site_name','logo','description'];

}
