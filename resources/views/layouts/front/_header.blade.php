<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('front/assets/favicon.ico')}}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    {{-- noty --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
    <style>
        #imgHome,#desHome{
            height: 200px;
            max-height: 200px;
        }
        #desHome{
            height: 50px;
            max-height: 50px;
        }
        #imgRead{
         width: 100%;
         height: 350px;
        }
    </style>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Task  @auth()  | Welcome {{auth()->user()->name}} @endauth</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                @auth()
                    <li class="nav-item"><a class="nav-link" href="{{url('logout')}}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{url('login')}}">Login \ Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
        </div>
    </div>
</header>
