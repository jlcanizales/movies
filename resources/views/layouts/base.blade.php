<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<title>Movies DB - @yield('title')</title>
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
	<div class="footer">
		<div class="container">
			<p class="text-center">made with <3 by <a href="http://jlcanizales.co">jlcanizales.co</a> (co-creator at <a href="http://duis.co">Duis.co</a>)</p>
		</div>
	</div>
</body>
</html>