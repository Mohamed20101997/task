
@php
    $latest = \App\Models\Article::where('status', 1)->orderBy('date','ASC')->take(2)->get();
    $tags   = \App\models\Tag::with('articles')->take(20)->get();
@endphp

@include('layouts.front._header')
@include('dashboard.partials._errors')
@include('dashboard.partials._sessions')

        @yield('content')

@include('layouts.front.footer')

