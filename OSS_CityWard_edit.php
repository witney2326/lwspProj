<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $wcode = $_POST["wcode"];
    $wname = $_POST["wname"];
    $con = $_POST["con"];
    

        $sql = "UPDATE wards set wname ='$wname',constituency ='$con' where id = '$wcode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Ward Edited Successfully!");'; 
        echo 'window.location.href = "sysadmin1_districts.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>