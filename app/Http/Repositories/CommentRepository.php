<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\CommentInterface;
use App\Models\Article;
use App\Models\ArticleComment;

class CommentRepository implements CommentInterface {


    private $commentModel;
    public function __construct(ArticleComment $comment){
        $this->commentModel = $comment;
    }

    public function index()
    {
        $comments = $this->commentModel::whenSearch(request()->search)->whenArticle(request()->article_id)->paginate(5);
        $articles = Article::get();
        return view('dashboard.comments.index',compact('comments','articles'));

    }//end of index function

    public function show($request, $id)
    {
        $comment = $this->commentModel::find($id);
        $mode = view('dashboard.comments.model', compact('comment'))->render();

        return response()->json($mode);

    } // end of show function

    public function destroy($request, $id)
    {
        try{
            $comment =  $this->commentModel->find($id);

            if(!$comment)
            {
                return redirect()->back()->with(['error'=>'comment not found']);
            }

            $comment->delete();

            session()->flash('success', 'Comment deleted successfully');

            return redirect()->route('comment.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of comment class
