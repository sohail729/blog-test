@extends('layouts.front')
@section('title', 'Blog')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            @foreach ($posts_chunks as $posts)
            <div class="col-md-6">
                @foreach ($posts as $post)
                <a href="{{ route('front.posts.show', $post->slug) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ $post->image ? asset('uploads/images/'.$post->image) : asset('assets/front/images/not-found.png') }}')">
                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <p class="m-0"> <span class="post-category bg-danger">{{ $post->category }}</span></p>
                        <small>
                            <span class="">{{ $post->author }}</span>
                            <span>|</span>
                            <span class="">{{ date("F jS, Y", strtotime($post->created_at)) }}</span>
                        </small>
                    </div>
                </a>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($recent_posts as $key => $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('front.posts.show', $post->slug) }}">
                        @if ($post->image)
                        <img src="{{ asset('uploads/images/'.$post->image)}}" alt="Image" class="img-fluid rounded">                            
                        @else                            
                        <img src="{{ asset('assets/front/images/not-found.png')}}" alt="Image" class="img-fluid rounded">
                        @endif
                    </a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $post->category->title }}</span>
                        <h2><a href="{{ route('front.posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left">
                                <img src="{{ asset('assets/front/images/person_1.jpg')}}" alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="javascript:void(0)">{{ $post->author->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ date("F jS, Y", strtotime($post->created_at)) }}</span>
                        </div>
                        <p>{!! htmlToText($post->content, 150) ?? 'No Content' !!}</p>
                        <p><a href="{{ route('front.posts.show', $post->slug) }}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-rounded">Load More</a> -->
                <div class="pagination">
                    {{ $recent_posts->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection