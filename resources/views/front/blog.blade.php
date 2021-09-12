@extends('layouts.front.app')

@section('content')

    <!-- start section artical_blog-->
    <section class="artical_blog">
        <div class="container">
            <div class="row">
                <!-- use grid system bootstrap 4-->
                <div class="col-sm-12 col-lg-8">
                    <div class="artical">
                        <div class="wrap_img"><img class="def_img" src="{{$article->image_path}}" alt=""></div>
                        <div class="wrap_info"><a class="categore a_hover_none" href="list_category.html">{{$article->category->name}}</a>
                            <h2>{{$article->name}}</h2>
                            <ul class="list-unstyled wrap_state">
                                <li><span>By </span><a class="a_hover_none" href="user_profile.html">{{$article->author->name}}</a></li>
                                <li><span class="date">{{date("d-m-Y", strtotime($article->date)) }}</span></li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> {{$article->view}} views</span>
                                </li>
                            </ul>
                            <p>{!! $article->description !!}</p>
                            <div class="tags">
                                <ul class="list-unstyled">
                                    @foreach($article->tags as $tag)
                                        <li><a href="list_category.html">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="footer">
                            <ul class="list-unstyled mb-0 wrap_state">
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <a class="comment hover_el a_hover_none" href="#"><i class="far fa-comment"></i> {{$commentsCount}} comments</a>
                                </li>
                                <li>
                                    <!-- use FontAwsome Pro or Free-->
                                    <span class="views"><i class="fas fa-chart-bar"></i> {{$article->view}} views</span>
                                </li>
                            </ul>
                            <ul class="list-unstyled mb-0 wrap_social">
                                <li>Share:</li>
                                <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="a_hover_none hover_el" href="#"><i class="far fa-envelope"></i></a></li>
                            </ul>
                        </div>
                        <div class="auther">
                            <div class="wrap_user"><a href="user_profile.html"><img class="def_img" src="./image/user.png" alt="user"></a></div>
                            <div class="wrap_user_content">
                                <h4><a class="a_hover_none hover_el" href="user_profile.html">Mark Scienstein</a></h4>
                                <p>I'm a consultant, technology enthusiast, comic book reader, gamer, husband, father and all-around nerd.</p>
                                <ul class="list-unstyled mb-0 wrap_social">
                                    <li><a class="a_hover_none hover_el" href="#"><i class="fas fa-globe-asia"></i></a></li>
                                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="m_page">
                            <div class="row">

                                @isset($previous->name)
                                <div class="col-sm-12 col-md-6 prev_post text-left text-md-left"><a class="a_hover_none" href="{{route('article.blog',$previous->id)}}"><span>Prev Post</span>
                                        <h5 class="hover_el">{{$previous->name}}</h5></a></div>
                                @endisset

                                @isset($next->name)
                                    <div class="col-sm-12 col-md-6 next_post text-left text-md-right">
                                        <a class="a_hover_none" href="{{route('article.blog',$next->id)}}"><span>next Post</span>
                                            <h5 class="hover_el">{{$next->name}}</h5></a>
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="related_Posts">
                            <h2>Related Posts</h2>
                            <div class="sliders_posts owl-carousel">
                                @foreach($related as $relate)
                                    <div class="wrap_blog">
                                    <div class="wrap_img"><img class="def_img" src="{{$relate->image_path}}" alt=""></div>
                                    <div class="wrap_info_blog"><a class="categore" href="list_category.html">{{$relate->category->name}}</a>
                                        <h2><a href="{{route('article.blog',$relate->id)}}">{{$relate->name}}</a></h2>
                                        <ul class="list-unstyled mb-0 wrap_state">
                                            <li><span class="date">{{date("d-m-Y", strtotime($relate->date)) }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="type_comment">
                            <h3>Leave a comment</h3>
                            <p>Your email address will not be published. Required fields are marked</p>
                            <form action="{{route('article.comment')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <!-- use grid system bootstrap 4-->
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                    <div class="col-12 wrap_textarea">
                                        <textarea name="comment" rows="4" placeholder="Type your cpmment"></textarea>
                                    </div>
                                    <!-- use grid system bootstrap 4-->
                                    <div class="col-sm-12 col-md-6 col-lg-4 wrap_input">
                                        <input name="name" type="text" placeholder="Name*">
                                    </div>
                                    <!-- use grid system bootstrap 4-->
                                    <div class="col-sm-12 col-md-6 col-lg-4 wrap_input">
                                        <input name="email" type="email" placeholder="Email*">
                                    </div>
                                    <!-- use grid system bootstrap 4-->
                                    <div class="col-sm-12 col-lg-4 wrap_input">
                                        <input name="website" type="url" placeholder="Website">
                                    </div>
                                    <!-- use grid system bootstrap 4-->
                                    <div class="col-12">
                                        <label for="a_1">
                                            <input type="checkbox" name="save" id="a_1"><span>Save my name, email, and website in this browser for the next time I comment.</span>
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn hover_btn">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @foreach($comments as $comment)
                            <div class="auther">
                            <div class="wrap_user"><i class="fa fa-comments-alt fa-1x"></i></div>
                            <div class="wrap_user_content">
                                <h4>{{$comment->name}} : {{$comment->email}}</h4>
                                <span>{{$comment->created_at->toFormattedDateString()}}</span>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                        @endforeach
                        {{ $comments->appends(request()->query())->links() }}
                    </div>
                </div>
                @include('front._side')
            </div>
        </div>
    </section>
    <!-- end section artical_blog-->

@endsection
