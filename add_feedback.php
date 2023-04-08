<?php
include "database.php";
session_start();
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
    <?php
    if (isset($_POST["Submit"])) {
        // Get form data
        $feedback_details = $_POST["feedback_details"];
        $feedback_to = $_POST["feedback_to"];
        $person_ID = $_POST["person_ID"];
        $status = "Pending";

        // Insert leave request into Leave table
        $sq = "INSERT INTO Feedback (feedback_details, person_ID, feedback_to) VALUES ('{$feedback_details}', '{$person_ID}', '{$feedback_to}')";

        if ($db->query($sq)) {
            echo "<div class='success'>Feedback Awaiting Response</div>";
        } else {
            echo "<div class='error'>Failed</div>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="feedback_details">Feedback Details:</label>
        <input type="text" id="feedback_details" name="feedback_details" required><br>
        <label for="person_ID">Your ID:</label>
        <input type="text" id="person_ID" name="person_ID" required><br>
        <label for="feedback_to">Feedback to (Enter ID):</label>
        <input type="text" id="feedback_to" name="feedback_to" required><br>

        <button type="Submit" class="btn" name="Submit">Submit Feedback</button>
    </form>


</body>

</html>