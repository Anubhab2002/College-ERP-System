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
		
		
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">
			
			<div id="section">
			
				<?php include"sidebar.php";?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["student_name"]; ?></h3><br><hr><br>
					 ADD PROFILE
				</div>
				
			</div>
	
		<?php include"footer.php";?>
	</body>
</html>