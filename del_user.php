<?php
include 'layouts/config.php';


    $id=$_GET["id"];
    

    $query_up="UPDATE users set deleted = '1' where id ='$id'";
    if ($result_set_up = $link->query($query_up))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("App User Record Deleted Successfully !");'; 
            echo 'window.location.href = "sysadmin1.php";';
            echo '</script>';
        } else {
            echo "Error: " . $query_up . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
    
?>