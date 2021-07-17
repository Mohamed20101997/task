<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\FrontInterface;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;


class FrontRepository implements FrontInterface {


    private $articleModel;
    public function __construct(Article $article){
        return $this->articleModel = $article;
    }


    public function home()
    {
        $articles = $this->articleModel::with('category')->paginate(4);
        $categories = Category::get();
        return view('front.home', compact('articles','categories'));

    }//end of index function


    public function read($request)
    {
        $id =  $request->id;
        $article = $this->articleModel::find($id);
        $categories = Category::get();
        $comments = Comment::where('article_id', $id)->with('user')->get();

        if($article){
            return view('front.read', compact('article','comments','categories'));
        }else{

            return redirect()->back()->with(['error'=>'this article is not found']);
        }
    }

    public function comment($request)
    {
         $request->validate([
            'comment' => 'required',
            'article_id'=> 'exists:articles,id'
        ]);

        try{
            Comment::create([
                'comment' => $request->comment,
                'article_id' => $request->article_id,
                'user_id' => auth()->user()->id,
            ]);

            session()->flash('success', 'Comment added successfully');

            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    }

    public function cat($request)
    {
        $articles = $this->articleModel::where('category_id', $request->id )->with('category')->paginate(4);
        $categories = Category::get();
        return view('front.home', compact('articles','categories'));
    }
} //end of category class
