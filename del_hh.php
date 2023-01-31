<?php
include 'layouts/config.php';
    $id=$_GET["id"];
    
    $query_up="UPDATE households set deleted = '1' where hhcode='$id'";
    if ($result_set_up = $link->query($query_up))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Record Deleted Successfully !");'; 
            echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $query_up . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
    
?>