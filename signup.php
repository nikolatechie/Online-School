<!DOCTYPE html>
<html>
	<head>
		<title>Sign up - Online school</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	</head>

	<body>
		<?php
			include('header1.php');
		?>

		<button onclick="window.location.href='main.php'" class="go-back" name="go-back">Go Back</button>

		<div id="signup-form">
			<form method="POST">
				<h1>Sign up for free</h1>

				<div id="username-div">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" minlength="5" maxlength="20" placeholder="Your username..." autofocus required>
				</div>

				<div id="password-div">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" minlength="6" maxlength="20" placeholder="Your password..." required>
				</div>

				<div id="email-div">
					<label for="email">E-mail:</label>
					<input type="email" id="email" name="email" minlength="5" maxlength="40" placeholder="Your e-mail..." required>
				</div>

				<input type="submit" id="submit-signup" name="submit-signup" value="Sign up">
			</form>
		</div>

		<?php
			if (isset($_POST["submit-signup"]))
			{
				$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");

				if ($conn->connect_error)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Connection failed: ".$conn->connect_error."</h2>");

				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);
				$password = password_hash($password, PASSWORD_DEFAULT);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$res1 = mysqli_query($conn, "SELECT * FROM students WHERE username='$username';");
				$res2 = mysqli_query($conn, "SELECT * FROM students WHERE email='$email';");

				if ($res1->num_rows > 0)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Username is already taken!</h2>");

				if ($res2->num_rows > 0)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>User with that email already exists!</h2>");

				mysqli_query($conn, "INSERT INTO students VALUES('NULL', '$username', '$password', '$email');");
				echo "<h2 style='margin-top: 50px; color: green; text-align: center;'>You have succesfully signed up!</h2>";
			}
		?>
	</body>
</html>