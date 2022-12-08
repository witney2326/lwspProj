<?php
include_once 'layouts/config.php';


if(isset($_POST['Add']))
{    
    $ccode = $_POST["ccode"];
    $cname= $_POST["cname"];   

        $sql = "INSERT INTO constituency (id,cname)
        VALUES ('$ccode','$cname')";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("New Constituency Added Successfully!");'; 
        echo 'window.location.href = "sysadmin1_regions.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>