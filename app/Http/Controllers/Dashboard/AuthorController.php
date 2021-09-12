<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AuthorInterface;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authorInterface;


    public function __construct(AuthorInterface $authorInterface){

        $this->authorInterface = $authorInterface;
    }


    public function index()
    {
        return $this->authorInterface->index();
    }

    public function create()
    {
        return $this->authorInterface->create();
    }

    public function store(AuthorRequest $request)
    {
        return $this->authorInterface->store($request);
    }

    public function update(AuthorUpdateRequest $request)
    {
        return $this->authorInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->authorInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->authorInterface->destroy($request, $id);
    }
}
