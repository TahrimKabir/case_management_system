<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="scss/front.css">
    @include('partials.style')
<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
</head>

<body>
    @section('main')

    <div class="container-main">
        <div class="logo-Container p-4">
            <h1 class="mb-0 ">Case Management System</h1>
        </div>
        @section('top-nav')
        <div class="topnav" id="myTopnav">
            <a href="{{ url('/dashboard') }}">Go to CMS</a>
            <a href="{{asset('file-your-case/')}}">FIR</a>
            <a href="{{asset('case-list')}}">Case List</a>
            {{-- <a href="#about">About</a> --}}
            @if (Route::has('login'))
                <div class=" fixed top-0 right-0  sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            >Home</a>
                    @else
                        <a href="{{ route('login') }}" >Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                >Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        @show
        @section('body')
        <div class="body">
            @section('side-bar')
            <div class="side-bar">

            </div>
            @show
            @section('content')
            {{-- @yield('content') --}}
            <div class="carosol">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="image/p1.jpg" alt="Los Angeles" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="chicago.jpg" alt="image2" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="ny.jpg" alt="image3" style="width:100%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @show
        </div>
        <div class="myrow toremove"></div>
        @show
        @section('edit')
        @yield('edit')
        <div class="myrow">
         
        </div>
        @show
        @section('footer')
        <div class="footer">

        </div>
        @show
    </div>
    @show
    @section('script')
     @yield('script')
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    
    <script>
        $('.carousel').carousel() 
        $('.carousel').carousel({
            interval: 1000
        })
    </script>

@include('partials.script')


    @show
</body>


</html>
