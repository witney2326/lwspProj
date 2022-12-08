<?php
include_once 'layouts/config.php';
    
    $wardid = $_GET["id"];
    
        $sql = "DELETE from wards where id = '$wardid'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("City Ward Deleted Successfully!");'; 
        echo 'window.location.href = "sysadmin1_districts.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>