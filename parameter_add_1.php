<?php
include_once 'layouts/config.php';


if(isset($_POST['Add']))
{    
    $paramID = $_POST["paramID"];
    $pvalue= $_POST["pvalue"];   
    
        $sql = "UPDATE app_parameters set pvalue = '$pvalue' where id = $paramID";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Parameter Added Successfully!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>