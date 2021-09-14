<?php

namespace App\Http\Interfaces\Front;

interface SettingInterface{

    public function term();
    public function about();
    public function contact($request);
    public function news($request);
}
