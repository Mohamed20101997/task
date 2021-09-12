<?php

namespace App\Http\Interfaces;

interface SettingInterface{

    public function index();

    public function edit($request,$id);

}
