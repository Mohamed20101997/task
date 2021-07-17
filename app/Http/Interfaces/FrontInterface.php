<?php

namespace App\Http\Interfaces;

interface FrontInterface{

    public function home();

    public function read($request);

    public function comment($request);

    public function cat($request);

}
