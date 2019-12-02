<!DOCTYPE html>
<html>
	<head>
		<title>Home - Online school</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>

	<body>
		<?php
			session_start();

			if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true))
				header("Location: main.php");

			$username = $_SESSION['username'];
			include("header2.php");
		?>

		<div id="index-content">
			<div id="basic-info">
				<?php
					$email = $_SESSION['email'];
					echo "<p>Username: $username<br> E-mail: $email</p>";
				?>

				<form method="POST">
					<div id="adding-grade">
						<input type="text" minlength="4" maxlength="50" id="new-subject" name="new-subject" placeholder="Subject name" required>
						<input type="number" min="5" max="10" id="new-grade" name="new-grade" placeholder="New grade" required>
						<input type="submit" id="submit-grade" name="submit-grade" value="+ Add">
					</div>
				</form>
			</div>

			<div id="table">
				<?php
					$conn = mysqli_connect("127.0.0.1", "root", "", "online_school");
					$studentID = $_SESSION['studentID'];

					if ($conn->connect_error)
						die("<h2 style='margin-top: 50px; color: red; text-align: center;'>Error while connecting to the database!</h2>");

					if (isset($_POST['submit-grade'])) // entering a new grade
					{
						$subject = strtolower(mysqli_real_escape_string($conn, $_POST['new-subject']));
						$grade = $_POST['new-grade'];
						mysqli_query($conn, "INSERT INTO grades VALUES(NULL, '$subject', '$grade', '$studentID');");
					}

					$res = mysqli_query($conn, "SELECT grades.subject, grades.grade FROM grades, students WHERE '$username'=students.username AND students.studentID=grades.studentID;");

					if ($res->num_rows > 0)
					{
						echo "<h2>Your grades:</h2>";
						echo "<table>";
						echo "<tr><th>Subject</th><th>Grade</th></tr>";

						while ($row=$res->fetch_assoc())
						{
							echo "<tr><td>".$row['subject']."</td><td>".$row['grade']."</td></tr>";
						}

						echo "</table>";
						$avg1 = mysqli_query($conn, "SELECT ROUND(AVG(grades.grade), 2) AS avg_grade FROM grades, students WHERE '$username'=students.username AND students.studentID=grades.studentID;");
						$avg2 = $avg1->fetch_assoc();
						echo "<div id='avg-grade'><h3>Your average grade: ".$avg2['avg_grade']."</h3></div>";
					}
				?>
			</div>
		</div>
	</body>
</html>