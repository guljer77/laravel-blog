@extends('website.layouts.master')
@section('title')
    Category
@endsection
@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Category</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('content')
    <div class="col-lg-8">
        <div class="all-blog-posts">
            <div class="row">
                <h2>{{ $category->category_name }} - ({{ $category->tag_count }})</h2>
                @foreach($post as $singlePost)
                    <div class="col-lg-6">
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
            </div>
        </div>
    </div>
@endsection

