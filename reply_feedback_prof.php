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
    <h3>Feedback Replies</h3>
    <?php
    if (isset($_POST["submit"])) {
        $feedback_ID = $_POST["feedback_ID"];
        $feedback_reply = $_POST["feedback_reply"];

        $sql = "UPDATE Feedback SET feedback_reply='{$feedback_reply}' WHERE feedback_ID='{$feedback_ID}' AND feedback_to='{$_SESSION["prof_ID"]}'";
        if ($db->query($sql)) {
            echo "Reply has been submitted";
        } else {
            echo "Error in submitting the feedback_reply";
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM Feedback WHERE feedback_to='{$_SESSION["prof_ID"]}'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Feedback ID</th><th>From</th><th>Feedback</th><th>Reply</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["feedback_ID"] . "</td><td>" . $row["person_ID"] . "</td><td>" . $row["feedback_details"] . "</td><td>";
            if ($row["feedback_reply"]) {
                echo $row["feedback_reply"];
            } else {
                echo "<form method='POST' action='" . $_SERVER["PHP_SELF"] . "'><input type='hidden' name='feedback_ID' value='" . $row["feedback_ID"] . "'><textarea name='feedback_reply' placeholder='Enter your feedback_reply here'></textarea>&nbsp&nbsp<button type='submit' name='submit'>Submit</button></form>";
            }
            echo "</td><td></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No Feedback present.";
    }
    ?>
</body>
</html>
