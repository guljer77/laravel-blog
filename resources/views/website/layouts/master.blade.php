<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>@yield('title') | Hunters</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontEnd') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/assets/css/owl.css">
    <!--

    TemplateMo 551 Stand Blog

    https://templatemo.com/tm-551-stand-blog

    -->
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><h2>Hunters<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registration</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Page Content -->
<!-- Banner Starts Here -->
@yield('banner')
<!-- Banner Ends Here -->


<section class="blog-posts">
    <div class="container">
        <div class="row">
            @yield('content')
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @php
                                        $post = \App\Models\Post::orderBy('id','desc')->take(3)->get();
                                        @endphp
                                        @foreach($post as $singlePost)
                                        <li>
                                            <a href="{{ route('details',[$singlePost->id, $singlePost->slug]) }}">
                                                <h5>{{ $singlePost->post_title }}</h5>
                                                <span>{{ date('Y') }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Categories</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @php
                                        $categories = \App\Models\Category::all();
                                        @endphp
                                        @foreach($categories as $category)
                                        <li><a href="{{ route('category',[$category->id, $category->slug]) }}">{{ $category->category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @php
                                            $tags = \App\Models\Tag::all();
                                        @endphp
                                        @foreach($tags as $tag)
                                        <li><a href="{{ route('tags',[$tag->id, $tag->slug]) }}">{{ $tag->tag_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Behance</a></li>
                    <li><a href="#">Linkedin</a></li>
                    <li><a href="#">Dribbble</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright 2020 Stand Blog Co.

                        | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('frontEnd') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('frontEnd') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="{{ asset('frontEnd') }}/assets/js/custom.js"></script>
<script src="{{ asset('frontEnd') }}/assets/js/owl.js"></script>
<script src="{{ asset('frontEnd') }}/assets/js/slick.js"></script>
<script src="{{ asset('frontEnd') }}/assets/js/isotope.js"></script>
<script src="{{ asset('frontEnd') }}/assets/js/accordions.js"></script>

<script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>

</body>
</html>
