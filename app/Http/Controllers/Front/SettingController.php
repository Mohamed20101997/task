<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Front\SettingInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    private $settingInterface;

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function term()
    {
        return $this->settingInterface->term();
    }

  public function about()
    {
        return $this->settingInterface->about();
    }


  public function contact(Request $request)
    {
        return $this->settingInterface->contact($request);
    }



}
