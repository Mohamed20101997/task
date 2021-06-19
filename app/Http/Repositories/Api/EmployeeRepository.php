<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\EmployeeInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;


class EmployeeRepository implements EmployeeInterface {

    use ApiDesignTrait;

    private $employeeModel;
    private $companyModel;

    public function __construct(Employee $employee, Company $company){
        $this->employeeModel = $employee;
        $this->companyModel = $company;
    }


    public function index()
    {
        $employees = $this->employeeModel::with('company')->get();

        return $this->ApiResponse(200 , 'Done' , null , $employees);


    }//end of index function

    public function create($request)
    {
        $validation = Validator::make($request->all(), [
            'first_name'    => 'required',
            'last_name'    => 'required',
            'email'   => 'email',
            'company_id' => 'exists:companies,id',
        ]);

        if ($validation->fails()) {
            return $this->ApiResponse(422, 'Validation Error', $validation->errors()->first());
        }
        $data = $request->except('_token');

        $this->employeeModel->create($data);

        return $this->ApiResponse(200 , 'Data added successfully');

    } //end of create function


    public function edit($request)
    {

    } //end of edit function


    public function update($request)
    {
        $validation = Validator::make($request->all(), [
            'first_name'    => 'required',
            'last_name'    => 'required',
            'email'   => 'email',
            'company_id' => 'exists:companies,id',
        ]);

        if ($validation->fails()) {
            return $this->ApiResponse(422, 'Validation Error', $validation->errors()->first());
        }


        $employee =  $this->employeeModel->find($request->id);
        if(!$employee)
        {
            return $this->ApiResponse(404 ,'Employee not found');
        }

        $data = $request->except('_token');

        $employee->update($data);

        return $this->ApiResponse(200 , 'Data Updated successfully');


    } //end of update function

    public function delete($request)
    {

        $employee =  $this->employeeModel->find($request->id);

        if(!$employee)
        {
            return $this->ApiResponse(404 ,'Employee not found');
        }

        $employee->delete();
        return $this->ApiResponse(200 ,'Deleted successfully');


    } // end of destroy function

} //end of employee class
