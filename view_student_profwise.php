<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["prof_ID"])) {
		echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
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
		<div class="content">
			<h3 class="text">Welcome <?php echo $_SESSION["prof_name"]; ?></h3><br><hr><br>
			<h3>Students taking courses <?php echo 'under '; echo $_SESSION['prof_name']; ?></h3><br>
			<table>
				<thead>
					<tr>
						<th>Student ID</th>
						<th>Department Name</th>
						<th>Student Name</th>
						<th>Date of Birth</th>
						<th>Date of Joining</th>
                        <th>Course Taken</th>
					</tr>
				</thead>
				<tbody>
					<?php

                        $sql = "SELECT * FROM Student INNER JOIN Department ON student.dept_ID = department.dept_ID INNER JOIN Enrollment ON Enrollment.student_ID = Student.student_ID INNER JOIN Course ON Course.course_ID = Enrollment.course_ID INNER JOIN Professor ON Course.prof_ID = Professor.prof_ID WHERE Professor.prof_ID = '{$_SESSION["prof_ID"]}'";
                        $result = $db->query($sql);
						// loop through the result and display each row as a table row
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>".$row["student_ID"]."</td>";
							echo "<td>".$row["dept_name"]."</td>";
							echo "<td>".$row["student_name"]."</td>";
							echo "<td>".$row["dob"]."</td>";
							echo "<td>".$row["doj"]."</td>";
                            echo "<td>".$row["course_name"]."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>

<?php include"footer.php";?>
	</body>
</html>
