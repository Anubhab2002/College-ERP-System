<?php
include "database.php";
session_start();
if (!isset($_SESSION["prof_ID"])) {
    echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";

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

    <h3>Enrollment Applications</h3>
    <?php
    if (isset($_POST["submit"])) {
        $course_ID = $_POST["course_ID"];
        $student_ID = $_POST["student_ID"];
        $Status = $_POST["status"];
        // $Days = $_POST["days"];

        $sql = "UPDATE Enrollment SET status='{$Status}' where course_ID='{$course_ID}' and student_ID='{$student_ID}'";
        if ($db->query($sql)) {
            echo "Enrollment status has been updated";
        } else {
            echo "Error in Updating the Status";
        }
    }
    ?>
    <?php
    $sq = "SELECT * from Enrollment inner join Course on Enrollment.course_ID = Course.course_ID where Course.prof_ID = '{$_SESSION['prof_ID']}' and status='Pending'";
    $result = $db->query($sq);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Course ID</th><th>Student ID</th><th>Status</th><th>Date of Enrollment</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["course_ID"] . "</td><td>" . $row["student_ID"] . "</td><td>" . $row["status"] . "</td><td>" . $row["doe"] . "</td><td><form method='POST' action='" . $_SERVER["PHP_SELF"] . "'><input type='hidden' name='course_ID' value='" . $row["course_ID"] . "'><input type='hidden' name='student_ID' value='" . $row["student_ID"] . "'><select name='status'><option value='Approved' ";
            if ($row["status"] == "Approved")
                echo "selected";
            echo ">Approved</option><option value='Denied' ";
            if ($row["status"] == "Denied")
                echo "selected";
            echo ">Denied</option></select>&nbsp&nbsp<button type='submit' name='submit'>Update</button></form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No Pending Enrollment requests.";
    }
    ?>
    <?php include"footer.php";?>
</body>

</html>