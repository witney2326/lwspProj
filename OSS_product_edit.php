<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $productID = $_POST["productID"];
    $pdname = $_POST["pdname"];
    $description= $_POST["description"];   
    $cost = $_POST["cost"];

        $sql = "UPDATE tproducts set pname ='$pdname',pCost= '$cost',pdescription ='$description' where pID = '$productID'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Product Edited Successfully!");'; 
        echo 'window.location.href = "sysadmin1_buscats.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>