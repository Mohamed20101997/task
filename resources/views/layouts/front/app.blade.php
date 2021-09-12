
@include('layouts.front._header')
    @include('dashboard.partials._errors')
    @include('dashboard.partials._sessions')

        @yield('content')

@include('layouts.front.footer')

