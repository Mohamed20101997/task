<?php

namespace App\Http\Interfaces\Api;

interface EmployeeInterface{

    public function index();

    public function create($request);

    public function update($request);

    public function delete($request);
}
