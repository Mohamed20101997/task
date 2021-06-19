<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\EmployeeInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeInterface;


    public function __construct(EmployeeInterface $employeeInterface){

        $this->employeeInterface = $employeeInterface;
    }


    public function index()
    {
        return $this->employeeInterface->index();
    }

    public function create(Request $request)
    {
        return $this->employeeInterface->create($request);
    }

    public function update(Request $request)
    {
        return $this->employeeInterface->update($request);
    }

    public function delete(Request $request)
    {
        return $this->employeeInterface->delete($request);
    }
}
