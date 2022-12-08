<?php
include_once 'layouts/config.php';

function get_product_count($link)
{
    $sql_projects = "SELECT * FROM tproducts";
    $mysqliStatus = $link->query($sql_projects);
    $rows_count_value = mysqli_num_rows($mysqliStatus);
    return $rows_count_value;   
 }
  
     $dbcount= sprintf("%02d", get_product_count($link)+1);

if(isset($_POST['Add']))
{    
    $pdname = $_POST["pdname"];
    $description= $_POST["description"];   
    $cost = $_POST["cost"];

        $sql = "INSERT INTO tproducts (pID,pname,pCost,pdescription)
        VALUES ('$dbcount','$pdname','$cost','$description')";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("New Product Added Successfully!");'; 
        echo 'window.location.href = "sysadmin1_buscats.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>