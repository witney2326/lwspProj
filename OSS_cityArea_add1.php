<?php
include_once 'layouts/config.php';


if(isset($_POST['Add']))
{    
    $acode = $_POST["acode"];
    $aname= $_POST["aname"];   
    $wardid = $_POST["wardid"];

        $sql = "INSERT INTO areas (areacode,wardid,aname)
        VALUES ('$acode','$wardid','$aname')";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("New City Area Added Successfully!");'; 
        echo 'window.location.href = "sysadmin1_tas.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>