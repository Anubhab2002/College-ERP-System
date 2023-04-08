<?php
    session_start();
    // Retrieve attendance data for all students from database
    include "database.php";
    // Check if user is logged in as admin
    if (!isset($_SESSION['admin_ID'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Attendance Report</h1>

    <?php
        // Retrieve attendance data for all students
        $sql = "SELECT * from Attendance INNER JOIN Student ON Attendance.student_ID = Student.student_ID INNER JOIN Department ON Student.dept_ID = Department.dept_ID ORDER BY Student.student_ID, Attendance.course_ID";
        $result = $db->query($sql);
        
        if($result->num_rows >0)
        {
            // Initialize variables to keep track of the current student and course
            $current_student_id = null;
            $current_course_id = null;
            $current_days_present = 0;
            $current_days_total = 0;

            echo "<table>";
            echo "<tr><th>Student ID</th><th>Course ID</th><th>Days Present</th><th>Total Days</th><th>Percentage</th></tr>";

            // Loop through the rows of attendance data and display the information
            while ($row = $result->fetch_assoc()) {
                if ($current_student_id != $row["student_ID"] || $current_course_id != $row["course_ID"]) {
                    // If we have moved on to a new student or a new course, display the attendance summary for the previous student and course
                    if ($current_student_id != null && $current_course_id != null) {
                        $perc = round(($current_days_present / $current_days_total) * 100, 2);
                        echo "<tr>";
                        echo "<td>".$current_student_id."</td>";
                        echo "<td>".$current_course_id."</td>";
                        echo "<td>".$current_days_present."</td>";
                        echo "<td>".$current_days_total."</td>";
                        echo "<td>".$perc."%</td>";
                        echo "</tr>";
                    }

                    // Reset the variables for the new student and course
                    $current_student_id = $row["student_ID"];
                    $current_course_id = $row["course_ID"];
                    $current_days_present = 0;
                    $current_days_total = 0;
                }

                // Add the attendance information for the current row to the running total
                $current_days_present += $row["days_present"];
                $current_days_total += $row["days_total"];
            }

            // Display the attendance summary for the last student and course
            $perc = round(($current_days_present / $current_days_total) * 100, 2);
            echo "<tr>";
            echo "<td>".$current_student_id."</td>";
            echo "<td>".$current_course_id."</td>";
            echo "<td>".$current_days_present."</td>";
            echo "<td>".$current_days_total."</td>";
            echo "<td>".$perc."%</td>";
            echo "</tr>";

            echo "</table>";
        }
        else {
            echo '<p>No attendance data found.</p>';
        } ?>

</body>
</html>
