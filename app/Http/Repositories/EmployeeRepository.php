<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\EmployeeInterface;
use App\Models\Company;
use App\Models\Employee;


class EmployeeRepository implements EmployeeInterface {

    private $employeeModel;
    private $companyModel;

    public function __construct(Employee $employee, Company $company){
        $this->employeeModel = $employee;
        $this->companyModel = $company;
    }


    public function index()
    {
        $employees = $this->employeeModel::paginate(10);
        return view('dashboard.employees.index',compact('employees'));

    }//end of index function

    public function create()
    {
        $companies = $this->companyModel::get();
        return view('dashboard.employees.create', compact('companies'));

    } //end of create function

    public function store($request)
    {
        try{
            $data = $request->except('_token');

            $this->employeeModel->create($data);
            session()->flash('success', 'Data adedd successfully');

            return redirect()->route('employee.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function

    public function edit($request,$id)
    {
        $employee = $this->employeeModel::find($id);
        $companies = $this->companyModel::get();

        if($employee){
            return view('dashboard.employees.edit', compact('employee','companies'));
        }else{
            return redirect()->back()->with(['error'=>'this employee is not found']);
        }

    } //end of edit function

    public function update($request)
    {
        try{

            $employee =  $this->employeeModel->find($request->id);
            $data = $request->except('_token');

            $employee->update($data);

            session()->flash('success', 'Data Updated successfully');

            return redirect()->route('employee.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $employee =  $this->employeeModel->find($id);

            if(!$employee)
            {
                return redirect()->back()->with(['error'=>'employee not found']);
            }

            $employee->delete();

            session()->flash('success', 'Data deleted successfully');
            return redirect()->route('employee.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of employee class
