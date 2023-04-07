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
	<body>
			<?php include"navbar.php";?><br>
			
			<img src="img/1.jpg" style="margin-left:90px;" class="sha">
			
				<div id="section">
				
					<?php include"sidebar.php";?><br><br><br>
					
				<div class="content1">
					
						<h3 > Change Password</h3><br>
						<?php
							if(isset($_SESSION["admin_ID"]))
                            {
                                if(isset($_POST["submit"]))
                                {
                                    $sql="select * from admin where admin_password='{$_POST["opass"]}' and admin_ID='{$_SESSION["AID"]}'";
                                    $result=$db->query($sql);
                                    if($result->num_rows>0)
                                    {
                                        if($_POST["npass"]==$_POST["cpass"])
                                        {
                                            $s="update admin SET admin_password='{$_POST["npass"]}' where admin_ID='{$_SESSION["AID"]}'";
                                            $db->query($s);
                                            echo "<div class='success'>Password Changed</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='error'>Password Mismatch</div>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<div class='error'>Invalid Password</div>";
                                    }
                                }
                            }
                            elseif(isset($_SESSION["student_ID"]))
                            {
                                if(isset($_POST["submit"]))
                                {
                                    $sql="select * from student where password='{$_POST["opass"]}' and student_ID='{$_SESSION["AID"]}'";
                                    $result=$db->query($sql);
                                    if($result->num_rows>0)
                                    {
                                        if($_POST["npass"]==$_POST["cpass"])
                                        {
                                            $s="update student SET password='{$_POST["npass"]}' where student_ID='{$_SESSION["AID"]}'";
                                            $db->query($s);
                                            echo "<div class='success'>Password Changed</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='error'>Password Mismatch</div>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<div class='error'>Invalid Password</div>";
                                    }
                                }
                            }
                            elseif(isset($_SESSION["prof_ID"]))
                            {
                                if(isset($_POST["submit"]))
                                {
                                    $sql="select * from professor where password='{$_POST["opass"]}' and prof_ID='{$_SESSION["AID"]}'";
                                    $result=$db->query($sql);
                                    if($result->num_rows>0)
                                    {
                                        if($_POST["npass"]==$_POST["cpass"])
                                        {
                                            $s="update student SET password='{$_POST["npass"]}' where prof_ID='{$_SESSION["AID"]}'";
                                            $db->query($s);
                                            echo "<div class='success'>Password Changed</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='error'>Password Mismatch</div>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<div class='error'>Invalid Password</div>";
                                    }
                                }
                            }
						
						
						?>
						
							
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Old Password</label><br>
						<input type="text" class="input3" name="opass"><br><br>
						<label>New Password</label><br>
						<input type="text" class="input3" name="npass"><br><br>
						<label>Confirm Password</label><br>
						<input type="text" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="float:left" name="submit"> Change Password</button>
					</form>
			
				</div>	
			</div>
			<?php include"footer.php";?>
		
	</body>
</html>