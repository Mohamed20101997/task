<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\ArticleInterface;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Type;

class ArticleRepository implements ArticleInterface {


    private $articleModel;

    private $categoryModel;
    private $tagModel;
    private $typeModel;


    public function __construct(Article $article, Category $category, Tag $tag , Type $type){
        $this->articleModel = $article;
        $this->categoryModel = $category;
        $this->tagModel = $tag;
        $this->typeModel = $type;
    }


    public function index()
    {
        $articles = $this->articleModel::with('category','type')
            ->whenSearch(request()->search)
            ->whenCategory(request()->category)->paginate(5);
            $categories = $this->categoryModel::get();

        return view('dashboard.articles.index',compact('articles','categories'));

    }//end of index function

    public function create()
    {
        $categories = $this->categoryModel::get();
        $tags = $this->tagModel::get();
        $types = $this->typeModel::get();
        return view('dashboard.articles.create',compact('categories','tags','types'));

    } //end of create function

    public function store($request)
    {
        try{
            $data = $request->except('_token');

            if($request->image)
            {
                \Image::make($request->image)->save(storage_path('app/public/images/'. $request->image->hashName()));
                $data['image'] = $request->image->hashName();
            }

            $data['admin_id'] = auth()->guard('admin')->user()->id;

            $article = $this->articleModel->create($data);

            $article->tags()->attach($request->tag_id);

            session()->flash('success', 'Article added successfully');

            return redirect()->route('article.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    }

    public function edit($request,$id)
    {
        $article = $this->articleModel::with('tag')->find($id);

        $categories = $this->categoryModel::get();
        $tags = $this->tagModel::get();
        $types= $this->typeModel::get();

        if($article){
            return view('dashboard.articles.edit', compact('article','categories','types','tags'));
        }else{
            return redirect()->back()->with(['error'=>'this article is not found']);
        }

    }

    public function update($request)
    {
//        try{

            $article =  $this->articleModel->find($request->id);

            $data = $request->except('_token');
            if($request->has('image'))
            {
                // helper_function :  for delete the previous image
                remove_previous('public', $article);
                \Image::make($request->image)->save(storage_path('app/public/images/'. $request->image->hashName()));
                $data['image'] = $request->image->hashName();

            } //end of if

            $data['admin_id'] = auth()->guard('admin')->user()->id;

            $article->update($data);

            $article->tags()->sync($request->tag_id);

            session()->flash('success', 'Article Updated successfully');

            return redirect()->route('article.index');
//
//        }catch(\Exception $e){
//            return redirect()->back()->with(['error'=>'there is problem please try again']);
//        }
    }

    public function destroy($request, $id)
    {
        try{
            $article =  $this->articleModel->find($id);

            if(!$article)
            {
                return redirect()->back()->with(['error'=>'article not found']);
            }

            $article->delete();

            remove_previous('public',$article);

            session()->flash('success', 'Article deleted successfully');
            return redirect()->route('article.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of article class
