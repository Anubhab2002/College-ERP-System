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
                <h3>View Courses</h3><br>
                <table class="tablefull">
                    <tr>
                        <th>S.No</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Course Details</th>
                        <th>Department</th>
                        <th>Professor Assigned</th>
                    </tr>
                    <?php
                        $sql = "select * from course";
                        $res = $db->query($sql);
                        if($res->num_rows > 0)
                        {
                            $i=0;
                            while($row=$res->fetch_assoc())
                            {
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["course_ID"]; ?></td>
                        <td><?php echo $row["course_name"]; ?></td>
                        <td><?php echo $row["course_details"]; ?></td>
                        <td><?php echo $row["dept_ID"]; ?></td>
                        <td><?php echo $row["prof_ID"]; ?></td>
                    </tr>
                    <?php
                            }
                        }
                        else
                        {
                    ?>
                    <tr>
                        <td colspan="6">No Courses Found!!</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <?php include "footer.php"; ?>
    </body>
</html>
