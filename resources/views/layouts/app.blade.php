<!doctype html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" ></script>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
	<header>
		<div class="logo"><a href="{{ url('') }}" title="front page"><img src="{{asset('images/pizza-logo.svg')}}" width="133" height="60" alt=""/></a></div>
		<div class="login">sign in with google</div>
	</header>
	
	<main>
		<div class="container">
			<section id="main_content">
				 @yield('form')
			</section>
		</div>
	</main>
	<footer>
		<div class="container">
			<div class="footer_copyright">PIZZA BUILDERS INC © 2017</div>
		</div>
	</footer>
	@yield('scripts')
</body>
</html>