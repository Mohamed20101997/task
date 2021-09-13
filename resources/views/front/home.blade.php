@extends('layouts.front.app')

@section('content')

    <!-- start section slider-->
    <section class="slider">
        <div class="container">
            <div class="row">
                <!-- used grid system bootstap 4-->
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 main_slider mb-3 mb-md-0">
                            <div class="silder_1 owl-carousel">
                                @foreach($articleTrend as $trend)
                                    <div class="wrap_silder"><a class="over_lay_slider" href="#">
                                        </a><span class="name_bdg floating shadow_bdg"><a class="a_hover_none" href="#">Trending</a></span>
                                        <div class="wrap_img"><img width="200px" class="def_img" src="{{$trend->image_path}}" alt=""></div>
                                        <div class="wrap_info_blog"><a class="a_hover_none categore" href="{{route('article.blog',$trend->id)}}">{{$trend->category->name}}</a>
                                            <h2><a class="a_hover_none" href="{{route('article.blog',$trend->id)}}">{{$trend->name}}</a></h2>
                                            <ul class="list-unstyled mb-0 wrap_state">
                                                <li><span class="date">{{date("M d , Y", strtotime($trend->date)) }}</span></li>
                                                <li>
                                                    <!-- use FontAwsome Pro or Free-->
                                                    <span class="views"><i class="fas fa-chart-bar"></i> {{$trend->view}} views</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
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
                                                    <li><span class="date">{{date("M d , Y", strtotime($feature->date)) }}</span></li>
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
                                            <div class="wrap_silder"><a class="over_lay_slider" href="{{route('article.blog',$article->id)}}">
                                                </a><span class="name_bdg floating shadow_bdg"><a class="a_hover_none" href="list_category.html">Recent</a></span>
                                            <div class="wrap_img"><img class="def_img" src="{{$article->image_path}}" alt=""></div>
                                            <div class="wrap_info_blog"><a class="a_hover_none categore" href="a{{route('article.blog',$article->id)}}">{{$article->category->name}}</a>
                                                <h2><a class="a_hover_none" href="{{route('article.blog',$article->id)}}">{{$article->name}}</a></h2>
                                                <ul class="list-unstyled mb-0 wrap_state">
                                                    <li><span class="date">{{date("M d ,Y", strtotime($article->date)) }}</span></li>
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

                    @foreach($trends as $trend)
                        <div class="wrap_blog">
                        <div class="wrap_img"><a href="{{route('article.blog',$trend->id)}}"><img class="def_img" src="{{$trend->image_path}}" alt="{{$trend->name}}"></a></div>
                        <div class="wrap_info_blog"><a class="categore" href="{{route('article.list',$trend->category_id)}}">{{$trend->category->name}}</a>
                            <h2><a href="{{route('article.blog',$trend->id)}}">{{$trend->category->name}}</a></h2>
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li><span class="date">{{ date("M d ,Y", strtotime($trend->date)) }}</span></li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> {{$trend->view}} views</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
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
                            <div class="wrap_info"><a class="categore" href="{{route('article.list',$post->category_id)}}">{{$post->category->name}}</a>
                                <h2 class="mb-0"><a class="a_hover_none hover_el" href="{{route('article.blog',$post->id)}}">{{$post->name}}</a></h2>
                                <ul class="list-unstyled mb-0 wrap_state">
                                    <li><span>By </span><a class="a_hover_none" href="#">{{$post->author->name}}</a></li>
                                    <li><span class="date">{{ date("M d ,Y", strtotime($article->date)) }}</span></li>
                                    <li>
                                        <span class="views"><i class="fas fa-chart-bar"></i> {{$post->view}} views</span>
                                    </li>
                                </ul>
                                <p class="mb-0">{{Str::limit(strip_tags($post->description),81,'...')}}</p>
                                <!-- use FontAwsome Pro or Free-->
                                <a class="read_more a_hover_none" href="{{route('article.blog',$post->id)}}"> read more <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="clear_fix"></div>
                    @endforeach
                    <a href="{{route('article.featured')}}"><div class="load_more mb-4"><span class="hover_btn">load more posts</span></div></a>
                </div>

                @include('front._side')

            </div>
        </div>
    </section>
    <!-- end section list bloger-->


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
