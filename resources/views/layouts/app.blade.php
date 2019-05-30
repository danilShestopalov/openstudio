<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" href="/assets/img/OS.svg" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OpenStudio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://widget.cloudpayments.kz/bundles/cloudpayments"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135696908-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-135696908-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M8JGDRT');</script>
    <!-- End Google Tag Manager -->

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M8JGDRT"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">
        <header>
            <a class="logo" href="/">
                <img src="/assets/img/OS.png" alt="" class="logo">
            </a>
            <div class="hrefs">
                {{--<a href="{{ route('startup.show', count(\App\Startup::all())) }}">Стартапы</a>--}}
                <a href="{{ route('startup.my_startups') }}">Мои проекты</a>
                <a href="{{ route('profile.index')}}">Профили</a>
                {{--<a href="">Crowdfunding</a>--}}
                {{--<a href="{{ route('post.index') }}">Blog</a>--}}
            </div>
            @guest
                <div class="auth">
                    <form action="{{ route('startup.create') }}">
                        <button class="green">Создать проект</button>
                    </form>
                    <form action="{{ route('auth') }}">
                        <button>Войти</button>
                    </form>
                </div>
            @else
                <div class="auth">
                    <form action="{{ route('startup.create') }}">
                        <button class="green">Создать проект</button>
                    </form>
                    <form class="authorized" action="{{ route('logout') }}" method="POST">
                        @csrf

                        @if(!\Illuminate\Support\Facades\Auth::user()->profile)
                            <a href="{{ route('profile.create', Illuminate\Support\Facades\Auth::id()) }}"><img src="/assets/img/profile.png" alt=""></a>
                            <button type="submit"><img src="/assets/img/exit.png"></button>
                        @else
                            <a href="{{ route('profile.show', Illuminate\Support\Facades\Auth::id()) }}"><img src="/assets/img/profile.png" alt=""></a>
                            <button type="submit"><img src="/assets/img/exit.png"></button>
                        @endif
                    </form>
                </div>

            @endif
        </header>
        <main class="py-4">
            @yield('content')
        </main>
		 <footer>
            <section class="s4">
                <img src="img/os2.png" alt="">
                <ul>
                    <li>7 777 123 45 67</li>
                    <li>info@openstudio.com</li>
                    <li>117, st. Kazibek Bi, Almaty, KZ</li>
                </ul>
                <a style="color: white" href="/about/payment">Об оплате</a>
                {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, earum, quam aliquam ducimus labore neque accusantium ratione, delectus molestias a voluptates animi quas consequatur facere nam in iste! Error, voluptatibus.</p>--}}
				<div class="vm">
					<img src="https://cloudpayments.kz/images/docs/vbv.png" height="25px">
					<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png">
				</div>
            </section>
        </footer>
    </div>
</body>
</html>

<script>
    this.pay = function () {
        var widget = new cp.CloudPayments();
        widget.charge({ // options
                publicId : 'test_api_00000000000000000000001', //id из личного кабинета
                description : 'Пример оплаты (деньги сниматься не будут)', //назначение
                amount : 10, //сумма
                currency : 'KZT', //валюта
                invoiceId : '1234567', //номер заказа  (необязательно)
                accountId : 'user@example.com', //идентификатор плательщика (необязательно)
                data : {
                    myProp : 'myProp value' //произвольный набор параметров
                }
            })
    //         function (options) { // success
    //             //действие при успешной оплате
    //         },
    //         function (reason, options) { // fail
    //             //действие при неуспешной оплате
    //         });
    // };
</script>
