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
	<body class="back">
		<?php include"navbar.php";?>
		<img src="img/b1.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">Admin Login Page</h1>
			<div class="log">
			<?php
				if(isset($_POST["login"]))
				{
					$sql="select * from admin where admin_name='{$_POST["admin_name"]}' and admin_password='{$_POST["admin_password"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["admin_ID"]=$ro["admin_ID"];
						$_SESSION["admin_name"]=$ro["admin_name"];
						echo "<script>window.open('admin_home_page.php','_self');</script>";
					}
					else
					{
						echo "<div class='error'>Invalid Username or Password</div>";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}
				
			?>
		
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="admin_name" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="admin_password" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>Copyright &copy; ANUBHAB 20MA20080 </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>