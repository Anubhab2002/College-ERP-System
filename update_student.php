<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["admin_ID"]))
    {
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
        <img src="img/1.jpg" style="margin-left:90px;" class="sha">
        
        <div id="section">
            <?php include "sidebar.php"; ?><br><br><br>
            <h3 class="text">Welcome <?php echo $_SESSION["admin_name"]; ?></h3><br><hr><br>
            <div class="content1">
                <h3>Update Student Details</h3><br>
                <?php
                    if(isset($_POST["update"]))
                    {
                        $student_ID = $_POST["student_ID"];
                        $student_name = $_POST["student_name"];
                        $dob = $_POST["dob"];
                        
                        $sq="update student set student_name='{$student_name}', dob='{$dob}' where student_ID='{$student_ID}'";
                        if($db->query($sq))
                        {
                            echo "<div class='success'>Student Details Updated Successfully!!</div>";
                        }
                        else
                        {
                            echo "<div class='error'>Failed to update student details!!</div>";
                        }
                    }
                ?>
                
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>Student ID</label>
                    <input type="text" name="student_ID" required class="input"><br>
                    <label>Student Name</label>
                    <input type="text" name="student_name" required class="input"><br>
                    <label>Date of Birth</label>
                    <input type="date" name="dob" required class="input"><br>
                    <button type="submit" class="btn" name="update">Update Student Details</button>
                </form>
            </div>
        </div>
        
        <?php include "footer.php"; ?>
    </body>
</html>
