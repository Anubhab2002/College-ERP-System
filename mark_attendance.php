<?php
	session_start();
	include "database.php";
	
	if (!isset($_SESSION['student_ID'])) {
		header("Location: login.php");
		exit();
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$student_ID = $_SESSION['student_ID'];
		$course_ID = $_POST['course_ID'];
		$attendance_date = date('Y-m-d');
        $att_sq = "SELECT * FROM Attendance WHERE student_ID = '{$_SESSION["student_ID"]}'";
        $res = $db->query($att_sq);
        $res = $res->fetch_assoc();
		$days_present = $res["days_present"]+1;

		$sql = "UPDATE Attendance set days_present = $days_present where student_ID = '{$student_ID}'";

		if ($db->query($sql) === TRUE) {
			echo "Attendance marked successfully.";
		} else {
			echo "Error marking attendance: " . $db->error;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>XYZ Institute of Technology ERP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include "navbar.php"; ?><br>
    <div class="sidebar">
        <?php include "sidebar.php"; ?>
    </div>  
	<h1>Mark Attendance</h1> <br> <br>
	<p>Student Name: <?php echo $_SESSION['student_name']; ?></p>

	<form method="POST">
		<label for="course_ID">Course ID:</label>
		<input type="text" id="course_ID" name="course_ID" required><br><br>
		
		<input type="submit" value="Submit Your Attendance" name="submit_attendance" class='btn'>
	</form>

	<?php include"footer.php";?>
</body>
</html>
