<?php

namespace App\Http\Interfaces;

interface SettingInterface{

    public function index();

    public function edit($request);

    public function contact();

    public function news();

    public function deleteContact($id);

    public function deleteNews($id);

}
