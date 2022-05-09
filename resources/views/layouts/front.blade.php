<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Colégio Dom Bosco - Sorocaba</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="icon" type="image/png" href="/public/images/icon.png" />
		<link rel="stylesheet" href="/public/assets/css/main.css" />
		<link rel="stylesheet" href="/public/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/public/assets/css/cookiealert.css" />


        <script src="/public/assets/js/jquery.min.js"></script>
        <script src="/public/assets/js/jquery.dropotron.min.js"></script>
        <script src="/public/assets/js/jquery.scrolly.min.js"></script>
        <script src="/public/assets/js/browser.min.js"></script>
        <script src="/public/assets/js/breakpoints.min.js"></script>
        <script src="/public/assets/js/util.js"></script>
        <script src="/public/assets/js/bootstrap.min.js"></script>
        <script src="/public/assets/js/main.js"></script>
        <script src="/public/assets/js/cookiealert.js"></script>

        <script src="{{ asset('/public/js/app.js') }}" defer></script>
	</head>
	<body class="homepage is-preload" id="app">

		<div id="page-wrapper" >

            <x-front.menu></x-front.menu>

            @yield('content')

            <x-front.footer></x-front.footer>

		</div>

        <a href="https://api.whatsapp.com/send?phone=5515974025810&amp;text=" target="_blank"><img class="whatsapp" src="/public/images/contatowhats.png"></a>

        <div class="alert text-center cookiealert" role="alert">
            <b>Você conhece os cookies?</b> &#x1F36A; Nós utilizamos os cookies para garantir uma melhor experiência em nosso site. <a href="https://cookiesandyou.com/" target="_blank">Saiba mais aqui</a>

            <button type="button" class="btn btn-primary btn-sm acceptcookies">
                Aceito
            </button>
        </div>

	</body>
    <!-- Scripts -->
</html>
