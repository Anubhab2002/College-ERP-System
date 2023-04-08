<?php
	session_start();
    // Retrieve attendance data for the student from database
	include "database.php";
	// Check if user is logged in
	if (!isset($_SESSION['student_ID'])) {
		header("Location: login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Attendance</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Attendance Report</h1>
	<p>Student Name: <?php echo $_SESSION['student_name']; ?></p>
	<?php
        $sql = "SELECT * from Attendance INNER JOIN Student ON Attendance.student_ID = Student.student_ID INNER JOIN Department ON Student.dept_ID = Department.dept_ID WHERE Student.student_ID = '{$_SESSION['student_ID']}' ";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();

        if($result->num_rows >0)
        {
            echo '</p>
                <p>Department: ';
            echo $row['dept_name'];
            
            echo '
                </p>
            ';

            $perc = round(($row["days_present"] / $row["days_total"]) * 100, 2);

            echo "<h4>Attendance Report:</h4>";
            echo "<table>";
            echo "<tr><th>Course ID</th><th>Days Present</th><th>Total Days</th><th>Percentage</th></tr>";
            echo "<tr>";
            echo "<td>".$row["course_ID"]."</td>";
            echo "<td>".$row["days_present"]."</td>";
            echo "<td>".$row["days_total"]."</td>";
            echo "<td>".$perc."%</td>";
            echo "</tr>";
            echo "</table>"; 
        }

        ?>

</body>
</html>

    
