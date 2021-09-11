<?php
namespace App\Http\Repositories\Front;

use App\Http\Interfaces\Front\HomeInterface;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleView;
use DB;

class HomeRepository implements HomeInterface{

    private $articleModel;
    private $articleViewModel;
    private $articleCommnetModel;
    public function __construct(Article $article,ArticleView $articleView, ArticleComment $articleComment){
        $this->articleModel = $article;
        $this->articleViewModel = $articleView;
        $this->articleCommnetModel = $articleComment;
    }

    public function home()
    {
        $model      = $this->articleModel::where('status', 1);
        $articles   = $model->orderBy('date','ASC')->take(5)->get();
        $featured   = $model->take(10)->get();
        $posts      = $model->orderBy('date','ASC')->take(10)->get();


        return view('front.home', compact('articles','featured','posts'));
    }


    public function articleBlog($id)
    {
        DB::beginTransaction();

        $article        =   $this->articleModel::where('status', 1)->with('tags','category','author')->find($id);
        $related        =   $this->articleModel::where([['status', 1],['category_id',$article->id]])->get();
        $comments       =   $this->articleCommnetModel::where('article_id', $id)->orderBy('id','desc')->paginate(5);
        $commentsCount  =   $this->articleCommnetModel::where('article_id', $id)->orderBy('id','desc')->count();
        $next           =   $this->articleModel::where([['status', 1],['id','>',$article->id]])->orderBy('id')->first();
        $previous       =   $this->articleModel::where([['status', 1],['id','<',$article->id]])->orderBy('id','desc')->first();


        $ip  = \Request::ip();

        $articleView = $this->articleViewModel::where([['ip',$ip],['article_id',$id]])->first();

        if(!$articleView){
            $this->articleViewModel::create([
                'ip' => $ip,
                'article_id' => $id
            ]);
        }

        // for count view in this article
        $countView = $this->articleViewModel::where('article_id',$id)->count();

        if($article->view != $countView) {
                $this->articleModel::where('id', $id)->update([
                'view' => $countView
            ]);

        }
        DB::commit();

        return view('front.blog', compact('article','related','previous','next','comments','commentsCount'));
    }

    public function articleComment($request)
    {
        try {

            $data = $request->except('_token');

            if($request->has('save')){
                if($data['save'] == 'on'){
                    $data['save'] = 1;
    //                $cookieData = ['name'=>$data['name'],'email'=>$data['email'],'website'=>$data['website']];
    //                $cookie =  \Cookie::make('name', ['name','value']);
                }
            }


            $this->articleCommnetModel::create($data);
        return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
