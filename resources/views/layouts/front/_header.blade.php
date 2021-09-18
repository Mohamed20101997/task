<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="iE=edge">

    <link rel="icon" href="{{$setting->icon_path}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-editor.css') }}">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css?fbclid=IwAR0mnCAhuACWAXjZZ7wAF1Sn7hf831rDlgRqGsACMAyVU3NX33QgEwyBFac">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">

    {{-- noty --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,800;1,900&amp;display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<!-- globale vars sass-->
<!-- start pre_header-->
<div class="pre_header">
    <div class="container">
        <div class="row">
            <!-- use grid system bootstrap 4-->
            <div class="col-sm-12 col-md-6">
                <div class="links_pages text-center text-md-left">
                    <ul class="list-unstyled mb-0">
                        <!-- create by each loop sass-->
                        <li class="Home"><a class="a_hover_none" href="{{route('home')}}">Home</a></li>
                        <li class="Advertise"><a class="a_hover_none" href="#">Advertise</a></li>
                        <li class="About"><a class="a_hover_none" href="{{route('setting.about')}}">About</a></li>
                        <li class="contact"><a class="a_hover_none" href="{{route('setting.about')}}">contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- use grid system bootstrap 4-->
            <div class="col-sm-12 col-md-6">
                <div class="links_social text-center text-md-right">
                    <ul class="list-unstyled mb-0">
                        @if(!empty($linkes['facebook']))
                            <li>
                                <a class="a_hover_none" href="{{ $linkes['facebook'] }}" ><i class="fab fa-facebook-f"></i></a>
                            </li>
                        @endif
                        @if(!empty($linkes['twitter']))
                            <li>
                                <a class="a_hover_none" href="{{ $linkes['twitter'] }}" ><i class="fab fa-twitter"></i></a>
                            </li>
                        @endif
                        @if(!empty($linkes['instagram']))
                            <li>
                                <a class="a_hover_none" href="{{ $linkes['instagram'] }}" ><i class="fab fa-twitter"></i></a>
                            </li>
                        @endif
                        @if(!empty($linkes['youtube']))
                            <li>
                                <a class="a_hover_none"  href="{{$linkes['youtube'] }}"><i class="fab fa-youtube"></i></a>
                            </li>
                        @endif
                        @if(!empty($linkes['linkedin']))
                            <li>
                                <a class="a_hover_none" href="{{$linkes['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end pre header-->

<!-- start header-->
<header>
    <div class="overlay_search" tabIndex="-1">
        <form class="wrap" action="{{route('article.featured')}}" role="search">
            <input type="search" name="search" placeholder="Search ...">
            <p> Hit enter to search or ESC to close.</p>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <!-- use grid system bootstrap 4-->
            <div class="col-12 position-relative wrap_header">
                <div class="wrap_btn d-block d-lg-none">
                    <!-- use fontawsome 5 pro-->
                    <i class="fas fa-bars btn_sm_navbar"></i>
                </div>
                <div class="wrap_logo d-block d-lg-flex text-center">
                    <a href="{{route('home')}}" style="color:#000;display: contents;text-decoration: none;">
                        <img class="def_img d-none d-lg-block" src="{{$setting->image_path}}" alt="" srcset="">
                        <span>{{$setting->site_name}}</span>
                    </a>
                </div>
                <nav class="nav_bar" tabIndex="-1">
                    <div class="wrap_2_item">
                        <div class="wrap_logo d-flex d-lg-none">
                            <img class="def_img" src="./image/fn-logo.png" alt="" srcset="">
                            <span>{{$setting->site_name}}</span>
                        </div>
                        <ul class="list-unstyled mb-0 linksMainHeader">
                            <!-- create by sass loop-->
                            <li class="item_mainHeader">
                                <a class="a_hover_none hover_el" href="{{route('article.mostView')}}">Most viewed</a>
                            </li>
                            <li class="item_mainHeader li_drop_down">
                                <a class="a_hover_none hover_el" href="#">Categories
                                    <!-- show if type = 1-->
                                    <!-- use fontawsome 5 pro-->
                                    <i class="fas fa-angle-down v-mid"></i></a>
                                <!-- show if type = 1-->
                                <div class="wrap_cate">
                                    <ul class="list-unstyled mb-0 box_drop_down">
                                       @foreach($Categories as $category)
                                           @if(count($category->articles) > 0)
                                                <li class="li_item"><a class="a_hover_none hover_el" href="{{route('article.list', $category->id)}}">{{$category->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="wrap_bloger">
                                        @foreach($header as $article)
                                            <div class="box_blog">
                                            <div class="wrap_img">
                                                <a href="{{route('article.blog',$article->id)}}">
                                                    <img width="150px" height="100px" src="{{$article->image_path}}" alt="{{$article->name}}" srcset=""></a></div>
                                            <h2><a href="{{route('article.blog',$article->id)}}"> {{$article->name}} </a></h2><span class="date">{{ date("M d ,Y", strtotime($article->date)) }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li class="item_mainHeader">
                                <a class="a_hover_none hover_el" href="{{route('article.recent')}}">Recent</a>
                            </li>
                            <li class="item_mainHeader">
                                <a class="a_hover_none hover_el" href="{{route('article.featured')}}">Featured</a>
                            </li>
                            <li class="item_mainHeader">
                                <a class="a_hover_none hover_el" href="{{route('article.trend')}}">Trending</a>
                            </li>
                            <li class="item_mainHeader">
                                <a class="a_hover_none hover_el" href="ask_me.html">community</a>
                            </li>
                        </ul>
                    </div>
                    <div class="social d-block d-lg-none">
                        <ul class="list-unstyled mb-0">
                            @if(!empty($linkes['facebook']))
                                <li>
                                    <a class="a_hover_none hover_el" href="{{ $linkes['facebook'] }}" ><i class="fab fa-facebook-f"></i></a>
                                </li>
                            @endif
                            @if(!empty($linkes['twitter']))
                                <li>
                                    <a class="a_hover_none hover_el" href="{{ $linkes['twitter'] }}" ><i class="fab fa-twitter"></i></a>
                                </li>
                            @endif
                            @if(!empty($linkes['instagram']))
                                <li>
                                    <a class="a_hover_none hover_el" href="{{ $linkes['instagram'] }}" ><i class="fab fa-twitter"></i></a>
                                </li>
                            @endif
                            @if(!empty($linkes['youtube']))
                                <li>
                                    <a class="a_hover_none hover_el"  href="{{$linkes['youtube'] }}"><i class="fab fa-youtube"></i></a>
                                </li>
                            @endif
                            @if(!empty($linkes['linkedin']))
                                <li>
                                    <a class="a_hover_none hover_el" href="{{$linkes['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="aside_lg_screen d-none d-lg-flex">
                        <div class="wrap_2_item">
                            <div class="wrap_logo d-flex">
                                <img class="def_img" src="{{$setting->image_path}}" alt="" srcset="">
                                <span>{{$setting->site_name}}</span>
                            </div>
                            <ul class="list-unstyled mb-0 linksMainHeader">
                                <!-- create by sass loop-->
                                <li class="li_item"><a class="a_hover_none hover_el" href="#">Recent<span>4</span></a></li>
                                <li class="li_item"><a class="a_hover_none hover_el" href="#">Featured<span>4</span></a></li>
                                <li class="li_item"><a class="a_hover_none hover_el" href="#">Trending<span>4</span></a></li>
                            </ul>
                            <div class="aside_new_sletter_">
                                <div class="new_sletter mb-4">
                                    <h3>Newsletter</h3>
                                    <p>Subscribe to our newsletter and get our newest updates right on your email.</p>
                                    <form action="{{route('setting.news.Letters')}}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="email" placeholder="Your email address" required>
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <label for="">
                                            <input class="v-mid" type="checkbox" name="agree" required><a class="v-mid a_hover_none" href="#">I agree to the terms & conditions</a>
                                            @error('agree')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </label>
                                        <button class="hover_btn">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="social d-block">
                            <ul class="list-unstyled mb-0">
                                @if(!empty($linkes['facebook']))
                                    <li>
                                        <a class="a_hover_none hover_el" href="{{ $linkes['facebook'] }}" ><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                @endif
                                @if(!empty($linkes['twitter']))
                                    <li>
                                        <a class="a_hover_none hover_el" href="{{ $linkes['twitter'] }}" ><i class="fab fa-twitter"></i></a>
                                    </li>
                                @endif
                                @if(!empty($linkes['instagram']))
                                    <li>
                                        <a class="a_hover_none hover_el" href="{{ $linkes['instagram'] }}" ><i class="fab fa-twitter"></i></a>
                                    </li>
                                @endif
                                @if(!empty($linkes['youtube']))
                                    <li>
                                        <a class="a_hover_none hover_el"  href="{{$linkes['youtube'] }}"><i class="fab fa-youtube"></i></a>
                                    </li>
                                @endif
                                @if(!empty($linkes['linkedin']))
                                    <li>
                                        <a class="a_hover_none hover_el" href="{{$linkes['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="box_search">
                    <!-- use fontawsome 5 pro-->
                    <i class="fas fa-search v-mid hover_el"></i>
                </div>
                <div class="btn_md_screen d-none d-lg-block"><i class="fas fa-bars v-mid hover_el"></i></div>
            </div>
        </div>
    </div>
</header>
<!-- end header-->
<!-- start div overlay-->
<div class="over_lay" tabIndex="-1"></div>
<!-- end div overlay-->

<!-- start form_report-->
<div class="form_advertise" tabIndex="-1">
    <div class="wrap_contact animation_comeFromTop">
        <p>You may easily set up a contact form with plugin that fully supported by Berg. Below is the working form demo:</p>
        <form action="{{route('setting.contactUs')}}" method="post">
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
<!-- end form_report-->
