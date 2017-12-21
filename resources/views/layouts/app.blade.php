<!doctype html>
<html lang="en">
<head>
	<title>Pizza Builder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" ></script>
	<style type="text/css" media="all">@import url("css/style.css");</style>
</head>

<body>
	<header>
		<div class="logo"><a href="/" title="front page"><img src="img/pizza-logo.svg" width="133" height="60" alt=""/></a></div>
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
</body>

</html>