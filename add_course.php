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
					
						<h3 > Add Course Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
                                $rand_num = str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
                                $course_ID = $_POST["dept_ID"].$rand_num;
								$sq="insert into course(course_id, course_name, course_details, dept_ID, prof_ID) values ('{$course_ID}', '{$_POST["course_name"]}', '{$_POST["course_details"]}', '{$_POST["dept_ID"]}', '{$_POST["prof_ID"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Added New Course!!</div>";
								}
								else
								{
									echo "<div class='error'>Failed to add new course!!</div>";
								}
							}
						?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                            <label>Course Name</label>
                            <input type="text" name="course_name" required class="input"><br>
                            <label>Course Details</label>
                            <input type="text" name="course_details" required class="input"><br>
                            <label>Professor Assigned</label>
                            <input type="text" name="prof_ID" required class="input"><br>
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
                            </select><br>
						    <button type="submit" class="btn" name="submit">Add Subject Details</button>
						</form>
				
				
					</div>
				
				<?php include"footer.php";?>
	</body>
</html>