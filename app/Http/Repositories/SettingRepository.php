<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\SettingInterface;
use App\Models\Setting;


class SettingRepository implements SettingInterface {


    private $settingModel;
    public function __construct(Setting $setting){
        $this->settingModel = $setting;
    }

    public function index()
    {
        $setting = $this->settingModel::first();
        if($setting){
        $linkes = json_decode($setting->social_links, true);
        }else{
            $linkes =[];
        }

        return view('dashboard.settings.show', compact('linkes','setting'));
    }//end of index function

    public function edit($request)
    {
//        try{
            $data = $request->except('_token');
            $data['social_links'] = json_encode($request->social_links);


            $setting = $this->settingModel::first();
            if($setting){

                if($request->has('logo'))
                {
                    \Storage::disk('public')->delete($setting->logo);
                    \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));
                    $data['logo'] = $request->logo->hashName();

                } //end of if
                $this->settingModel::where('id',$setting->id)->update($data);
            }else{
                if($request->logo)
                {
                    \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));
                    $data['logo'] = $request->logo->hashName();
                }

                $this->settingModel::create($data);
            }


            session()->flash('success', 'Settings updated successfully');

            return redirect()->back();

//        }catch(\Exception $e){
//            return redirect()->back()->with(['error'=>'there is problem please try again']);
//        }

    } // end of edit function


} //end of SettingRepository class
