<?php
	include "database.php";
	session_start();
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
	<h1>Departments</h1>
	<table>
		<tr>
			<th>Department ID</th>
			<th>Department Name</th>
		</tr>
		<?php
			// Retrieve department data from database
			$sql = "SELECT dept_ID, dept_name FROM department";
			$result = $db->query($sql);

			// Display department data in table
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>" . $row["dept_ID"]. "</td><td><a href='view_prof_deptwise.php?dept_ID=" . $row["dept_ID"] . "'>" . $row["dept_name"] . "</a></td></tr>";
			    }
			} else {
			    echo "<tr><td colspan='2'>No Departments Added</td></tr>";
			}
			$db->close();
		?>
	</table>

	<?php include"footer.php";?>
</body>
</html>
