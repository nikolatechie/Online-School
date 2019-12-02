<!DOCTYPE html>
<html>
	<head>
		<title>Online school</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	</head>

	<body>
		<?php
			include('header1.php');
		?>

		<div id="school-image">
			<img src="school.jpg" width="100%" alt="Image showing school">
		</div>

		<div id="login-signup-choice">
			<h1>Log in or sign up</h1>
			<div id="login-signup">
				<button onclick="window.location.href='login.php'" id="goto-login" name="goto-login">Log in</button>
				<button onclick="window.location.href='signup.php'" id="goto-signup" name="goto-signup">Sign up</button>
			</div>
		</div>

		<!-- Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>