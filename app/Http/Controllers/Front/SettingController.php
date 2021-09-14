<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Front\SettingInterface;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\NewsRequest;
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


  public function contact(ContactRequest $request)
    {
        return $this->settingInterface->contact($request);
    }

 public function news(NewsRequest $request)
    {
        return $this->settingInterface->news($request);
    }



}
