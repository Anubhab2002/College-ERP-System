<div class="navbar">

			<ul class="list">
				<img src="img/xyz_logo.png" alt="logo" style="height: 40px; float:left; padding-top: 9px; padding-left:8px;">
				<!-- <b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Cooper Black;">
				XYZ Institute of Technology ERP</b> -->
			<?php
				if(isset($_SESSION["admin_ID"]))
				{
					echo'
				
						<li><a href="admin_home_page.php">Admin Home</a></li>
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["prof_ID"]))
				{
					echo'
				
						<li><a href="prof_home_page.php">Professor Home</a></li>
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
					';
				}
                elseif(isset($_SESSION["student_ID"]))
				{
					echo'
				
						<li><a href="student_home_page.php">Student Home</a></li>
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
					';
				}
				else{
					echo'
					
					<li><a href="index.php">Admin</a></li>
                    <li><a href="prof_login.php">Professor</a></li>
                    <li><a href="student_login.php">Student</a></li>';
				}
			?>
				
			</ul>
		</div>
		