<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ArticleInterface;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    private $articleInterface;
    public function __construct(ArticleInterface $articleInterface){

        $this->articleInterface = $articleInterface;
    }


    public function index()
    {
       return $this->articleInterface->index();
    }

    public function create()
    {
       return $this->articleInterface->create();
    }

    public function store(ArticleRequest $request)
    {
       return $this->articleInterface->store($request);
    }

    public function update(ArticleUpdateRequest $request)
    {
       return $this->articleInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
       return $this->articleInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
       return $this->articleInterface->destroy($request, $id);
    }
}
