<?php
include "database.php";
session_start();
if (!isset($_SESSION["admin_ID"])) {
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

    <h3>Leave Applications</h3>
    <?php
    if (isset($_POST["submit"])) {
        $leave_ID = $_POST["leave_ID"];
        $Status = $_POST["status"];
        // $Days = $_POST["days"];

        $sql = "UPDATE Leaveapp SET Status='{$Status}' where Leave_ID='{$leave_ID}'";
        if ($db->query($sql)) {
            echo "Leave status has been updated";
        } else {
            echo "Error in Updating the Status";
        }
    }
    ?>
    <?php
    $sq = "SELECT * from Leaveapp where Status='Pending'";
    $result = $db->query($sq);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Leave ID</th><th>Professor ID</th><th>Status</th><th>Reason For Leave</th><th>Number of days</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["leave_ID"] . "</td><td>" . $row["prof_ID"] . "</td><td>" . $row["status"] . "</td><td>" . $row["reason"] . "</td><td>" . $row["days"] . "</td><td><form method='POST' action='" . $_SERVER["PHP_SELF"] . "'><input type='hidden' name='leave_ID' value='" . $row["leave_ID"] . "'><select name='status'><option value='Approved' ";
            if ($row["status"] == "Approved")
                echo "selected";
            echo ">Approved</option><option value='Denied' ";
            if ($row["status"] == "Denied")
                echo "selected";
            echo ">Denied</option></select>&nbsp&nbsp<button type='submit' name='submit'>Update</button></form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No Pending Leaves present.";
    }
    ?>
    <?php include"footer.php";?>
</body>

</html>