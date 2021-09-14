@extends('layouts.front.app')
 @section('content')
     <!-- start header-->
     <section class="info_page">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <h2>Contact with About</h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Contact Info</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </section>
     <!-- end header-->

     <!-- start sections contact_with_about-->
     <section class="contact_with_about">
         <div class="container">
             <div class="row">
                 <div class="col-12 map">
                     <div class="wrap_map style_wrap_section">
                         <div class="mapouter">
                             <div class="gmap_canvas">
                                 <iframe id="gmap_canvas" width="100%" height="400" src="https://maps.google.com/maps?q=egypt&amp;t=&amp;z=7&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
                                 <style>.mapouter{position:relative;text-align:right;height:400px;width:100%;}</style><a href="https://www.embedgooglemap.net"></a>
                                 <style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}</style>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-lg-6 col-xl-7 page_contact_us">
                     <div class="wrap_contact_us style_wrap_section h-100">
                         <div class="wrap_title">
                             <h2>Say hello !</h2>
                         </div>
                         <p class="des">
                            {{$about->description}}
                         </p>

                         <form action="{{route('setting.contact')}}" method="post">
                             @csrf
                             @method('post')
                             <!-- create by pugjs loop-->
                             <div class="wrap_filde">
                                 <label class="req" for="#1">Name</label>
                                 <input type="text" name="name" required>
                                 @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <!-- create by pugjs loop-->
                             <div class="wrap_filde">
                                 <label class="req" for="#2">E-Mail</label>
                                 <input type="email" name="email" required>
                                 @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <!-- create by pugjs loop-->
                             <div class="wrap_filde">
                                 <label class="req"  for="#3">Subject</label>
                                 <input type="text" name="subject" required>
                                 @error('subject')
                                    <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="wrap_filde">
                                 <label class="req" for="">Message</label>
                                 <textarea name="message" cols="40" rows="5" placeholder="Type your message" required></textarea>
                                 @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <button class="btn">Send</button>
                         </form>
                     </div>
                 </div>

                 <div class="col-12 col-lg-6 col-xl-5 page_about_us">
                     <div class="wrap_about_us style_wrap_section h-100">
                         <div class="wrap_title">
                             <h2>About us</h2>
                         </div>
                         <p class="des"> {!! $about->about !!}</p>
                         <ul class="list-unstyled mb-0 about_info">
                             <li class="item_about">
                                 <i class="fas fa-map-marker-alt"></i>
                                 address :<span class="item_span item_des">{{ $about->address }}</span>
                             </li>
                             <li class="item_about">
                                 <i class="fas fa-phone-alt"></i>
                                 phone number :<span class="item_span item_des">{{ $about->phone }}</span>
                             </li>
                             <li class="item_about">
                                 <i class="fas fa-envelope"></i>
                                 E-mail :<span class="item_span item_des">{{ $about->email }}</span>
                             </li>
                             <li class="item_about">
                                 <i class="fas fa-share-square"></i>
                                 Social links :
                                 <ul class="list-unstyled mb-0 list_social">
                                     <!-- create by pugjs loop-->
                                     @if(!empty($linkes['facebook']))
                                         <li>
                                             <a class="a_hover_none" href="{{ $linkes['facebook'] }}" style="background-color:rgb(59, 89, 151);"><i class="fab fa-facebook-f"></i></a>
                                         </li>
                                     @endif
                                     @if(!empty($linkes['twitter']))
                                         <li>
                                             <a class="a_hover_none" href="{{ $linkes['twitter'] }}" style="background-color:rgb(0, 186, 240);"><i class="fab fa-twitter"></i></a>
                                         </li>
                                     @endif
                                     @if(!empty($linkes['youtube']))
                                         <li>
                                             <a class="a_hover_none"  href="{{$linkes['youtube'] }}"  style="background-color:rgb(205,32,31);"><i class="fab fa-youtube"></i></a>
                                         </li>
                                     @endif
                                     @if(!empty($linkes['linkedin']))
                                         <li>
                                             <a class="a_hover_none" href="{{$linkes['linkedin'] }}" style="background-color:rgb(0, 101, 153);;"><i class="fab fa-linkedin-in"></i></a>
                                         </li>
                                     @endif
                                     @if(!empty($linkes['gmail']))
                                         <li>
                                             <a class="a_hover_none" href="{{$linkes['gmail'] }}" style="background-color:rgb(202, 44, 36);"><i class="fab fa-google-plus-g"></i></a>
                                         </li>
                                     @endif
                                 </ul>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- end sections contact_with_about-->


 @endsection
