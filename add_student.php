<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["admin_ID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
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
				<div class="content">
						<h3 >Enter New Student information</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$edate=$_POST["ye"].'-'.$_POST["mo"].'-'.$_POST["da"];
							// $target="student/";
							// $target_file=$target.basename($_FILES["img"]["name"]);
							// if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							// {
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $password = '';
                                for ($i = 0; $i < 10; $i++) {
                                    $password .= $characters[rand(0, strlen($characters) - 1)];
                                }

								$sq="insert into student(student_ID, dept_ID, student_name, dob, password) values('{$_POST["student_ID"]}', '{$_POST["dept_ID"]}',  '{$_POST["student_name"]}', '{$edate}', '{$password}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Added New Student</div>";
								}
								else
								{
									echo "<div class='error'>Failed to add new student</div>";
								}
							// }
							
						}
					?>
			
				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox">
					<label> ID</label><br>
						<?php
							$no="St001";
							$sql="select * from student order by student_ID desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["student_ID"],1,strlen($row1["student_ID"]));
								$no++;
								$no="S".$no;
							}
						
						
						
						?>
					<input type="text" class="input3" name="student_ID" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
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
					<label> Student Name</label><br>
					<input type="text" class="input3" name="student_name"><br><br>
						
					<label>  Date of Birth</label><br>
					<select name="da" class="input5">
						<option value="">Date</option>
						<option value="1">1 </option>
						<option value="2">2 </option>
						<option value="3">3 </option>
						<option value="4">4 </option>
						<option value="5">5 </option>
						<option value="6">6 </option>
						<option value="7">7 </option>
						<option value="8">8 </option>
						<option value="9">9 </option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					<select name="mo" class="input5">
						<option> Month</option>
						<option value="01">Jan</option>
						<option value="02">Feb</option>
						<option value="03">Mar</option>
						<option value="04">Apr</option>
						<option value="05">May</option>
						<option value="06">Jun</option>
						<option value="07">Jul</option>
						<option value="08">Aug</option>
						<option value="09">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
					<select name="ye" class="input5">
						<option value="">Select Year</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
					</select><br><br>
			    <button type="submit" style="float:right;" class="btn" name="submit">Add Student Details</button>
				</div>
					
				</form>
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>