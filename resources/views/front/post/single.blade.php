@extends('layouts.front')
@section('title', $post->title)
@section('content')

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('uploads/images/'.$post->image)}}')">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{ $post->category->title }}</span>
                    <h1 class="mb-4"><a href="javascript:void(0)">{{ $post->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset('assets/front/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By {{ $post->author->name }}</span>
                        <span>&nbsp;-&nbsp; {{ date("F jS, Y", strtotime($post->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="post-content-body">
                    {!! $post->content ?? 'No Content' !!}
                </div>
                <div class="pt-5">
                    <p>Category: <a href="#">{{ $post->category->title }}</a></p>
                </div>
                <div class="pt-5 {{$post->content ?? 'd-none'}}">
                    <h3 class="mb-5">{{ $post->comments->count() }} Comments</h3>
                    <ul class="comment-list">
                        @foreach ($post->comments as $key => $comment )
                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('assets/front/images/person_1.jpg')}}" alt="{{ $comment->name }}">
                            </div>
                            <div class="comment-body">
                                <h3>{{ $comment->name }}</h3>
                                <div class="meta">{{ date("F jS, Y", strtotime($comment->created_at)) }}</div>
                                <p>{{ $comment->message}}</p>
                                @if(!$loop->last)
                                <hr>@endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <p id="commentMsg" class="alert alert-success d-none"></p>
                        <form id="commentForm" method="post" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" name="name" required class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" name="email" required class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea name="message" id="message" required cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{ $post->id }}" id="post_id">
                                <input type="submit" id="commentFormBtn" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="{{ asset('assets/front/images/person_1.jpg')}}" alt="Image Placeholder" class="img-fluid mb-5">
                        <div class="bio-body">
                            <h2>{{ $post->author->name }}</h2>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt
                                repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach ($categories as $category )
                        <li><a href="{{ route('front.categories.show', $category->slug)}}">{{ $category->title }} <span>({{ $category->getPostsCount() }})</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script>
    $("#commentForm").validate({
        submitHandler: function(form) {
            $("#commentFormBtn").val("Processing...");
            $("#commentFormBtn").prop("disabled", true);
            let formData = $(form).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});
            $.ajax({
                type: "post",
                url: "{{ route('front.comment.submit') }}",
                data: {
                    values: formData
                },
                success: function(data) {
                    if (data.status) {
                        $("#commentForm").hide()
                        $("#commentMsg").text(data.message).removeClass('d-none')
                        $("#commentFormBtn").val("Post Comment")
                        $("#commentFormBtn").prop("disabled", false)
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    });
</script>
@endpush