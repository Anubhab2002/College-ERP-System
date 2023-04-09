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
        
        <div id="section">
            <?php include "sidebar.php"; ?><br><br><br>
            <h3 class="text">Welcome <?php echo $_SESSION["admin_name"]; ?></h3><br><hr><br>
            <div class="content1">
                <h3>Delete Student</h3><br>
                <?php
                    if(isset($_POST["delete"]))
                    {
                        $student_ID = $_POST["student_ID"];
                        
                        $sq="delete from student where student_ID='{$student_ID}'";
                        if($db->query($sq))
                        {
                            echo "<div class='success'>Student Deleted Successfully!!</div>";
                        }
                        else
                        {
                            echo "<div class='error'>Failed to delete student!!</div>";
                        }
                    }
                ?>
                
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>Enter Student ID</label>
                    <input type="text" name="student_ID" required class="input"><br>
                    <button type="submit" class="btn" name="delete">Delete Student</button>
                </form>
            </div>
        </div>
        
        <?php include "footer.php"; ?>
    </body>
</html>
