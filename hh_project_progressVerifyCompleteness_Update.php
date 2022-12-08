<?php 
    include "layouts/config.php";     

    if(isset($_POST['Update']))
        {    
        $proj_id = $_POST['proj_id'];
        $hhcode = $_POST['hhcode'];
        $progress = $_POST['progress'];
        $achieved_date = $_POST['achieved_date'];

        $sql3 = mysqli_query($link,"update households  SET current_status = '09' where hhcode = '$hhcode'");
        
        $sql = mysqli_query($link,"update tprojects  SET pstatus = '06', pCompletenessVerified = '1',pcompletiondate = '$achieved_date', pCertificateProduced = '1',pHandedOverHH = '1' where pID = '$proj_id'");
        $sql2 = "INSERT INTO tproject_progress (projID,status_date,proj_status) VALUES ('$proj_id','$achieved_date','06')";
        
        if (($sql) and mysqli_query($link,$sql2) and ($sql3) ){
            echo '<script type="text/javascript">'; 
            echo 'alert("OSS Works Verified successfully !");'; 
            echo 'window.location.href = "works_tracking_verified_completed_projects.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }

        mysqli_close($link);
        }
               
    ?>
    