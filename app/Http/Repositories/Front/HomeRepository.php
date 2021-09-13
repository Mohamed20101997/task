<?php
namespace App\Http\Repositories\Front;

use App\Http\Interfaces\Front\HomeInterface;
use App\Http\Traits\ArticleTrait;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleView;
use App\Models\Category;
use App\models\Tag;
use DB;

class HomeRepository implements HomeInterface{

    use ArticleTrait;

    private $articleModel;
    private $articleViewModel;
    private $articleCommnetModel;
    private $categoryModel;
    private $tagModel;
    public function __construct(Article $article,ArticleView $articleView, ArticleComment $articleComment, Category $category ,Tag $tag){
        $this->articleModel = $article;
        $this->articleViewModel = $articleView;
        $this->articleCommnetModel = $articleComment;
        $this->categoryModel = $category;
        $this->tagModel = $tag;
    }

    public function home()
    {
        $model      = $this->articleModel::where('status', 1);
        $articles   = $model->orderBy('date','ASC')->take(5)->get();
        $featured   = $model->take(10)->get();
        $posts      = $model->orderBy('date','ASC')->take(10)->get();

        $trends = $this->trend(10);
        $articleTrend = $this->trend(3);

        return view('front.home', compact('articles','featured','posts','trends','articleTrend'));
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

    public function articleList($id)
    {
        $articles       = $this->articleModel::where([['status', 1],['category_id', $id]])->with('tags','category','author')->get();
        $categories     = $this->categoryModel::where('id', '!=' ,$id)->get();
        $categoryName   = $this->categoryModel::where('id', $id)->pluck('name')->first();
        $latest         =  $this->articleModel::where('status', 1)->orderBy('date','ASC')->take(5)->get();

        return view('front.list', compact('articles','categories', 'categoryName','latest'));
    }

    public function articleListTag($id)
    {
        $articles = $this->articleModel::where([['status', 1]])->whereHas('tags',function ($query) use($id){
            $query->where('tag_id', $id);
        })
        ->with('tags','category','author')->get();
        $tags           = $this->tagModel::where('id', '!=' ,$id)->get();
        $tagName        = $this->tagModel::where('id', $id)->pluck('name')->first();
        $latest         =  $this->articleModel::where('status', 1)->orderBy('date','ASC')->take(5)->get();

        return view('front.listTag', compact('articles','tags', 'tagName','latest'));
    }

    public function mostView()
    {
        $articles       = $this->articleModel::where([['status', 1]])->orderBy('view','desc')->take(5)->paginate(5);
        $latest         =  $this->articleModel::where('status', 1)->orderBy('date','ASC')->take(5)->get();
        $name           = 'Most View';

        return view('front.articles', compact('articles','name','latest'));

    }

    public function recent()
    {
        $articles       = $this->articleModel::where([['status', 1]])->orderBy('date','ASC')->paginate(5);
        $latest         =  $this->articleModel::where('status', 1)->orderBy('date','ASC')->take(5)->get();
        $name           = 'Recent';

        return view('front.articles', compact('articles','name','latest'));
    }

    public function featured()
    {
        $articles       = $this->articleModel::where([['status', 1]])->inRandomOrder()->paginate(5);
        $latest         =  $this->articleModel::where('status', 1)->orderBy('date','ASC')->take(5)->get();
        $name           = 'Featured';

        return view('front.articles', compact('articles','name','latest'));
    }

    public function trends()
    {
        $articles = $this->trend(10);
        $latest =  $this->articleModel::where('status', 1)->orderBy('date','ASC')->take(5)->get();
        $name   = 'Trending';

        return view('front.articles', compact('articles','name','latest'));
    }
}
