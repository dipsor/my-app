<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>My app - Boilerplate Landing page</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
<div id="app">
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo black-text">Logo</a>
            <ul class="right hide-on-med-and-down">
                @if(Auth::user())
                    <li><a class="black-text" href="{{route('users.show', ['id' => Auth::user()->id])}}">Profile</a></li>
                    <li><a class="black-text" href="{{route('users.logout')}}">Logout</a></li>

                @else
                <li><a class="black-text" href="{{route('login')}}">Sign In</a></li>
                <li><a class="black-text" href="{{route('login')}}">Sign Up</a></li>
                @endif
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a class="black-text" href="#">Sign In</a></li>
                <li><a class="black-text" href="#">Sign Up</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <div id="index-banner">
        <div>
            {{--<div class="gradient-45deg-purple-amber">--}}
                <div class="gradient-45deg-brown-brown">
                {{--<div class="gradient-45deg-red-pink">--}}

                <br><br>
                <h1 class="header center white-text text-lighten-2">My app boilerplate</h1>
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
                <div class="row center">
                    <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light purple darken-3 white-text lighten-1">Get Started</a>
                </div>
                <br><br>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center purple-text text-darken-2"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Speeds up development</h5>

                        <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center purple-text text-darken-2"><i class="material-icons">group</i></h2>
                        <h5 class="center">User Experience Focused</h5>

                        <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center purple-text text-darken-2"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Easy to work with</h5>

                        <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img')}}/background2.jpg" alt="Unsplashed background img 2"></div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>Contact Us</h4>
                    <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img')}}/background3.jpg" alt="Unsplashed background img 3"></div>
    </div>
    <footer class="page-footer brown darken-2">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-copyright">
            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>

    </footer>
 </div>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
