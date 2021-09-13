@extends('layouts.dashboard.app')

@section('content')

    <h1>Settings</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Settings</li>
    </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="tile mb4">
                <form action="{{route('setting.edit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" name="site_name" class="form-control" value="{{ old('site_name',isset($setting->site_name) ? $setting->site_name: '') }}">

                                @error('site_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email',isset($setting->email) ? $setting->email: '') }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col email --}}
                        <div class="col-md-4">
                            {{--  phone --}}
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone',isset($setting->phone) ? $setting->phone: '') }}">

                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of colphone --}}
                    </div> {{-- end of row --}}
                    <div class="row">
                        <div class="col-md-4">
                            {{-- description --}}
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ old('description',isset($setting->description) ? $setting->description: '') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col address --}}
                        <div class="col-md-4">
                            {{-- address --}}
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{ old('address',isset($setting->address) ? $setting->address: '') }}</textarea>
                                @error('address')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col address --}}
                        <div class="col-md-4">
                            {{--  logo --}}
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @error('logo')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of logo --}}
                    </div> {{-- end of row --}}
                    <div class="row">
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="url" name="social_links[facebook]" class="form-control" value="{{ old("social_links[facebook]",!empty($linkes['facebook']) ? $linkes['facebook'] : '') }}">
                                @error("social_links[facebook]")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="url" name="social_links[youtube]" class="form-control" value="{{ old("social_links[youtube]",!empty($linkes['youtube']) ? $linkes['youtube']: '') }}">
                                @error("social_links[youtube]")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="url" name="social_links[instagram]" class="form-control" value="{{ old("social_links[instagram]",!empty($linkes['instagram']) ? $linkes['instagram']: '') }}">
                                @error("social_links[instagram]")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                    </div> {{-- end of row --}}
                    <div class="row">
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>LinkedIn</label>
                                <input type="url" name="social_links[linkedin]" class="form-control" value="{{ old("social_links[linkedin]",!empty($linkes['linkedin']) ? $linkes['linkedin']: '') }}">
                                @error("social_links[linkedin]")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="url" name="social_links[twitter]" class="form-control" value="{{ old("social_links[twitter]",!empty($linkes['twitter'] ) ? $linkes['twitter'] : '') }}">
                                @error("social_links[twitter]")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Gmail</label>
                                <input type="email" name="social_links[gmail]" class="form-control" value="{{ old("social_links[gmail]",!empty($linkes['gmail']) ? $linkes['gmail']: '') }}">
                                @error("social_links[gmail]")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Term Condition</label>
                                <textarea id="summernote" class="form-control" name="term_condition"> {!! old('term_condition',isset($setting->term_condition) ? $setting->term_condition: '') !!} </textarea>
                                @error('term_condition')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Privacy</label>
                                <textarea id="summernote1" class="form-control" name="privacy"> {!! old('privacy',isset($setting->privacy) ? $setting->privacy: '') !!} </textarea>
                                @error('privacy')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Us</label>
                                <textarea id="summernote2" class="form-control" name="about"> {!! old('about',isset($setting->about) ? $setting->about: '') !!} </textarea>
                                @error('about')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                    </div>

                </form>

            </div>{{-- end of tile  --}}
        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection

