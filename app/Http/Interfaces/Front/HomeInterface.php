<?php

namespace App\Http\Interfaces\Front;

interface HomeInterface{


    public function home();

    public function articleBlog($id);

    public function articleComment($request);

}
