<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Front\HomeInterface;
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

    public function articleComment(Request $request)
    {
        return $this->HomeInterface->articleComment($request);
    }


}
