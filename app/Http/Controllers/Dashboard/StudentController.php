<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\StudentInterface;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $studentInterface;


    public function __construct(StudentInterface $studentInterface){

        $this->studentInterface = $studentInterface;
    }


    public function index()
    {
        return $this->studentInterface->index();
    }

    public function create()
    {
        return $this->studentInterface->create();
    }

    public function store(StudentRequest $request)
    {
        return $this->studentInterface->store($request);
    }

    public function update(StudentRequest $request)
    {
        return $this->studentInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->studentInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->studentInterface->destroy($request, $id);
    }
}
