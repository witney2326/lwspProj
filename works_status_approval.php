<?php

    include_once 'layouts/config.php';

    $ID = $_GET['id']; 

    $result = mysqli_query($link, "SELECT pstatus_approved FROM tprojects where pID = '$ID'"); 
    $row = mysqli_fetch_assoc($result); 
    $pstatus_approved = $row['pstatus_approved']; 

    if ($pstatus_approved == '1')
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Current Status Already Approved!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    } else if ($pstatus_approved == '0')
    {
        $sql = "UPDATE tprojects set pstatus_approved ='1' where pID = '$ID'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Status Approved Successfully!");'; 
        echo 'history.go(-1)';
        echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }

        mysqli_close($link);
    }
         
?>