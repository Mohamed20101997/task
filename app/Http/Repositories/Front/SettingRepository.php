<?php
namespace App\Http\Repositories\Front;

use App\Http\Interfaces\Front\SettingInterface;
use App\Models\Setting;

class SettingRepository implements SettingInterface {

    private $settingModel;
    public function __construct(Setting $setting){
        $this->settingModel = $setting;
    }


    public function term()
    {
        $route = \Request::route()->getName();
        $term = $this->settingModel::first();
        if($route == 'setting.term')
        {
            $name = 'Terms and conditions';
            $title = 'Generate Terms of Service';
            return view('front.term',compact('name','title','term'));
        }

        $name = 'Privacy Policy';
        $title = 'Generate Policy of Service';
        return view('front.term',compact('name','title','term'));

    }

    public function about()
    {
        $about = $this->settingModel::first();

        if($about){
            $linkes = json_decode($about->social_links, true);
        }else{
            $linkes =[];
        }

        return view('front.about',compact('about','linkes'));
    }

    public function contact($request)
    {
        // TODO: Implement contact() method.
    }
}
