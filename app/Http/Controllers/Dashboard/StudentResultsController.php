<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\StudentResultsInterface;
use App\Http\Requests\StudentResultRequest;
use Illuminate\Http\Request;

class StudentResultsController extends Controller
{
    private $studentResultsInterface;


    public function __construct(StudentResultsInterface $studentResultsInterface){

        $this->studentResultsInterface = $studentResultsInterface;
    }


    public function index()
    {
        return $this->studentResultsInterface->index();
    }

    public function create()
    {
        return $this->studentResultsInterface->create();
    }

    public function store(StudentResultRequest $request)
    {
        return $this->studentResultsInterface->store($request);
    }
    public function import(Request $request)
    {
        return $this->studentResultsInterface->import($request);
    }
    public function update(StudentResultRequest $request)
    {
        return $this->studentResultsInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->studentResultsInterface->edit($request, $id);
    }


    public function destroy(Request $request, $id)
    {
        return $this->studentResultsInterface->destroy($request, $id);
    }
}
