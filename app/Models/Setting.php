<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = ['about','address','phone','email','social_links','term_condition','privacy','site_name','logo','description','property_rights'];

    protected $appends = ['image_path'];


    public function getImagePathAttribute(){

        return Storage::url('images/'. $this->logo);

    } // end of getImagePathAttribute

    public function setSocialLinksAttribute($value){

        $this->social_links['gmail'] = 'mailto:' . $value;

    } // end of getImagePathAttribute

}
