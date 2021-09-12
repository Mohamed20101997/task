<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\CommentInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentInterface;


    public function __construct(CommentInterface $commentInterface){

        $this->commentInterface = $commentInterface;
    }


    public function index()
    {
        return $this->commentInterface->index();
    }


    public function destroy(Request $request, $id)
    {
        return $this->commentInterface->destroy($request, $id);
    }

    public function show(Request $request, $id)
    {
        return $this->commentInterface->show($request, $id);
    }
}
