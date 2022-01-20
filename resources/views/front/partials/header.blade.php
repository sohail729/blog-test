<header class="site-navbar" role="banner">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-4 site-logo">
        <a href="/" class="text-black h2 mb-0">Blog</a>
      </div>

      <div class="col-8 text-right">
        <nav class="site-navigation" role="navigation">
          <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
            <li><a href="/">Home</a></li>
            @foreach ($menu_header as $key => $menu )
            <li><a href="{{ route('front.categories.show', $key)}}">{{ ucwords($menu) }}</a></li>
            @endforeach
          </ul>
        </nav>
        <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
      </div>
    </div>

  </div>
</header>