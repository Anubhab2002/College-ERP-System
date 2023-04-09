<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["prof_ID"])) {
        echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
    }

    // check if the form has been submitted
    if(isset($_POST['submit'])) {
        $studentID = $_POST['student_id'];
        $courseID = $_POST['course_id'];
        $grade = $_POST['grade'];
        $professorID = $_SESSION["prof_ID"];

        // check if the grade already exists for the student and course
        $sql = "SELECT * FROM Enrollment WHERE student_ID = '$studentID' AND course_ID = '$courseID'";
        $result = $db->query($sql);

        if(mysqli_num_rows($result) > 0) {
            // update the existing grade
            $sql = "UPDATE Enrollment SET grade = '$grade' WHERE student_ID = '$studentID' AND course_ID = '$courseID'";
            $result = $db->query($sql);
            echo "<script>alert('Grade updated successfully!');</script>";
        } else {
            // insert the new grade
            $sql = "INSERT INTO Enrollment (student_ID, course_ID, grade) VALUES ('$studentID', '$courseID', '$grade')";
            $result = $db->query($sql);
            echo "<script>alert('Grade added successfully!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>XYZ Institute of Technology ERP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include "navbar.php"; ?><br>
    <img src="img/1.jpg" width="780" style="margin-left:10px;" class="sha">
    <div class="sidebar">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="content">
        <h3 class="text">Welcome <?php echo $_SESSION["prof_name"]; ?></h3><br><hr><br>
        <h3>Add Grades to students <?php echo 'under '; echo $_SESSION['prof_name']; ?></h3><br>
        <?php
        $sq = "SELECT * FROM Student INNER JOIN Department ON student.dept_ID = department.dept_ID INNER JOIN Enrollment ON Enrollment.student_ID = Student.student_ID INNER JOIN Course ON Course.course_ID = Enrollment.course_ID INNER JOIN Professor ON Course.prof_ID = Professor.prof_ID WHERE Professor.prof_ID = '{$_SESSION["prof_ID"]}'";
        $result = $db->query($sq);
        if (isset($_POST["Submit"])) {
            $grade = $_POST["grades"];
            $student_ID = $_POST["student_ID"];
            $sql = "UPDATE Enrollment SET grades = '{$grade}' WHERE student_ID = '{$student_ID}'";
            if ($db->query($sql) === TRUE) {
                echo "<div class='success'>Added Grades to the Student</div>";
            } else {
                echo "<div class='failure'>Failed to add Grades to the Student</div>";
            }
        }
        ?>
        <table>
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Department Name</th>
                <th>Student Name</th>
                <th>Date of Birth</th>
                <th>Date of Joining</th>
                <th>Course Taken</th>
                <th>Grades</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM Student INNER JOIN Department ON student.dept_ID = department.dept_ID INNER JOIN Enrollment ON Enrollment.student_ID = Student.student_ID INNER JOIN Course ON Course.course_ID = Enrollment.course_ID INNER JOIN Professor ON Course.prof_ID = Professor.prof_ID WHERE Professor.prof_ID = '{$_SESSION["prof_ID"]}'";
            $result = $db->query($sql);
            // loop through the result and display each row as a table row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["student_ID"]."</td>";
                echo "<td>".$row["dept_name"]."</td>";
                echo "<td>".$row["student_name"]."</td>";
                echo "<td>".$row["dob"]."</td>";
                echo "<td>".$row["doj"]."</td>";
                echo "<td>".$row["course_name"]."</td>";
                if ($row["grades"] == null) {
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<select name='grades'>";
                    echo "<option value='10'>Ex</option>";
                    echo "<option value='9'>A</option>";
                    echo "<option value='8'>B</option>";
                    echo "<option value='7'>C</option>";
                    echo "<option value='6'>D</option>";
                    echo "<option value='5'>P</option>";
                    echo "<option value='4'>F</option>";
                    echo "</select>";
                    echo "<input type='hidden' name='student_ID' value='".$row["student_ID"]."'>";
                    echo "<input type='submit' value='Add Grade' name='Submit'>";
                    echo "</form>";
                    echo "</td>";
                } else {
                    $grade = "";
                    switch ($row["grades"]) {
                        case 10:
                            $grade = "Ex";
                            break;
                        case 9:
                            $grade = "A";
                            break;
                        case 8:
                            $grade = "B";
                            break;
                        case 7:
                            $grade = "C";
                            break;
                        case 6:
                            $grade = "D";
                            break;
                        case 5:
                            $grade = "P";
                            break;
                        default:
                            $grade = "F";
                    }
                    echo "<td>".$grade."</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>

<div class="footer">
    <footer>
        <p>Copyright &copy; ANUBHAB MANDAL 20MA20080
        </p>
    </footer>
</div>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(".error").fadeTo(1000, 100).slideUp(1000, function(){
            $(".error").slideUp(1000);
        });
    });
</script>
</body>
</html>



