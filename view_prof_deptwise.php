<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["admin_ID"]))
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
	<h1>Professors</h1>
	<table>
		<?php
			// Retrieve professor data by department if a department ID is specified in the URL
			if (isset($_GET["dept_ID"])) {
				$dept_id = $_GET["dept_ID"];
				$sql = "SELECT * FROM professor WHERE dept_ID='$dept_id'";
				$result = $db->query($sql);

				// Display professor data in table
				if ($result->num_rows > 0) {
				    echo "<h2>Professors in Department " . $dept_id . "</h2>";
				    echo "<table><tr><th>Professor ID</th><th>Professor Name</th></tr>";
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["prof_ID"]. "</td><td>" . $row["prof_name"] . "</td></tr>";
				    }
				    echo "</table>";
				} else {
				    echo "No Professors Found in Department " . $dept_id;
				}
			}

            // Retrieve course data by department if a department ID is specified in the URL
			if (isset($_GET["dept_ID"])) {
				$dept_id = $_GET["dept_ID"];
				$sql = "SELECT * FROM course INNER JOIN professor ON course.prof_ID = professor.prof_ID WHERE course.dept_ID='$dept_id'";
				$result = $db->query($sql);

				// Display professor data in table
				if ($result->num_rows > 0) {
				    echo "<h2>Courses offered by Department " . $dept_id . "</h2>";
				    echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Course Details</th><th>Assigned Professor</th></tr>";
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["course_ID"]. "</td><td>" . $row["course_name"] . "</td><td>" . $row["course_details"]. "</td><td>" . $row["prof_name"] . "</td></tr>";
				    }
				    echo "</table>";
				} else {
				    echo "No Professors Found in Department " . $dept_id;
				}
			}

			$db->close();
		?>
	</table>
</body>
</html>
