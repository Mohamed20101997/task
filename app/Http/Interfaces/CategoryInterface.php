<?php

namespace App\Http\Interfaces;

interface CategoryInterface{

    public function index();

    public function create();

    public function store($request);

    public function update($request);

    public function edit($request,$id);

    public function destroy($request ,$id);
}
