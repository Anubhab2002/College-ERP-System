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

<body>
    <?php include "navbar.php"; ?><br>
    <div class="sidebar">
        <?php include "sidebar.php"; ?>
    </div>

    <h1>Examinations</h1>
    <table>
    <?php
    if(isset($_SESSION["admin_ID"]))
    {
        
        echo '
        <tr>
        <th>Exam ID</th>
        <th>Course ID</th>
        <th>Date</th>
        </tr>';

        // Retrieve department data from database
        $sql = "SELECT * FROM Exam";
        $result = $db->query($sql);

        // Display department data in table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["exam_ID"] . "</td><td>" . $row["course_ID"] . "</td><td>" . $row["exam_date"] . "</td></tr>";
            }
        } else {
            echo "No Exam Coming Up!! Enjoy!";
        }
        $db->close();
    }
    elseif(isset($_SESSION["prof_ID"]))
    {
        
        echo '
        <tr>
        <th>Exam ID</th>
        <th>Course ID</th>
        <th>Date</th>
        </tr>';

        // Retrieve department data from database
        $sql = "SELECT * FROM Exam INNER JOIN Course ON Exam.course_ID = Course.course_ID WHERE Course.prof_ID = '{$_SESSION["prof_ID"]}'";
        $result = $db->query($sql);

        // Display department data in table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["exam_ID"] . "</td><td>" . $row["course_ID"] . "</td><td>" . $row["exam_date"] . "</td></tr>";
            }
        } else {
            echo "No Exam Coming Up!! Enjoy!";
        }
        $db->close();
    }
    elseif(isset($_SESSION["student_ID"]))
    {
        
        echo '
        <tr>
        <th>Exam ID</th>
        <th>Course ID</th>
        <th>Date</th>
        </tr>';

        // Retrieve department data from database
        $sql = "SELECT * FROM Exam INNER JOIN Enrollment ON Exam.course_ID = Enrollment.course_ID WHERE  Enrollment.student_ID = '{$_SESSION["student_ID"]}' AND Enrollment.status = 'Approved'";
        $result = $db->query($sql);

        // Display department data in table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["exam_ID"] . "</td><td>" . $row["course_ID"] . "</td><td>" . $row["exam_date"] . "</td></tr>";
            }
        } else {
            echo "No Exam Coming Up!! Enjoy!";
        }
        $db->close();
    }
    ?>
    </table>

    <?php include"footer.php";?>
</body>

</html>