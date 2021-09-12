<?php

namespace App\Http\Interfaces\Front;

interface HomeInterface{


    public function home();

    public function articleBlog($id);
    public function articleComment($request);
    public function articleList($id);
    public function articleListTag($id);
    public function mostView();
    public function recent();
    public function featured();

}
