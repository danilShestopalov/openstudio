<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OpenStudio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    OpenStudio
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
    </div>
</header>

<main class="py-4">
    @yield('content')
</main>
<style>

</style>

    {{--<!-- Footer -->--}}
    {{--<footer class="page-footer font-small indigo">--}}

        {{--<!-- Footer Links -->--}}
        {{--<div class="container">--}}

            {{--<!-- Grid row-->--}}
            {{--<div class="row text-center d-flex justify-content-center pt-5 mb-3">--}}

                {{--<!-- Grid column -->--}}
                {{--<div class="col-md-2 mb-3">--}}
                    {{--<h6 class="text-uppercase font-weight-bold">--}}
                        {{--<a href="#!">About us</a>--}}
                    {{--</h6>--}}
                {{--</div>--}}
                {{--<!-- Grid column -->--}}

                {{--<!-- Grid column -->--}}
                {{--<div class="col-md-2 mb-3">--}}
                    {{--<h6 class="text-uppercase font-weight-bold">--}}
                        {{--<a href="#!">Products</a>--}}
                    {{--</h6>--}}
                {{--</div>--}}
                {{--<!-- Grid column -->--}}

                {{--<!-- Grid column -->--}}
                {{--<div class="col-md-2 mb-3">--}}
                    {{--<h6 class="text-uppercase font-weight-bold">--}}
                        {{--<a href="#!">Awards</a>--}}
                    {{--</h6>--}}
                {{--</div>--}}
                {{--<!-- Grid column -->--}}

                {{--<!-- Grid column -->--}}
                {{--<div class="col-md-2 mb-3">--}}
                    {{--<h6 class="text-uppercase font-weight-bold">--}}
                        {{--<a href="#!">Help</a>--}}
                    {{--</h6>--}}
                {{--</div>--}}
                {{--<!-- Grid column -->--}}

                {{--<!-- Grid column -->--}}
                {{--<div class="col-md-2 mb-3">--}}
                    {{--<h6 class="text-uppercase font-weight-bold">--}}
                        {{--<a href="#!">Contact</a>--}}
                    {{--</h6>--}}
                {{--</div>--}}
                {{--<!-- Grid column -->--}}

            {{--</div>--}}
            {{--<!-- Grid row-->--}}
            {{--<hr class="rgba-white-light" style="margin: 0 15%;">--}}

            {{--<!-- Grid row-->--}}
            {{--<div class="row d-flex text-center justify-content-center mb-md-0 mb-4">--}}

                {{--<!-- Grid column -->--}}
                {{--<div class="col-md-8 col-12 mt-5">--}}
                    {{--<p style="line-height: 1.7rem">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem--}}
                        {{--aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.--}}
                        {{--Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>--}}
                {{--</div>--}}
                {{--<!-- Grid column -->--}}

            {{--</div>--}}
            {{--<!-- Grid row-->--}}
            {{--<hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">--}}

                {{--</div>--}}
                {{--<!-- Grid column -->--}}

            {{--</div>--}}
            {{--<!-- Grid row-->--}}

        {{--</div>--}}
        {{--<!-- Footer Links -->--}}


{{--</footer>--}}

</body>
</html>
