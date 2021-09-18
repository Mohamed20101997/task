<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\SettingInterface;
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
        try{
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



                if($request->has('icon'))
                {
                    \Storage::disk('public')->delete($setting->icon);
                    \Image::make($request->icon)->save(storage_path('app/public/images/'. $request->icon->hashName()));
                    $data['icon'] = $request->icon->hashName();

                } //end of if

                $this->settingModel::where('id',$setting->id)->update($data);
            }else{

                if($request->logo)
                {
                    \Image::make($request->logo)->save(storage_path('app/public/images/'. $request->logo->hashName()));
                    $data['logo'] = $request->logo->hashName();
                }


                if($request->icon)
                {
                    \Image::make($request->icon)->save(storage_path('app/public/images/'. $request->icon->hashName()));
                    $data['icon'] = $request->icon->hashName();
                }


                $this->settingModel::create($data);
            }


            session()->flash('success', 'Settings updated successfully');

            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of edit function


    public function contact()
    {
        $contacts = $this->contactModel::paginate(5);
        return view('dashboard.contact.index', compact('contacts'));

    }

    public function news()
    {
        $news = $this->newsModel::paginate(5);
        return view('dashboard.news.index', compact('news'));

    }

      public function deleteContact($id)
    {
        try{
            $contact =  $this->contactModel->find($id);

            if(!$contact)
            {
                return redirect()->back()->with(['error'=>'contact not found']);
            }

            $contact->delete();

            session()->flash('success', 'Contact deleted successfully');

            return redirect()->route('setting.contact');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }



    public function deleteNews($id)
    {

        try{
            $news =  $this->newsModel->find($id);

            if(!$news)
            {
                return redirect()->back()->with(['error'=>'news not found']);
            }

            $news->delete();

            session()->flash('success', 'Contact deleted successfully');

            return redirect()->route('setting.news');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }



} //end of SettingRepository class
