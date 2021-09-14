<?php

namespace App\Http\Interfaces;

interface CommentInterface{

    public function index();

    public function show($request ,$id);

    public function destroy($request ,$id);
}
