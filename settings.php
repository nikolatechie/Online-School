<!DOCTYPE html>
<html>
	<head>
		<title>Settings - Online school</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	</head>

	<body>
		<?php
			session_start();

			if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true))
				header("Location: login.php");

			$username = $_SESSION['username'];
			include("header2.php");
		?>

		<div id="info-part">
			<?php
				$email = $_SESSION['email'];
				echo "<p>Username: $username<br>Password: /<br>E-mail: $email</p>"
			?>
		</div>

		<div id="new-info">
			<p>Update your information:</p>

			<form action="settings.php" method="POST">
				<input type="text" class="input-change" id="new-username" name="new-username" minlength="5" maxlength="20" placeholder="New username" autofocus required>
				<input type="submit" class="input-btn" id="submit-username" name="submit-username" value="Change username">
			</form>

			<form method="POST" id="B-form">
				<input type="password" class="input-change" id="cur-password" name="cur-password" placeholder="Current password" required>
				<input type="password" class="input-change" id="new-password" name="new-password" minlength="6" maxlength="20" placeholder="New password" required>
				<input type="submit" class="input-btn" id="submit-password" name="submit-password" value="Change password">
			</form>

			<form method="POST">
				<input type="email" class="input-change" id="new-email" name="new-email" minlength="5" maxlength="40" placeholder="New e-mail" required>
				<input type="submit" class="input-btn" id="submit-email" name="submit-email" value="Change e-mail">
			</form>

			<form method="POST">
				<input type="submit" id="delete-account" name="delete-account" value="Delete your account">
			</form>
		</div>

		<?php
			if (isset($_POST['submit-username']))
			{
				$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");

				if ($conn->connect_error)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Unable to connect to the database!</h2>");

				$newUsername = mysqli_real_escape_string($conn, $_POST['new-username']);
				$res = mysqli_query($conn, "SELECT * FROM students WHERE username='$newUsername';");

				if ($res->num_rows > 0)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>User with that username already exists!</h2>");

				mysqli_query($conn, "UPDATE students SET username='$newUsername' WHERE username='$username';");
				header("Location: logout.php");
			}

			if (isset($_POST['submit-password']))
			{
				$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");

				if ($conn->connect_error)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Unable to connect to the database!</h2>");

				$curPassword = mysqli_real_escape_string($conn, $_POST['cur-password']);
				$newPassword = mysqli_real_escape_string($conn, $_POST['new-password']);
				$res = mysqli_query($conn, "SELECT * FROM students WHERE username='$username' AND password='$curPassword';");

				if ($res->num_rows > 0)
				{
					mysqli_query($conn, "UPDATE students SET password='$newPassword' WHERE password='$curPassword';");
					header("Location: logout.php");
				}
				else die("<h2 style='margin-top: 50px; color: red; text-align: center;'>The password you've entered is incorrect!</h2>");
			}

			if (isset($_POST['submit-email']))
			{
				$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");

				if ($conn->connect_error)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Unable to connect to the database!</h2>");

				$newEmail = mysqli_real_escape_string($conn, $_POST['new-email']);
				$res = mysqli_query($conn, "SELECT * FROM students WHERE email='$newEmail';");

				if ($res->num_rows > 0)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>User with that e-mail already exists!</h2>");

				mysqli_query($conn, "UPDATE students SET email='$newEmail' WHERE email='$email';");
				header("Location: logout.php");
			}

			if (isset($_POST['delete-account']))
			{
				$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");

				if ($conn->connect_error)
					die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Unable to connect to the database!</h2>");

				$studentID = $_SESSION['studentID'];
				mysqli_query($conn, "DELETE FROM students WHERE username='$username';");
				mysqli_query($conn, "DELETE FROM grades WHERE studentID='$studentID';");
				header("Location: logout.php");
			}
		?>
	</body>
</html>