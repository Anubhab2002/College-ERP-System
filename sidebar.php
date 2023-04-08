<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["admin_ID"]))
	{
        echo'
            <ul>
        <li class="li"><a href="admin_home_page.php">College Information</a></li>
        <li class="li"><a href="view_dept.php">Departments</a></li>
        <li class="li"><a href="#">Exam</a>
            <ul>
                <li><a href="view_exam.php">View Exam</a></li>
            </ul>
        </li>
        <li class="li"><a href="#">Course</a>
            <ul>
                <li><a href="view_course.php">View Course</a></li>
                <li><a href="add_course.php">Add Course</a></li>
                <li><a href="update_course.php">Update Course</a></li>
                <li><a href="delete_course.php">Delete Course</a></li>
            </ul>
        </li>
        <li class="li"><a href="#">Professor</a>
            <ul>
                <li><a href="view_prof.php">View Professor</a></li>
                <li><a href="add_prof.php">Add Professor</a></li>
                <li><a href="delete_prof.php">Delete Professor</a></li>
            </ul>
        </li>
        <li class="li"><a href="#">Student</a>
            <ul>
                <li><a href="view_student.php">View Student</a></li>
                <li><a href="add_student.php">Add Student</a></li>
                <li><a href="update_student.php">Update Student</a></li>
                <li><a href="delete_student.php">Delete Student</a></li>
            </ul>
        </li>
        <li class="li"><a href="view_leave_admin.php">Approve/Deny Leave</a></li> 
        <li class="li"><a href="logout.php">Logout</a></li>
    </ul>
    ';
	
	}
	elseif(isset($_SESSION["prof_ID"]))
    {
		echo'
            <ul>
                <li class="li"><a href="student_home_page.php">College Information</a></li>
                <li class="li"><a href="view_dept.php">Departments</a></li>
                <li class="li"><a href="#">Exam</a>
                    <ul>
                        <li><a href="view_exam.php">View Exam</a></li>
                        <li><a href="set_exam.php">Set Exam</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Course</a>
                    <ul>
                        <li><a href="view_course.php">View Course</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Professor</a>
                    <ul>
                        <li><a href="view_prof.php">View Professor</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Student</a>
                    <ul>
                        <li><a href="view_student_profwise.php">View Student</a></li>
                        <li><a href="grade_student.php">Grade Student</a></li>
                    </ul>
                </li>
                <li class="li"><a href="enrollment_action.php">Approve/Deny Enrollments</a></li>
                <li class="li"><a href="#">Leave</a>
                    <ul>
                        <li><a href="apply_leave.php">Apply Leave</a></li>
                        <li><a href="view_leave.php">View Applied Leaves</a></li>
                    </ul>
                </li>
                <li class="li"><a href="add_feedback.php">Feedback</a></li>
                </li>
                <li class="li"><a href="logout.php">Logout</a></li>
            </ul>	
		';
	}
    elseif(isset($_SESSION["student_ID"]))
    {
		echo'
            <ul>
                <li class="li"><a href="student_home_page.php">College Information</a></li>
                <li class="li"><a href="view_dept.php">Departments</a></li>
                <li class="li"><a href="#">Exam</a>
                    <ul>
                        <li><a href="view_exam.php">View Exam</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Course</a>
                    <ul>
                        <li><a href="view_course.php">View Course</a></li>
                        <li><a href="apply_enrollment.php">Apply for Course</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Professor</a>
                    <ul>
                        <li><a href="view_prof.php">View Professor</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Attendance</a>
                    <ul>
                        <li><a href="view_attendance.php">View Attendance</a></li>
                        <li><a href="mark_attendance.php">Mark Attendance</a></li>
                    </ul>
                </li>
                <li class="li"><a href="#">Leave</a>
                    <ul>
                        <li><a href="apply_leave.php">Apply Leave</a></li>
                        <li><a href="view_leave.php">View Applied Leaves</a></li>
                    </ul>
                </li>
                <li class="li"><a href="add_feedback.php">Feedback</a></li>
                <li class="li"><a href="performance.php">Performance Summary</a></li>
                </li>
                <li class="li"><a href="logout.php">Logout</a></li>
            </ul>	
		';
	}


?>
	

</ul>

</div>