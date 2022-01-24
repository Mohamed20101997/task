<?php

namespace App\Http\Interfaces;

interface StudentResultsInterface{

    public function index();

    public function create();

    public function store($request);

    public function import($request);

    public function update($request);

    public function edit($request,$id);

    public function destroy($request ,$id);
}
