<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["admin_ID"]))
	{
        echo'
            <ul>
        <li class="li"><a href="admin_home_page.php"><h3>College Information<h3></a></li>
        <li class="li"><a href="view_dept.php"><h3>Departments</h3></a></li>
        <li class="li"><h3>Exam</h3>
            <ul>
                <li><a href="view_exam.php">View Exam</a></li>
            </ul>
        </li>
        <li class="li"><h3>Course</h3>
            <ul>
                <li><a href="view_course.php">View Course</a></li>
                <li><a href="add_course.php">Add Course</a></li>
                <li><a href="update_course.php">Update Course</a></li>
                <li><a href="delete_course.php">Delete Course</a></li>
            </ul>
        </li>
        <li class="li"><h3>Professor</h3>
            <ul>
                <li><a href="view_prof.php">View Professor</a></li>
                <li><a href="add_prof.php">Add Professor</a></li>
                <li><a href="delete_prof.php">Delete Professor</a></li>
            </ul>
        </li>
        <li class="li"><h3>Student</h3>
            <ul>
                <li><a href="view_student.php">View Student</a></li>
                <li><a href="add_student.php">Add Student</a></li>
                <li><a href="update_student.php">Update Student</a></li>
                <li><a href="delete_student.php">Delete Student</a></li>
            </ul>
        </li>
        <li class="li"><h3>Feedback</h3>
            <ul>
                <li><a href="add_feedback.php">Add Feedback</a></li>
                <li><a href="reply_feedback_admin.php">View and Reply Feedback</a></li>
            </ul>
        </li>
        <li class="li"><a href="view_leave_admin.php"><h3>Approve/Deny Leave</h3></a></li> 
        <li class="li"><a href="logout.php"><h3>Logout</h3></a></li>
    </ul>
    ';
	
	}
	elseif(isset($_SESSION["prof_ID"]))
    {
		echo'
            <ul>
                <li class="li"><a href="prof_home_page.php"><h3>College Information<h3></a></li>
                <li class="li"><a href="view_dept.php"><h3>Departments</h3></a></li>
                <li class="li"><h3>Exam</h3>
                    <ul>
                        <li><a href="view_exam.php">View Exam</a></li>
                        <li><a href="set_exam.php">Set Exam</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Course</h3>
                    <ul>
                        <li><a href="view_course.php">View Course</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Professor</h3>
                    <ul>
                        <li><a href="view_prof.php">View Professor</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Student</h3>
                    <ul>
                        <li><a href="view_student_profwise.php">View Student</a></li>
                        <li><a href="grade_student.php">Grade Student</a></li>
                    </ul>
                </li>
                <li class="li"><a href="enrollment_action.php"><h3>Approve/Deny Enrollments</h3></a></li>
                <li class="li"><h3>Leave</h3>
                    <ul>
                        <li><a href="apply_leave.php">Apply Leave</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Feedback</h3>
                    <ul>
                        <li><a href="add_feedback.php">Add Feedback</a></li>
                        <li><a href="reply_feedback_prof.php">View and Reply Feedback</a></li>
                    </ul>
                </li>
                </li>
                <li class="li"><a href="logout.php"><h3>Logout</h3></a></li>
            </ul>	
		';
	}
    elseif(isset($_SESSION["student_ID"]))
    {
		echo'
            <ul>
                <li class="li"><a href="student_home_page.php"><h3>Student Dashboard</h3></a></li>
                <li class="li"><a href="view_dept.php"><h3>Departments</h3></a></li>
                <li class="li"><h3>Exam</h3>
                    <ul>
                        <li><a href="view_exam.php">View Exam</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Course</h3>
                    <ul>
                        <li><a href="view_course.php">View Course</a></li>
                        <li><a href="apply_enrollment.php">Apply for Course</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Professor</h3>
                    <ul>
                        <li><a href="view_prof.php">View Professor</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Attendance</h3>
                    <ul>
                        <li><a href="view_attendance.php">View Attendance</a></li>
                        <li><a href="mark_attendance.php">Mark Attendance</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Leave</h3>
                    <ul>
                        <li><a href="apply_leave.php">Apply Leave</a></li>
                    </ul>
                </li>
                <li class="li"><h3>Feedback</h3>
                    <ul>
                        <li><a href="add_feedback.php">Add Feedback</a></li>
                        <li><a href="reply_feedback_student.php">View and Reply Feedback</a></li>
                    </ul>
                </li>
                <li class="li"><a href="performance.php"><h3>Performance Summary</h3></a></li>
                </li>
                <li class="li"><a href="logout.php"><h3>Logout</h3></a></li>
            </ul>	
		';
	}


?>
	

</ul>

</div>