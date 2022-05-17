<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Notícias Colégio Dom Bosco - Sorocaba</title>
		<meta charset="utf-8" />
        <link rel="icon" type="image/png" href="/public/images/icon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/public/editorial/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
                <div id="main">
                    <div class="inner">

                        <!-- Header -->
                        <header id="header">
                            <a href="/noticias" class="logo"><strong>NOTÍCIAS</strong> Dom Bosco Sorocaba</a>
                            <x-noticia.social />
                        </header>


				    <!-- Main -->
                    @yield('content')

                    </div>
                </div>


				<!-- Sidebar -->
                <x-noticia.menu />
			</div>

		<!-- Scripts -->
			<script src="/public/editorial/assets/js/jquery.min.js"></script>
			<script src="/public/editorial/assets/js/browser.min.js"></script>
			<script src="/public/editorial/assets/js/breakpoints.min.js"></script>
			<script src="/public/editorial/assets/js/util.js"></script>
			<script src="/public/editorial/assets/js/main.js"></script>

	</body>
</html>
