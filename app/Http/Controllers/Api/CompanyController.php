<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\CompanyInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    private $companyInterface;
    public function __construct(CompanyInterface $companyInterface){

        $this->companyInterface = $companyInterface;
    }


    public function index()
    {
       return $this->companyInterface->index();
    }

    public function create(Request $request)
    {
       return $this->companyInterface->create($request);
    }


    public function update(Request $request)
    {
       return $this->companyInterface->update($request);
    }

    public function delete(Request $request)
    {
       return $this->companyInterface->delete($request);
    }
}
