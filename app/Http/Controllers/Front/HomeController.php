<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Front\HomeInterface;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var HomeInterface $HomeInterface
     */
    private $HomeInterface;

    /**
     * HomeController constructor.
     * @param HomeInterface $HomeInterface
     */
    public function __construct(HomeInterface $HomeInterface)
    {
        $this->HomeInterface = $HomeInterface;
    }

    public function home()
    {
        return $this->HomeInterface->home();
    }

    public function articleBlog($id)
    {
        return $this->HomeInterface->articleBlog($id);
    }

    public function articleComment(CommentRequest $request)
    {
        return $this->HomeInterface->articleComment($request);
    }

    public function articleList($id)
    {
        return $this->HomeInterface->articleList($id);
    }

    public function articleListTag($id)
    {
        return $this->HomeInterface->articleListTag($id);
    }

    public function mostView()
    {
        return $this->HomeInterface->mostView();
    }
    public function recent()
    {
        return $this->HomeInterface->recent();
    }
    public function featured(Request $request)
    {
        return $this->HomeInterface->featured($request);
    }
    public function trends()
    {
        return $this->HomeInterface->trends();
    }


}
