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
        $setting->social_links = json_decode($setting->social_links);
        return view('dashboard.settings.show', compact('setting'));
    }//end of index function

    public function edit($request)
    {
        try{
            $data = $request->except('_token');
            $data['social_links'] = json_encode($request->social_links);
            $setting = $this->settingModel::first();
            if($setting){
                $this->settingModel::where('id',$setting->id)->update($data);
            }else{
                $this->settingModel::create($data);
            }


            session()->flash('success', 'Settings updated successfully');

            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of edit function


} //end of SettingRepository class
