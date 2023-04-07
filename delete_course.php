<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["admin_ID"]))
	{
		echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}	
	
	if(isset($_POST["submit"]))
	{
		$course_ID = $_POST["course_ID"];
		$sql = "DELETE FROM course WHERE course_id='$course_ID'";
		if($db->query($sql))
		{
			echo "<script>window.open('delete_course.php?mes=Course Deleted...','_self');</script>";
		}
		else
		{
			echo "<script>window.open('delete_course.php?mes=Failed to delete course...','_self');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Course</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include "navbar.php"; ?><br>
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">
		
		<div id="section">
			<?php include "sidebar.php"; ?><br><br><br>
			<h3 class="text">Delete Course</h3><br><hr><br>
			<div class="content1">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<label>Enter Course ID</label>
					<input type="text" name="course_ID" required class="input"><br><br>
					<button type="submit" class="btn" name="submit">Delete Course</button>
				</form>
				<br>
				<?php
					if(isset($_GET["mes"]))
					{
						echo "<div class='error'>{$_GET["mes"]}</div>";	
					}
				?>
			</div>
		</div>
		
		<?php include "footer.php"; ?>
	</body>
</html>
