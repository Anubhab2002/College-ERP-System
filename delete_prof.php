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
                <h3>Delete Professor (Remember you cannot delete a professor who is taking a course)</h3><br>
                <?php
                    if(isset($_POST["delete"]))
                    {
                        $prof_ID = $_POST["prof_id"];
                        
                        $sq="delete from professor where prof_ID='{$prof_ID}'";
                        if($db->query($sq))
                        {
                            echo "<div class='success'>Professor Deleted Successfully!!</div>";
                        }
                        else
                        {
                            echo "<div class='error'>Failed to delete professor!!</div>";
                        }
                    }
                ?>
                
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>Professor ID</label>
                    <input type="text" name="prof_id" required class="input"><br>
                    <button type="submit" class="btn" name="delete">Delete Professor</button>
                </form>
            </div>
        </div>
        
        <?php include "footer.php"; ?>
    </body>
</html>
