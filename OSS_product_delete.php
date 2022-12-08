<?php
include_once 'layouts/config.php';
    
    $productID = $_GET["id"];
    
        $sql = "DELETE from tproducts where pID = '$productID'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Product Deleted Successfully!");'; 
        echo 'window.location.href = "sysadmin1_buscats.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>