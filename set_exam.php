<?php
include "database.php";
session_start();
if (!isset($_SESSION["prof_ID"])) {
    echo "<script>window.open('index.php?mes=Access Denied..','_self');</script>";
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
    <div class="sidebar">
        <?php include "sidebar.php"; ?>
    </div>

    <h3>Set Exam</h3>
    <?php
    if (isset($_POST["submit"])) {
        $prof_ID = $_SESSION["prof_ID"];
        $course_ID = $_POST["course_ID"];
        $exam_date = $_POST["exam_date"];

        $ch = "SELECT Professor.prof_ID from Professor inner join Course on Professor.prof_ID = Course.prof_ID where Professor.prof_ID = '{$_SESSION["prof_ID"]}' and Course.course_ID = '{$course_ID}'";
        // $ch = "SELECT professor.prof_ID from Course INNER JOIN Professor ON Professor.prof_ID = Course.prof_ID where Course.course_ID = '{$course_ID}'";
        $result = $db->query($ch);

        if ($result->num_rows == 0) {
            echo "The professor is not assigned to the given course.";
        } else {
            $sql = "INSERT INTO Exam (course_ID, exam_date) VALUES ('{$course_ID}', '{$exam_date}')";
            if ($db->query($sql)) {
                echo "Exam Date Set Successfully";
            } else {
                echo "Error Occured";
            }
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <label for="course_ID">Course ID</label>
        <input type="text" id="course_ID" name="course_ID" required><br><br>
        <label for="exam_date">Exam Date</label>
        <input type="date" id="exam_date" name="exam_date" required><br><br>
        <input type="submit" value="Set Exam" name='submit'>
    </form>

    <?php include"footer.php";?>
</body>

</html>