<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\CompanyInterface;
use App\Models\Company;

class CompanyRepository implements CompanyInterface {


    private $companyModel;

    public function __construct(Company $company){
        $this->companyModel = $company;
    }


    public function index()
    {
        $companies = $this->companyModel::paginate(10);

        return view('dashboard.companies.index',compact('companies'));

    }//end of index function

    public function create()
    {
        return view('dashboard.companies.create');

    } //end of create function

    public function store($request)
    {
        try{
            $data = $request->except('_token');
            if($request->logo)
            {
                \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));

                $data['logo'] = $request->logo->hashName();

            } //end of if

            $this->companyModel->create($data);
            session()->flash('success', 'Data adedd successfully');

            return redirect()->route('company.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    }

    public function edit($request,$id)
    {
        $company = $this->companyModel::find($id);
        if($company){
            return view('dashboard.companies.edit', compact('company'));
        }else{
            return redirect()->back()->with(['error'=>'this company is not found']);
        }

    }

    public function update($request)
    {
        try{

            $company =  $this->companyModel->find($request->id);
            $data = $request->except('_token');
            if($request->has('logo'))
            {

                // helper_function :  for delete the previous image
                remove_previous('public', $company);

                \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));

                $data['logo'] = $request->logo->hashName();

            } //end of if

            $company->update($data);
            session()->flash('success', 'Data Updated successfully');

            return redirect()->route('company.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }

    public function destroy($request, $id)
    {
        try{
            $company =  $this->companyModel->find($id);

            if(!$company)
            {
                return redirect()->back()->with(['error'=>'company not found']);
            }

            $company->delete();

            remove_previous('public',$company);

            session()->flash('success', 'Data deleted successfully');
            return redirect()->route('company.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function

} //end of company class
