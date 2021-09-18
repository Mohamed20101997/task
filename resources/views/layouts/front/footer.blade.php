<!-- start floating btn contact us-->
<button class="btn btn_floating hover_btn"><i class="fas fa-user-headset"></i></button>
<!-- end floating btn contact us-->

<!-- start contact us-->
<div class="contact_us" tabIndex="-1">
    <div class="wrap_contact">
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
<!-- end contact us-->
<!-- start footer-->
<footer>
    <div class="container">
        <div class="row">
            <!-- used grid system botstrap 4-->
            <div class="col-sm-12 col-md-12 col-lg-4 about_site order-3 order-lg-1">
                <div class="wrap_logo">
                    <a class="a_hover_none" href="{{route('home')}}">
                        <img class="def_img" src="{{$setting->image_path}}" alt="logo" srcset="">
                        <span>{{$setting->site_name}}</span>
                    </a>

                </div>
                <p class="mb-0">{{$setting->description}}</p>
                <ul class="list-unstyled mb-0">
                    <!-- create by sass loop-->
                    <!-- use icon fontAwsome 5-->
                    @if(!empty($linkes['facebook']))
                        <li><a class="a_hover_none hover_el" href="{{ $linkes['facebook'] }}"><i class="fab fa-facebook"></i></a></li>
                    @endif
                    @if(!empty($linkes['twitter']))
                        <li><a class="a_hover_none hover_el" href="{{ $linkes['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                    @endif

                    @if(!empty($linkes['instagram']))
                        <li><a class="a_hover_none hover_el" href="{{ $linkes['instagram'] }}"><i class="fab fa-instagram"></i></a></li>
                    @endif

                    @if(!empty($linkes['youtube']))
                        <li><a class="a_hover_none hover_el" href="{{ $linkes['youtube'] }}"><i class="fab fa-youtube"></i></a></li>
                    @endif

                    @if(!empty($linkes['linkedin']))
                        <li><a class="a_hover_none hover_el" href="{{ $linkes['linkedin'] }}"><i class="fab fa-linkedin"></i></a></li>
                    @endif
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
                    <li><a class="a_hover_none hover_el" href="{{route('setting.term')}}">Terms &amp; Conditions</a></li>
                    <li><a class="a_hover_none hover_el" href="{{route('setting.privacy')}}">Privacy Policy</a></li>
                    <li><a class="a_hover_none hover_el" href="{{route('setting.about')}}">About</a></li>
                    <li><a class="a_hover_none hover_el" href="#">3d calculator</a></li>
                    <li><a class="a_hover_none hover_el" href="#">community</a></li>
                </ul>
                <div class="copy_right text-left text-md-center">{{$setting->property_rights}}</div>
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
