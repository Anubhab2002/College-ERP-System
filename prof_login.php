<?php
	include"database.php";
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
			<h1 class="heading">Professor's Login</h1>
			<div class="log">
				<?php
					if(isset($_POST["login"]))
					{
						$sql="select * from professor where prof_name='{$_POST["prof_name"]}'and password='{$_POST["password"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["prof_ID"]=$ro["prof_ID"];
							$_SESSION["prof_name"]=$ro["prof_name"];
							echo "<script>window.open('prof_home_page.php','_self');</script>";
						}
						else
						{
							echo "<div class='error'>Invalid Name Or Password</div>";
						}
					}
				
				
				
				?>
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="prof_name" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="password" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>
		
		
		
		<div class="footer">
			<footer><p>Copyright &copy; ANUBHAB MANDAL 20MA20080 </p></footer>
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