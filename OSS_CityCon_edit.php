<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $ccode = $_POST["ccode"];
    $cname = $_POST["cname"];
    

        $sql = "UPDATE constituency set cname ='$cname' where id = '$ccode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Constituency Edited Successfully!");'; 
        echo 'window.location.href = "sysadmin1_regions.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>