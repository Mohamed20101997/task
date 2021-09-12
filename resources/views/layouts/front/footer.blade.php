
<!-- start footer-->
<footer>
    <div class="container">
        <div class="row">
            <!-- used grid system botstrap 4-->
            <div class="col-sm-12 col-md-12 col-lg-4 about_site order-3 order-lg-1">
                <div class="wrap_logo">
                    <a class="a_hover_none" href="index.html">
                        <img class="def_img" src="{{asset('front/image/fn-logo.png')}}" alt="logo" srcset="">
                        <span>Trabelshot</span>
                    </a>

                </div>
                <p class="mb-0">About text goes here, you can put a few lines that describe about your site to your visitors.</p>
                <ul class="list-unstyled mb-0">
                    <!-- create by sass loop-->
                    <!-- use icon fontAwsome 5-->
                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-facebook"></i></a></li>
                    <!-- use icon fontAwsome 5-->
                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-twitter"></i></a></li>
                    <!-- use icon fontAwsome 5-->
                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-instagram"></i></a></li>
                    <!-- use icon fontAwsome 5-->
                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-youtube"></i></a></li>
                    <!-- use icon fontAwsome 5-->
                    <li><a class="a_hover_none hover_el" href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- used grid system botstrap 4-->
            <div class="col-sm-12 col-md-6 col-lg-4 lastes_post order-1 order-lg-2">
                <h3>Latest Posts</h3>

                @foreach($latest as $lat)
                    <div class="wrap_post">
                    <div class="wrap_img"><a href="{{route('article.blog',$lat->id)}}">
                            <img class="def_img" src="{{$lat->image_path}}" alt=""></a>
                    </div>
                    <div class="wrap_info">
                        <h4><a class="a_hover_none hover_el" href="{{route('article.blog',$lat->id)}}">{{$lat->name}}</a></h4><span class="date">{{date("M d,Y", strtotime($lat->date)) }}</span>
                    </div>
                </div>
                @endforeach

                <h3>popular questions</h3>
                <!-- create by sass loop-->
                <div class="wrap_post">
                    <div class="wrap_img"><a href="view_question.html"><img class="def_img ques" src="{{asset('front/image/avatar.png')}}" alt=""></a></div>
                    <div class="wrap_info">
                        <h4><a class="a_hover_none hover_el" href="view_question.html">Options for Your Activity Tracking Smart Watch</a></h4><span class="date">June 4, 2019              </span>
                    </div>
                </div>
                <div class="wrap_post">
                    <div class="wrap_img"><a href="view_question.html"><img class="def_img ques" src="{{asset('front/image/avatar.png')}}" alt=""></a></div>
                    <div class="wrap_info">
                        <h4><a class="a_hover_none hover_el" href="view_question.html">Options for Your Activity Tracking Smart Watch</a></h4><span class="date">June 4, 2019              </span>
                    </div>
                </div>
            </div>
            <!-- used grid system botstrap 4-->
            <div class="col-sm-12 col-md-6 col-lg-4 tags order-2 order-lg-3">
                <h3>Tags</h3>
                <ul class="list-unstyled">
                    @foreach($tags as $tag)
                        @if(count($tag->articles) > 0)
                            <li><a class="a_hover_none" href="{{route('article.list.tag',$tag->id)}}">{{$tag->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="hr"></div>
    <div class="container">
        <div class="row">
            <!-- used grid system botstrap 4-->
            <div class="col-sm-12 pre_footer">
                <ul class="list-unstyled d-none d-md-block">
                    <!-- create by sass loop-->
                    <li><a class="a_hover_none hover_el" href="terms_and_conditions.html">Disclaimer</a></li>
                    <li><a class="a_hover_none hover_el" href="terms_and_conditions.html">Terms &amp; Conditions</a></li>
                    <li><a class="a_hover_none hover_el" href="terms_and_conditions.html">Privacy Policy</a></li>
                    <li><a class="a_hover_none hover_el" href="ask_me.html">community</a></li>
                    <li><a class="a_hover_none hover_el" href="terms_and_conditions.html">3d calculator</a></li>
                </ul>
                <div class="copy_right text-left text-md-center">© 2021 Scienstein. All rights reserved.</div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer-->
<script src="{{ asset('front/js/popper.js') }}"></script>
<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/js/jQuery.tagify.min.js') }}"></script>
<script src="{{ asset('front/js/tagify.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('front/js/app.js') }}"></script>
</body>
</html>
