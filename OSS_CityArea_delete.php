<?php
include_once 'layouts/config.php';
    
    $areacode = $_GET["id"];
    
        $sql = "DELETE from areas where areacode = '$areacode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("City Area Deleted Successfully!");'; 
        echo 'window.location.href = "sysadmin1_tas.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>