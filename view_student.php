<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["admin_ID"])) {
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
		<img src="img/1.jpg" width="780" style="margin-left:10px;" class="sha">
		<div class="sidebar">
			<?php include "sidebar.php"; ?>
		</div>
		<div class="content">
			<h3 class="text">Welcome <?php echo $_SESSION["admin_name"]; ?></h3><br><hr><br>
			<h3>List of enrolled students</h3><br>
			<table>
				<thead>
					<tr>
						<th>Student ID</th>
						<th>Department ID</th>
						<th>Student Name</th>
						<th>Date of Birth</th>
						<th>Date of Joining</th>
                        <th>Password</th>
					</tr>
				</thead>
				<tbody>
					<?php

                        $sql = "SELECT * FROM student INNER JOIN department ON student.dept_ID = department.dept_ID";
                        $result = $db->query($sql);
						// loop through the result and display each row as a table row
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>".$row["student_ID"]."</td>";
							echo "<td>".$row["dept_name"]."</td>";
							echo "<td>".$row["student_name"]."</td>";
							echo "<td>".$row["dob"]."</td>";
							echo "<td>".$row["doj"]."</td>";
                            echo "<td>".$row["password"]."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
		
		<div class="footer">
			<footer><p>Copyright &copy; ANUBHAB MANDAL 20MA20080</p></footer>
		</div>
		
		<script src="js/jquery.js"></script>
		<script>
			$(document).ready(function(){
				$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
				});
			});
		</script>
	</body>
</html>
