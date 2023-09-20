@extends('admin.master')
@section('title','Details-post')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Details Post</h5>
                <a href="{{route('all-post')}}" class="btn btn-primary">All Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Post Name</td>
                            <td>{{ $post->post_title }}</td>
                        </tr>
                        <tr>
                            <td>Category Name</td>
                            @php
                                $category_name = \App\Models\Category::where('id',$post->category_name)->value('category_name');
                            @endphp
                            <td>{{ $category_name }}</td>
                        </tr>
                        <tr>
                            <td>Tag Name</td>
                            @php
                                $tag_name = \App\Models\Tag::where('id',$post->tag_name)->value('tag_name');
                            @endphp
                            <td>{{ $tag_name }}</td>
                        </tr>
                        <tr>
                            <td>Post Description</td>
                            <td>{!! $post->post_des !!}</td>
                        </tr>
                        <tr>
                            <td>Post Image</td>
                            <td>
                                <img src="{{ asset($post->post_image) }}" alt="" width="250" height="250">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

