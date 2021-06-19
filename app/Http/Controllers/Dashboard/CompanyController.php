<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\CompanyInterface;
use App\Http\Requests\CompanyRequest;
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

    public function create()
    {
       return $this->companyInterface->create();
    }

    public function store(CompanyRequest $request)
    {
       return $this->companyInterface->store($request);
    }

    public function update(CompanyRequest $request)
    {
       return $this->companyInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
       return $this->companyInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
       return $this->companyInterface->destroy($request, $id);
    }
}
