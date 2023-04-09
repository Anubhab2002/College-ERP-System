<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["student_ID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>XYZ Institute of Technology ERP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
		<?php include"navbar.php";?><br>
			
			<div id="section">
			
				<?php include"sidebar.php";?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["student_name"]; ?></h3><br><hr><br>
					<?php
                        // Retrieve student details from database
                        $student_id = $_SESSION["student_ID"];
                        $query = "SELECT * FROM Student WHERE student_ID = '$student_id'";
                        $result = mysqli_query($db, $query);
                        $student = mysqli_fetch_assoc($result);

                        // Display student details
                        echo "<h4>Student Details:</h4>";
                        echo "<ul>";
                        echo "<li>Name: ".$student["student_name"]."</li>";
                        echo "<li>Roll Number: ".$student["student_ID"]."</li>";
                        echo "<li>Department: ".$student["dept_ID"]."</li>";
                        echo "<li>Date of Birth: ".$student["dob"]."</li>";
                        echo "<li>Date of Joining: ".$student["doj"]."</li>";
                        echo "</ul>";
                    ?>
                </div>

                <div class="content">

                    <?php
                        // Retrieve course details from database
                        $student_id = $_SESSION["student_ID"];
                        $query = "SELECT c.course_name, c.course_ID, e.grades, e.doe
                                FROM Enrollment e
                                JOIN Course c ON e.course_ID = c.course_ID
                                WHERE e.student_ID = '$student_id' and e.status = 'Approved'";
                        $result = mysqli_query($db, $query);

                        // Display course details
                        echo "<h4>Courses Taken:</h4>";
                        echo "<table>";
                        echo "<tr><th>Course Name</th><th>Course ID</th><th>Grades</th><th>Date of Enrollment</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row["course_name"]."</td>";
                            echo "<td>".$row["course_ID"]."</td>";
                            echo "<td>".$row["grades"]."</td>";
                            echo "<td>".$row["doe"]."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    ?>



				</div>
				
			</div>
	
		<?php include"footer.php";?>
	</body>
</html>