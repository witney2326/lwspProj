<?php 

    include "layouts/config.php";     

    if(isset($_POST['Update']))
        {    
        $proj_id = $_POST['proj_id'];
        $hhcode = $_POST['hhcode'];
        $progress = $_POST['progress'];
        $achieved_date = $_POST['achieved_date'];

        if (($progress == "01") or ($progress == "05"))
        {
            $sql3 = mysqli_query($link,"update households  SET current_status = '08' where hhcode = '$hhcode'");
            $sql = mysqli_query($link,"update tprojects  SET pstatus = '$progress' where pID = '$proj_id'");
            $sql2 = "INSERT INTO tproject_progress (projID,status_date,proj_status) VALUES ('$proj_id','$achieved_date','$progress')";
        }
        else 
        {
            $sql = mysqli_query($link,"update tprojects  SET pstatus = '$progress' where pID = '$proj_id'");
            $sql2 = "INSERT INTO tproject_progress (projID,status_date,proj_status) VALUES ('$proj_id','$achieved_date','$progress')";
        }
    
        if  (($progress == "01") or ($progress == "05"))
        {
            if (($sql) and mysqli_query($link,$sql2) and ($sql3) ){
                echo '<script type="text/javascript">'; 
                echo 'alert("Project Progress UPDATED successfully !");'; 
                echo 'history.go(-2)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        } else
        {
            if (($sql) and mysqli_query($link,$sql2)){
                echo '<script type="text/javascript">'; 
                echo 'alert("Project Progress UPDATED successfully !");'; 
                echo 'history.go(-2)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }    
        
        mysqli_close($link);
        }
               
    ?>
    