<?php
include_once 'layouts/config.php';
    
    $id = $_GET["id"];
    
        $sql = "UPDATE app_parameters SET pvalue = '' where id = '$id'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Parameter  Deleted Successfully!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>