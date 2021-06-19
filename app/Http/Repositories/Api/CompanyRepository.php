<?php

namespace App\Http\Repositories\Api;
use App\Http\Interfaces\Api\CompanyInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class CompanyRepository implements CompanyInterface {

    use ApiDesignTrait;

    private $companyModel;

    public function __construct(Company $company){
        $this->companyModel = $company;
    }


    public function index()
    {
        $companies = $this->companyModel::paginate(10);
        return $this->ApiResponse(200 , 'Done' , null , $companies);

    }//end of index function

    public function create($request)
    {
        $validation = Validator::make($request->all(), [
            'name'    => 'required',
            'email'   => 'email',
            'website' => 'url',
            'logo'    => 'image|dimensions:min_width=100,min_height=100',
        ]);

        if ($validation->fails()) {
            return $this->ApiResponse(422, 'Validation Error',$validation->errors()->first());
        }

        $data = $request->except('_token');
        if($request->logo)
        {
            \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));

            $data['logo'] = $request->logo->hashName();

        } //end of if

        $this->companyModel->create($data);

        return $this->ApiResponse(200 , 'Added data successuffly');

    } //end of create function


    public function update($request)
    {
        $validation = Validator::make($request->all(), [
            'name'    => 'required',
            'email'   => 'email',
            'website' => 'url',
            'logo'    => 'image|dimensions:min_width=100,min_height=100',
        ]);

        if ($validation->fails()) {
            return $this->ApiResponse(422, 'Validation Error', $validation->errors()->first());
        }

        $company =  $this->companyModel->find($request->id);
        if(!$company)
        {
            return $this->ApiResponse(404 ,'Company not found');
        }
            $data = $request->except('_token');
            if($request->has('logo'))
            {
                // helper_function :  for delete the previous image
                remove_previous('public', $company);

                \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));

                $data['logo'] = $request->logo->hashName();

            } //end of if

            $company->update($data);

            return $this->ApiResponse(200 , 'Data Updated successfully',null,$company);

    }

    public function delete($request)
    {
        $company =  $this->companyModel->find($request->id);

        if(!$company)
        {
            return $this->ApiResponse(404 , 'Company Not found');
        }

        $company->delete();

        remove_previous('public',$company);

        return $this->ApiResponse(200 , 'Data deleted successfully');

    } // end of destroy function

} //end of company class
