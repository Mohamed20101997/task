
@include('layouts.front._header')
    @include('dashboard.partials._errors')
    @include('dashboard.partials._sessions')
    <div class="row">
        @yield('content')
    </div>
@include('layouts.front.footer')

