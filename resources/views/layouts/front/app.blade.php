
@include('layouts.front._header')
    <div class="container">
        @include('dashboard.partials._errors')
        @include('dashboard.partials._sessions')
        <div class="row">
            @yield('content')
            @include('layouts.front._side')
        </div>
    </div>
@include('layouts.front.footer')

