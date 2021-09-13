<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\SettingInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;


    public function __construct(SettingInterface $settingInterface){

        $this->settingInterface = $settingInterface;
    }

    public function index()
    {
        return $this->settingInterface->index();
    }

    public function edit(Request $request)
    {
        return $this->settingInterface->edit($request);
    }


}
