<?php

namespace App\Http\Interfaces;

interface commentInterface{

    public function index();

    public function show($request ,$id);

    public function destroy($request ,$id);
}
