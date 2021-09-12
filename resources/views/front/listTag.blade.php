@extends('layouts.front.app')
 @section('content')
     <!-- start sections Breadcrumb-->
<section class="Breadcrumb">
    <h1>Tag: <span>{{$tagName}}</span></h1>
    <nav>
        @foreach($tags as $tag)
            <span><a class="a_hover_none hover_el" href="{{route('article.list.tag', $tag->id)}}">{{$tag->name}}</a></span>
        @endforeach
    </nav>
</section>
<!-- start sections Breadcrumb-->

<!-- start section artical_blog-->
<section class="lists_category">
    <div class="container">
        <div class="row">
            <!-- use grid system bootstrap 4-->
            <div class="col-sm-12 col-lg-8">
                <div class="wrap_lists_category">
                   @foreach($articles as $article)
                        <article>
                        <div class="wrap_img"><img class="def_img" src="{{$article->image_path}}" alt="{{$article->name}}" srcset=""></div>
                        <div class="wrpa_info"><a class="categore" href="#">{{$article->category->name}}</a>
                            <h2><a class="a_hover_none" href="#">{{$article->name}}</a></h2>
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li><span>By </span><a class="a_hover_none hover_el" href="#">{{$article->author->name}}</a></li>
                                <li><span class="date"></span></li>
                            </ul>
                            <p>{{ Str::limit(strip_tags($article->description),181,'...')  }}</p>
                            <a class="read_more a_hover_none hover_el" href="{{route('article.blog',$article->id)}}">read more<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <!-- start aside section-->
                <div class="aside">
                    <div class="row h-100">
                        <div class="col-sm-12 px-lg-0 wrap_aside">
                            <div class="wrap">
                                <div class="box_social mb-4">
                                    <h3>Social Links</h3>
                                    <ul class="list-unstyled mb-0">
                                        <!-- create by sass loop-->
                                        <li><a class="hover_el a_hover_none" href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a class="hover_el a_hover_none" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="hover_el a_hover_none" href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a class="hover_el a_hover_none" href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a class="hover_el a_hover_none" href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <div class="latest_posts mb-4">
                                    <h3>Latest Posts</h3>
                                    @foreach($latest as $lat)
                                        <div class="wrap_post">
                                        <div class="wrap_img"><a href="{{route('article.blog',$lat->id)}}"><img class="def_img" src="{{$lat->image_path}}" alt="{{$lat->name}}" srcset=""></a></div>
                                        <div class="wrap_info">
                                            <h4><a class="a_hover_none hover_el" href="{{route('article.blog',$lat->id)}}">
                                                    The Accessibility, Hierarchy, and Organisation of a Book</a>
                                            </h4><span class="date">{{date("M d,Y", strtotime($lat->date)) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="new_sletter mb-4">
                                <h2 class="_3d hover_btn"><a class="a_hover_none d-block" href="ask_me.html">3d calculator</a></h2>
                                <h3>Newsletter</h3>
                                <p>Subscribe to our newsletter and get our newest updates right on your email.</p>
                                <form action="">
                                    <input type="text" name="" placeholder="Your email address">
                                    <label for="">
                                        <input class="v-mid" type="checkbox" name=""><a class="v-mid a_hover_none" href="#">I agree to the terms & conditions</a>
                                    </label>
                                    <button class="hover_btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end aside section-->
            </div>
        </div>
    </div>
</section>
<!-- end section artical_blog-->


 @endsection
