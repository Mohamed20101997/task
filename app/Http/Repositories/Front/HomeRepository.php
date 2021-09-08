<?php
namespace App\Http\Repositories\Front;

use App\Http\Interfaces\Front\HomeInterface;
use App\Models\Article;

class HomeRepository implements HomeInterface{

    private $articleModel;
    public function __construct(Article $article){
        $this->articleModel = $article;
    }

    public function home()
    {
        $articles = $this->articleModel::with(['category','type','tags'])->get();

        return view('front.home', compact('articles'));

    }
}
