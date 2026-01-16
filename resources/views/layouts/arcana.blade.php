<!DOCTYPE HTML>
<html>
	<head>
		<title>Nemzeti Parkok - @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('arcana/assets/css/main.css') }}" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<header id="header">
				<h1><a href="{{ route('home') }}" id="logo">Nemzeti Parkok</a></h1>
				<nav id="nav">
    <ul>
        {{-- Publikus pontok --}}
        <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}">Főoldal</a></li>
        <li class="{{ request()->routeIs('contact.form') ? 'current' : '' }}"><a href="{{ route('contact.form') }}">Kapcsolat</a></li>
        
        @auth
            {{-- Csak bejelentkezett felhasználóknak látható pontok --}}
            <li class="{{ request()->routeIs('database.index') ? 'current' : '' }}"><a href="{{ route('database.index') }}">Adatbázis</a></li>
            <li class="{{ request()->routeIs('messages.index') ? 'current' : '' }}"><a href="{{ route('messages.index') }}">Üzenetek</a></li>
            <li class="{{ request()->routeIs('diagram.index') ? 'current' : '' }}"><a href="{{ route('diagram.index') }}">Diagram</a></li>
            <li class="{{ request()->routeIs('trails.*') ? 'current' : '' }}"><a href="{{ route('trails.index') }}">Túraútvonalak</a></li>
            
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @else
            {{-- Csak vendégeknek --}}
            <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
        @endauth
    </ul>
</nav>
			</header>

			<section class="wrapper style1">
				<div class="container">
					@yield('content')
				</div>
			</section>

			<div id="footer">
				</div>

		</div>

		<script src="{{ asset('arcana/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('arcana/assets/js/jquery.dropotron.min.js') }}"></script>
		<script src="{{ asset('arcana/assets/js/browser.min.js') }}"></script>
		<script src="{{ asset('arcana/assets/js/breakpoints.min.js') }}"></script>
		<script src="{{ asset('arcana/assets/js/util.js') }}"></script>
		<script src="{{ asset('arcana/assets/js/main.js') }}"></script>
	</body>
</html>