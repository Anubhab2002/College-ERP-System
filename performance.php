<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["student_ID"])) {
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
			<h3 class="text">Welcome <?php echo $_SESSION["student_name"]; ?></h3><br><hr><br>
			<h3>Your Performance Summary</h3><br>
            <table>
            <thead>
            <tr>
                <th>Date of Enrollment</th>
                <th>Course Taken</th>
                <th>Grades</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM Student INNER JOIN Department ON student.dept_ID = department.dept_ID INNER JOIN Enrollment ON Enrollment.student_ID = Student.student_ID INNER JOIN Course ON Course.course_ID = Enrollment.course_ID WHERE Enrollment.student_ID = '{$_SESSION["student_ID"]}'";
            $result = $db->query($sql);
            // loop through the result and display each row as a table row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["doe"]."</td>";
                echo "<td>".$row["course_name"]."</td>";
                switch ($row["grades"]) {
                    case 10:
                        $grade = "Ex";
                        break;
                    case 9:
                        $grade = "A";
                        break;
                    case 8:
                        $grade = "B";
                        break;
                    case 7:
                        $grade = "C";
                        break;
                    case 6:
                        $grade = "D";
                        break;
                    case 5:
                        $grade = "P";
                        break;
                    default:
                        $grade = "F";
                }
                echo "<td>".$grade."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>

        <?php
            $sql = "SELECT avg(grades) AS CGPA FROM Enrollment WHERE student_ID = '{$_SESSION["student_ID"]}'";
            $res = $db->query($sql);
            $rows = $res->fetch_assoc();
            echo '<h4><b>Your Cumulative Grade Point Average is: </b></h4>';
            echo $rows['CGPA'];
        ?>
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
