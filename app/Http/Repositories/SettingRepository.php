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

        return view('dashboard.settings.show');

    }//end of index function

    public function edit($request, $id)
    {


    } // end of edit function


} //end of SettingRepository class
