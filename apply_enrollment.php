<?php
include "database.php";
session_start();
if (!isset($_SESSION["student_ID"])) {
    echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";

}
?>

<!-- HTML code for the leave request form -->
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
    <h1>Submit Enrollment Request</h1>

    <?php
    if (isset($_POST["Submit"])) {
        // Get form data
        $Course_ID = $_POST["course_ID"];
        $Student_ID = $_SESSION["student_ID"];
        $status = "Pending";

        // Insert leave request into Leave table
        $sq = "INSERT INTO Enrollment (course_ID, student_ID, status) VALUES ('{$Course_ID}', '{$Student_ID}', '{$status}')";

        if ($db->query($sq)) {
            echo "<div class='success'>Enrollment Request Awaiting Response</div>";
        } else {
            echo "<div class='error'>Failed</div>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="course_ID">Course ID:</label>
        <input type="text" id="course_ID" name="course_ID" required><br>

        <button type="Submit" class="btn" name="Submit">Submit Enrollment Request</button>
    </form>

    <?php include"footer.php";?>
</body>

</html>