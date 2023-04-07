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
		<tr>
			<th>Professor ID</th>
			<th>Professor Name</th>
            <th>Department ID</th>
            <th>Password</th>
		</tr>
		<?php
			// Retrieve department data from database
			$sql = "SELECT prof_ID, prof_name, dept_ID, password FROM professor";
			$result = $db->query($sql);

			// Display department data in table
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>" . $row["prof_ID"]. "</td><td>" . $row["prof_name"] . "</td><td>" . $row["dept_ID"] . "</td><td>" . $row["password"] . "</td></tr>";
			    }
			} else {
			    echo "No Professor Added";
			}
			$db->close();
		?>
	</table>
</body>
</html>
