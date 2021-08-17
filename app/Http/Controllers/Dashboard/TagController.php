<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\TagInterface;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagInterface;


    public function __construct(TagInterface $tagInterface){

        $this->tagInterface = $tagInterface;
    }


    public function index()
    {
        return $this->tagInterface->index();
    }

    public function create()
    {
        return $this->tagInterface->create();
    }

    public function store(TagRequest $request)
    {
        return $this->tagInterface->store($request);
    }

    public function update(TagRequest $request)
    {
        return $this->tagInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->tagInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->tagInterface->destroy($request, $id);
    }
}
