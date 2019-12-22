<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-style" >
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" >
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link nav-middle" href="">文章<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-middle" href="">探讨</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-middle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            小功能
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">crack-video</a>
                            <a class="dropdown-item" href="#">Ocr</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">and then...</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('menu.Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('menu.Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="img-height">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i=0; $i<$data['images_length']; $i++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" {{ $i==0 ? "class=active" : '' }}></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @foreach($data['images'] as $image)
                    <div class="carousel-item {{ $loop->index==0 ? "active" : '' }}" style="width: 100%; height:550px" >
                        <a href="{{ $image['url_to'] }}">
                            <img class="d-block w-100" src="{{ $image['file_path'] }}" alt="First slide">
                            <div class="on-picture-content">
                                <div class="in-picture-content">
                                    <h2 class="picture-title">{{ $image['content'] }}</h2>
                                    <p>{{ $image['created_at'] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($data['recommented'] as $recommented)
                <div class="col-md-4" style="padding: 5px;">
                    <div class="hovereffect">
                        <img class="img-fluid main-picture" src="{{ $recommented['file_path'] }}" alt="">
                        <div class="overlay">
                            <h2>{{ $recommented['content'] }}</h2>
                            <a class="info" href="#">link here</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
</body>
<script>
    window.onscroll = function (e) {
        var scrolltop=document.documentElement.scrollTop;
        if(scrolltop > 0){
            $('.navbar').removeClass('nav_change2');
            $('.navbar').addClass('nav_change');
        }else{
            $('.navbar').removeClass('nav_change');
            $('.navbar').addClass('nav_change2');
        }

    }



</script>
</html>
