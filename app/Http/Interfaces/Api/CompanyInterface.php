<?php

namespace App\Http\Interfaces\Api;

interface CompanyInterface{

    public function index();

    public function create($request);

    public function update($request);

    public function delete($request);

}
