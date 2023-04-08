<?php
include "database.php";
session_start();
if (!isset($_SESSION["prof_ID"])) {
    echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";

}
?>

<!-- HTML code for the leave request form -->
<!DOCTYPE html>
<html>

<head>
    <title>Submit Leave Request</title>
</head>

<body>
    <h1>Submit Leave Request</h1>

    <?php
    if (isset($_POST["Submit"])) {
        // Get form data
        $Professor_ID = $_SESSION["prof_ID"];
        $days = $_POST["days"];
        $status = "Pending";

        // Insert leave request into Leave table
        $sq = "INSERT INTO Leaveapp (prof_ID, status, reason, days) VALUES ('{$Professor_ID}', '{$status}', '{$_POST["reason"]}', '{$_POST["days"]}')";

        if ($db->query($sq)) {
            echo "<div class='success'>Leave Request Awaiting Response</div>";
        } else {
            echo "<div class='error'>Failed</div>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="Reason">Reason For Leave:</label>
        <input type="text" id="Reason" name="reason" required><br>

        <label for="days">Number of days:</label>
        <input type="number" id="days" name="days" required><br>

        <button type="Submit" class="btn" name="Submit">Submit Leave Request</button>
    </form>


</body>

</html>