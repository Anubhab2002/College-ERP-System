<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["admin_ID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
				
				<?php include"sidebar.php";?><br><br><br>
				
				<h3 class="text">Welcome <?php echo $_SESSION["admin_name"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Add Professor Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
                            $prof_name = $_POST['prof_name'];
                            $dept_ID = $_POST['dept_ID'];
                            $initials = "";
                            // Extract the first letter of each word in the professor's name
                            foreach (explode(' ', $prof_name) as $word) {
                                $initials .= $word[0];
                            }
                            $prof_ID = $initials."_".$dept_ID; // Generate the professor ID

                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $password = '';
                            for ($i = 0; $i < 10; $i++) {
                                $password .= $characters[rand(0, strlen($characters) - 1)];
                            }


							$sq="insert into professor (prof_ID,dept_ID,prof_name,password) values('{$prof_ID}','{$_POST["dept_ID"]}','{$_POST["prof_name"]}', '{$password}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Added Professor</div>";
							}
							else
							{
								echo "<div class='error'>Failed to add Professor</div>";
							}
							
						}
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <label>Professor Name</label><br>
                        <input type="text" name="prof_name" required class="input">
                        <br><br>
                        <label for="department">Enter Department:</label>
                        <select id="department" name="dept_ID" required>
                        <option value="" disabled selected hidden>Select Department</option>
                        <option value="CS">Computer Science and Engineering</option>
                        <option value="MA">Mathematics</option>
                        <option value="EE">Electrical Engineering</option>
                        <option value="EC">Electronics and Communication Engineering</option>
                        <option value="ME">Mechanical Engineering</option>
                        <option value="CH">Chemical Engineering</option>
                        <option value="CE">Civil Engineering</option>
                        </select>
                        <br><br>
                        <button type="submit" class="btn" name="submit">Add Staff Details</button>
					</form>
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>