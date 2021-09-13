@extends('layouts.front.app')
 @section('content')
     <!-- start header-->
     <section class="info_page">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <h2>{{$name}}</h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">{{$name}}</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </section>
     <!-- end header-->

     <!-- start sections terms_and_conditions-->
     <section class="terms_and_conditions">
         <div class="container">
             <div class="row">
                 <div class="col-12 col-md-6 wrap_img text-center"><img class="def_img" src="{{asset('front/image/tm.png')}}" alt="tm"></div>
                 <div class="col-12 col-md-6 wrap_text">
                     <h2>{{$title}}</h2>
                     @if(\Request::route()->getName() == 'setting.term')
                        <p>{!! $term->term_condition !!}</p>
                     @endif
                        <p>{!! $term->privacy !!}</p>
                 </div>
             </div>
         </div>
     </section>
     <!-- end sections terms_and_conditions-->

 @endsection
