<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $areacode = $_POST["areacode"];
    $areaname = $_POST["areaname"];
    $wardid = $_POST["wardid"];
    

        $sql = "UPDATE areas set aname ='$areaname',wardid ='$wardid' where areacode = '$areacode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Area Edited Successfully!");'; 
        echo 'window.location.href = "sysadmin1_tas.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>