<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $paramID = $_POST["paramID"];
    $pname = $_POST["pname"];
    $pvalue = $_POST["param_value"];
    

        $sql = "UPDATE app_parameters set pvalue ='$pvalue' where id = '$paramID'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Parameter Edited Successfully!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>