<?php
namespace App\Http\Repositories\Front;

use App\Http\Interfaces\Front\SettingInterface;
use App\Models\Contact;
use App\Models\NewsLetter;
use App\Models\Setting;

class SettingRepository implements SettingInterface {

    private $settingModel;
    private $contactModel;
    private $newsModel;
    public function __construct(Setting $setting, Contact $contact, NewsLetter $news){
        $this->settingModel = $setting;
        $this->contactModel = $contact;
        $this->newsModel = $news;
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
        try{
            $data = $request->except('_token');

            $this->contactModel::create($data);

            session()->flash('success', 'Sent message successfully');

            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }

    public function news($request)
    {   try{
            $data = $request->except('_token');

            $this->newsModel::create($data);

            session()->flash('success', 'subscribed successfully');

            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    }
}
