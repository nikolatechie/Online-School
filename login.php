<!DOCTYPE html>
<html>
	<head>
		<title>Log in - Online school</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	</head>

	<body>
		<?php
			include('header1.php');
		?>

		<button onclick="window.location.href='main.php'" class="go-back" name="go-back">Go Back</button>

		<div id="login-form">
			<form method="POST">
				<h1>Log in</h1>

				<div id="username-div">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" minlength="5" maxlength="20" placeholder="Your username..." autofocus required>
				</div>

				<div id="password-div">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" minlength="5" maxlength="20" placeholder="Your password..." required>
				</div>

				<input type="submit" id="submit-login" name="submit-login" value="Log in">
			</form>
		</div>

		<?php
			if (isset($_POST["submit-login"]))
			{
				$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");

				if ($conn->connect_error)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Connection failed: ".$conn->connect_error."</h2>");

				$username = mysqli_real_escape_string($conn, $_POST["username"]);
				$password = mysqli_real_escape_string($conn, $_POST["password"]);
				$res = mysqli_query($conn, "SELECT * FROM students WHERE username='$username';");

				if ($res->num_rows < 1)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Wrong username or password!</h2>");

				$row = $res->fetch_assoc();

				if (!password_verify($password, $row['password']))
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Wrong username or password!</h2>");

				// user is logged in
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION["username"] = $username;
				$_SESSION['email'] = $row['email'];
				$_SESSION['studentID'] = $row['studentID'];
				header("Location: index.php");
			}
		?>
	</body>
</html>