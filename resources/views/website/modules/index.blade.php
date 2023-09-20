@extends('website.layouts.master')
@section('title')
    Welcome
@endsection
@section('banner')
    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">
                @foreach($banner as $item)
                <div class="item">
                    <img src="{{ asset($item->post_image) }}" alt="" style="height: 350px">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                @php
                                    $tag_name = \App\Models\Tag::where('id',$item->tag_name)->value('tag_name')
                                @endphp
                                <span>{{ $tag_name }}</span>
                            </div>
                            <a href="{{ route('details',[$item->id, $item->slug]) }}"><h4>{{ $item->post_title }}</h4></a>
                            <ul class="post-info">
                                <li><a href="#">Admin</a></li>
                                <li><a href="#">May 12, 2020</a></li>
                                <li><a href="#">12 Comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-lg-8">
        <div class="all-blog-posts">
            <div class="row">
                @foreach($post as $singlePost)
                    <div class="col-lg-12">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img src="{{ asset($singlePost->post_image) }}" alt="" style="height: 260px">
                            </div>
                            <div class="down-content">
                                @php
                                    $tag_name = \App\Models\Tag::where('id',$singlePost->tag_name)->value('tag_name')
                                @endphp
                                <span>{{ $tag_name }}</span>
                                <a href="{{ route('details',[$singlePost->id, $singlePost->slug]) }}"><h4>{{ $singlePost->post_title }}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">{{ date('t') }}</a></li>
                                    <li><a href="#">12 Comments</a></li>
                                </ul>
                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="post-tags">
                                                <li><i class="fa fa-tags"></i></li>
                                                <li><a href="#">Hunters</a>,</li>
                                                <li><a href="#">Programs</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="main-button">
                        <a href="{{ route('blog') }}">View All Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
