<?php
include_once 'layouts/config.php';


if(isset($_POST['Add']))
{    
    $wcode = $_POST["wcode"];
    $wname= $_POST["wname"];   
    $ccode = $_POST["ccode"];

        $sql = "INSERT INTO wards (id,constituency,wname)
        VALUES ('$wcode','$ccode','$wname')";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("New City Ward Added Successfully!");'; 
        echo 'window.location.href = "sysadmin1_districts.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>