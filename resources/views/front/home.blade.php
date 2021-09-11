@extends('layouts.front.app')

@section('content')
    <!-- start div overlay-->
    <div class="over_lay" tabIndex="-1"></div>
    <!-- end div overlay-->

    <!-- start form_report-->
    <div class="form_advertise" tabIndex="-1">
        <div class="wrap_contact animation_comeFromTop">
            <p>You may easily set up a contact form with plugin that fully supported by Berg. Below is the working form demo:</p>
            <form action="">
                <!-- create by sass loop-->
                <div class="wrap_filde">
                    <label for="#1">Company Name</label>
                    <input type="text" name="" placeholder="techunique">
                </div>
                <!-- create by sass loop-->
                <div class="wrap_filde">
                    <label for="#2">Email address</label>
                    <input type="email" name="" placeholder="john@example.com">
                </div>
                <div class="wrap_filde">
                    <label for="">Descrption</label>
                    <textarea name="" cols="40" rows="5" placeholder="Type your message"></textarea>
                </div>
                <button class="btn">Submit</button>
            </form>
        </div>
    </div>
    <!-- end form_report-->

    <!-- start section slider-->
    <section class="slider">
        <div class="container">
            <div class="row">
                <!-- used grid system bootstap 4-->
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 main_slider mb-3 mb-md-0">
                            <div class="silder_1 owl-carousel">
                                <div class="wrap_silder"><a class="over_lay_slider" href="#">
                                    </a><span class="name_bdg floating shadow_bdg"><a class="a_hover_none" href="#">Trending</a></span>
                                    <div class="wrap_img"><img width="200px" class="def_img" src="" alt=""></div>
                                    <div class="wrap_info_blog"><a class="a_hover_none categore" href="#">mobile</a>
                                        <h2><a class="a_hover_none" href="#">Flutter and Fuchsia, the death of React & Android?</a></h2>
                                        <ul class="list-unstyled mb-0 wrap_state">
                                            <li><span class="date">june 6, 2019</span></li>
                                            <li>
                                                <!-- use fontAwsome 5--><span class="views"><i class="fas fa-chart-bar"></i> 2.4k views</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- used grid system bootstap 4-->
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <!-- used grid system bootstap 4-->
                                <div class="col-sm-12 col-lg-6 mb-3 px-md-0 pr-lg-2 wrap_sub_slider_1">
                                    <!-- create by lib owl-carousel-->
                                    <div class="silder_1 sub_slider owl-carousel">
                                       @foreach($featured as $feature)
                                            <div class="wrap_silder"><a class="over_lay_slider" href="{{route('article.blog',$feature->id)}}"></a><span class="name_bdg floating shadow_bdg"><a class="a_hover_none" href="list_category.html">Featured</a></span>
                                            <div class="wrap_img">
                                                <img class="def_img" height="200px" src="{{$feature->image_path}}" alt="">
                                            </div>
                                            <div class="wrap_info_blog"><a class="a_hover_none categore" href="{{route('article.blog',$feature->id)}}">{{$feature->category->name}}</a>
                                                <h2><a class="a_hover_none" href="{{route('article.blog',$feature->id)}}">{{$feature->name}}</a></h2>
                                                <ul class="list-unstyled mb-0 wrap_state">
                                                    <li><span class="date">{{date("d-m-Y", strtotime($feature->date)) }}</span></li>
                                                    <li>
                                                        <!-- use FontAwsome Pro or Free-->
                                                        <span class="views"><i class="fas fa-chart-bar"></i> {{$feature->view}} views</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- used grid system bootstap 4-->
                                <div class="col-sm-12 col-lg-6 mb-3 px-md-0 pl-lg-2 wrap_sub_slider_2">
                                    <!-- create by lib owl-carousel-->
                                    <div class="silder_1 sub_slider owl-carousel">
                                        @foreach($articles as $article)
                                            <div class="wrap_silder"><a class="over_lay_slider" href="a{{route('article.blog',$article->id)}}">
                                                </a><span class="name_bdg floating shadow_bdg"><a class="a_hover_none" href="list_category.html">Recent</a></span>
                                            <div class="wrap_img"><img class="def_img" src="{{$article->image_path}}" alt=""></div>
                                            <div class="wrap_info_blog"><a class="a_hover_none categore" href="a{{route('article.blog',$article->id)}}">{{$article->category->name}}</a>
                                                <h2><a class="a_hover_none" href="a{{route('article.blog',$article->id)}}">{{$article->name}}</a></h2>
                                                <ul class="list-unstyled mb-0 wrap_state">
                                                    <li><span class="date">{{date("d-m-Y", strtotime($article->date)) }}</span></li>
                                                    <li>
                                                        <!-- use FontAwsome Pro or Free-->
                                                        <span class="views"><i class="fas fa-chart-bar"></i> {{$article->view}} views</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- used grid system bootstap 4-->
                                <div class="col-sm-12 px-md-0 wrap_sub_slider_3">
                                    <!-- create by lib owl-carousel-->
                                    <div class="silder_1 sub_slider owl-carousel">
                                        <!-- create by sass loop-->
                                        <div class="wrap_silder"><a class="over_lay_slider" href="ask_me.html"></a><span class="name_bdg floating shadow_bdg"><a class="a_hover_none" href="list_category.html">3d calculator</a></span>
                                            <div class="wrap_img"><a href="ask_me.html"><img class="def_img" src="{{asset('front/image/s_3.jpg')}}" alt=""></a></div>
                                            <div class="wrap_info_blog"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section slider-->

    <!-- start section ad-google-->
    <section class="ads">
        <div class="container">
            <div class="wrap_ads"></div>
        </div>
    </section>
    <!-- start section ad-google-->

    <!-- start section trending_store-->
    <section class="trending_blogs">
        <div class="container">
            <div class="row">
                <!-- used grid system bootstap 4-->
                <div class="col-12 title">
                    <h2>Trending Stories</h2>
                    <p class="mb-0">Don't miss to check out our most popular posts</p>
                </div>
                <!-- used grid system bootstap 4-->
                <div class="col-12 sliders_blogs owl-carousel owl-theme">
                    <!-- create by sass loop-->
                    <div class="wrap_blog">
                        <div class="wrap_img"><a href="artical_blog.html"><img class="def_img" src="{{asset('front/image/blog.jpg')}}" alt=""></a></div>
                        <div class="wrap_info_blog"><a class="categore" href="list_category.html">mobile</a>
                            <h2><a href="artical_blog.html"> How to Stop Checking Your Phone Like an Addict</a></h2>
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li><span class="date">june 6, 2019</span></li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> 2.4k views</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap_blog">
                        <div class="wrap_img"><a href="artical_blog.html"><img class="def_img" src="{{asset('front/image/blog.jpg')}}" alt=""></a></div>
                        <div class="wrap_info_blog"><a class="categore" href="list_category.html">mobile</a>
                            <h2><a href="artical_blog.html"> How to Stop Checking Your Phone Like an Addict</a></h2>
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li><span class="date">june 6, 2019</span></li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> 2.4k views</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap_blog">
                        <div class="wrap_img"><a href="artical_blog.html"><img class="def_img" src="{{asset('front/image/blog.jpg')}}" alt=""></a></div>
                        <div class="wrap_info_blog"><a class="categore" href="list_category.html">mobile</a>
                            <h2><a href="artical_blog.html"> How to Stop Checking Your Phone Like an Addict</a></h2>
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li><span class="date">june 6, 2019</span></li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> 2.4k views</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap_blog">
                        <div class="wrap_img"><a href="artical_blog.html"><img class="def_img" src="{{asset('front/image/blog.jpg')}}" alt=""></a></div>
                        <div class="wrap_info_blog"><a class="categore" href="list_category.html">mobile</a>
                            <h2><a href="artical_blog.html"> How to Stop Checking Your Phone Like an Addict</a></h2>
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li><span class="date">june 6, 2019</span></li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> 2.4k views</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section trending_store-->

    <!-- start section ad-google-->
    <section class="ads">
        <div class="container">
            <div class="wrap_ads"></div>
        </div>
    </section>
    <!-- start section ad-google-->

    <!-- start section list bloger-->
    <section class="list_bloger">
        <div class="container">
            <div class="row">
                <!-- used grid system bootstap 4-->
                <div class="col-sm-12 col-md-12 col-lg-8">

                    @foreach($posts as $post)
                        <div class="wrap_blog">
                            <div class="wrap_img"><span class="name_bdg">Pinned</span><a href="{{route('article.blog',$post->id)}}"><img class="def_img" src="{{$post->image_path}}"  alt="" srcset=""></a></div>
                            <div class="wrap_info"><a class="categore" href="list_category.html">{{$post->category->name}}</a>
                                <h2 class="mb-0"><a class="a_hover_none hover_el" href="{{route('article.blog',$post->id)}}">{{$post->name}}</a></h2>
                                <ul class="list-unstyled mb-0 wrap_state">
                                    <li><span>By </span><a class="a_hover_none" href="#">{{$post->author->name}}</a></li>
                                    <li><span class="date">{{date("d-m-Y", strtotime($article->date)) }}</span></li>
                                    <li>
                                        <span class="views"><i class="fas fa-chart-bar"></i> {{$post->view}} views</span>
                                    </li>
                                </ul>
                                <p class="mb-0">{{strip_tags(substr($post->description,0,81))}}....</p>
                                <!-- use FontAwsome Pro or Free-->
                                <a class="read_more a_hover_none" href="{{route('article.blog',$post->id)}}"> read more <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="clear_fix"></div>
                    @endforeach
                    <div class="load_more mb-4"><span class="hover_btn">load more posts</span></div>
                </div>

                @include('front._side')

            </div>
        </div>
    </section>
    <!-- end section list bloger-->

    <!-- start floating btn contact us-->
    <button class="btn btn_floating hover_btn"><i class="fas fa-user-headset"></i></button>
    <!-- end floating btn contact us-->



{{--    <!-- start box newslatter-->--}}
{{--    <div class="wrap_new_sletter">--}}
{{--        <div class="new_sletter mb-4">--}}
{{--            <h3>Newsletter <i class="fas fa-times hover_el close_newslatter"></i></h3>--}}
{{--            <p>Subscribe to our newsletter and get our newest updates right on your email.</p>--}}
{{--            <form action="">--}}
{{--                <input type="text" name="" placeholder="Your email address">--}}
{{--                <label for="">--}}
{{--                    <input class="v-mid" type="checkbox" name=""><a class="a_hover_none" href="#">I agree to the terms & conditions</a>--}}
{{--                </label>--}}
{{--                <button class="hover_btn">Subscribe</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- start box newslatter          -->--}}


@endsection
