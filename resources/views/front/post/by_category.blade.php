@extends('layouts.front')
@section('title', 'Category - '.  $category->title)

@section('content')

<div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>{{ $category->title }}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam error eius quo, officiis non maxime quos reiciendis perferendis doloremque maiores!</p>
          </div>
        </div>
      </div>
    </div>


    <section class="site-section py-lg">
      <div class="container">

        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
          <div class="row">
            <div class="col-lg-12 ">
            @if (!$posts->isEmpty())
          
            @foreach ($posts as $key => $post)                
                <div class="entry2">
                    <a href="{{ route('front.posts.show', $post->slug) }}">
                    @if ($post->image)
                        <img src="{{ asset('uploads/images/'.$post->image)}}" alt="Image" class="img-fluid rounded">                            
                        @else                            
                        <img src="https://qik.radiantthemes.com/wp-content/themes/qik/assets/images/no-image/No-Image-Found-400x264.png" alt="Image" class="img-fluid rounded">
                        @endif
                    </a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $post->category->title }}</span>                        
                        <h2><a href="{{ route('front.posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('assets/front/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="javascript:void(0)">{{ $post->author->name }}</a></span>
                            <span>{{ date("F jS, Y", strtotime($post->created_at)) }}</span>
                            <p>{!! htmlToText($post->content, 150) ?? 'No Content' !!} <span><a href="{{ route('front.posts.show', $post->slug) }}">Read More</a></span></p>
                        </div>                        
                    </div>
                </div>
                <hr>        
                @endforeach
                @else
                <p>Posts not found!</p>
                
                @endif
              </div>   
        </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            
            <!-- END sidebar-box -->
            <!-- <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                  <li>
                    <a href="">
                      <img src="images/img_1.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="images/img_2.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="images/img_3.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div> -->
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                  @foreach ($categories as $category )  
                  <li><a href="{{ route('front.categories.show', $category->slug)}}">{{ $category->title }} <span>({{ $category->getPostsCount() }})</span></a></li>
                  @endforeach
              </ul>
            </div>
            <!-- END sidebar-box -->
<!-- 
            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
              </ul>
            </div> -->
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>
    @endsection