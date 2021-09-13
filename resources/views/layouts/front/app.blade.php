
@php
    $latest     = \App\Models\Article::where('status', 1)->orderBy('date','ASC')->take(2)->get();
    $tags       = \App\models\Tag::with('articles')->take(20)->get();
    $Categories   =  \App\Models\Category::get();
   $setting = \App\Models\Setting::first();
    if($setting){
    $linkes = json_decode($setting->social_links, true);
    }else{
        $linkes =[];
    }
@endphp

@include('layouts.front._header')
@include('dashboard.partials._errors')
@include('dashboard.partials._sessions')

        @yield('content')

@include('layouts.front.footer')

