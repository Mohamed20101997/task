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

    public function contact()
    {
        return $this->settingInterface->contact();
    }

    public function news()
    {
        return $this->settingInterface->news();
    }

    public function deleteNews($id)
    {
        return $this->settingInterface->deleteNews($id);
    }
    public function deleteContact($id)
    {
        return $this->settingInterface->deleteContact($id);
    }


}
