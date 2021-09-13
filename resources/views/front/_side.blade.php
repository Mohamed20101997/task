@php
$articles = \App\Models\Article::where('status', 1)->orderBy('date','ASC')->take(5)->get();
@endphp

<div class="col-sm-12 col-lg-4">
    <!-- start aside section-->
    <div class="aside">
        <div class="row h-100">
            <div class="col-sm-12 px-lg-0 wrap_aside">
                <div class="wrap">
                    <div class="box_social mb-4">
                        <h3>Social Links</h3>
                        @php
                            $setting = \App\Models\Setting::first();
                               if($setting){
                               $linkes = json_decode($setting->social_links, true);
                               }else{
                                   $linkes =[];
                               }
                        @endphp
                        <ul class="list-unstyled mb-0">
                            @if(!empty($linkes['facebook']))
                                <li><a class="hover_el a_hover_none" href="{{ $linkes['facebook'] }}"><i class="fab fa-facebook"></i></a></li>
                            @endif
                            @if(!empty($linkes['twitter']))
                                <li><a class="hover_el a_hover_none" href="{{ $linkes['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                            @endif

                            @if(!empty($linkes['instagram']))
                                <li><a class="hover_el a_hover_none" href="{{ $linkes['instagram'] }}"><i class="fab fa-instagram"></i></a></li>
                            @endif

                            @if(!empty($linkes['youtube']))
                                <li><a class="hover_el a_hover_none" href="{{ $linkes['youtube'] }}"><i class="fab fa-youtube"></i></a></li>
                            @endif

                            @if(!empty($linkes['linkedin']))
                                <li><a class="hover_el a_hover_none" href="{{ $linkes['linkedin'] }}"><i class="fab fa-linkedin"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="latest_posts mb-4">
                        <h3>Latest Posts</h3>
                        <!-- create by sass loop-->
                        @foreach($articles as $article)
                            <div class="wrap_post">
                                <div class="wrap_img"><a href="{{route('article.blog',$article->id)}}"><img class="def_img" src="{{$article->image_path}}" alt="" srcset=""></a></div>
                                <div class="wrap_info">
                                    <h4><a class="a_hover_none hover_el" href="{{route('article.blog',$article->id)}}">{{$article->name}}</a></h4><span class="date">{{date("d-m-Y", strtotime($article->date)) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="new_sletter mb-4">
                    <h2 class="_3d hover_btn"><a class="a_hover_none d-block" href="ask_me.html">3d calculator</a></h2>
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter and get our newest updates right on your email.</p>
                    <form action="{{route('setting.news')}}" method="post">
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
    </div>
    <!-- end aside section-->
</div>
