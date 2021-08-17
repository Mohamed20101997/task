<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;


    public function __construct(CategoryInterface $categoryInterface){

        $this->categoryInterface = $categoryInterface;
    }


    public function index()
    {
        return $this->categoryInterface->index();
    }

    public function create()
    {
        return $this->categoryInterface->create();
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryInterface->store($request);
    }

    public function update(CategoryUpdateRequest $request)
    {
        return $this->categoryInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->categoryInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->categoryInterface->destroy($request, $id);
    }
}
