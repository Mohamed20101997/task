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
        $model = $this->articleModel::where('status', 1);
        $articles = $model->orderBy('date','ASC')->take(5)->get();
        $featured = $model->take(10)->get();
        $posts = $model->orderBy('date','ASC')->take(10)->get();

        return view('front.home', compact('articles','featured','posts'));

    }
}
