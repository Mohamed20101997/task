<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\FrontInterface;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * @var FrontInterface $frontInterface
     */
    private $frontInterface;

    /**
     * FrontController constructor.
     * @param FrontInterface $frontInterface
     */
    public function __construct(FrontInterface $frontInterface){
        $this->frontInterface = $frontInterface;
    }

    public function home()
    {
        return $this->frontInterface->home();
    }

    public function read(Request $request)
    {
        return $this->frontInterface->read($request);
    }

    public function comment(Request $request)
    {
        return $this->frontInterface->comment($request);
    }

    public function cat(Request $request)
    {
        return $this->frontInterface->cat($request);
    }




}
