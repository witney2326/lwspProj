<?php
    include "layouts/config.php";     
    
    $hhID = $_GET['id']; 

    $query="select product_approved, selected_product from households where hhcode='$hhID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $product_approved= $row["product_approved"];$selected_product= $row["selected_product"];}
        $result_set->close();
    }

    if (($product_approved =='0') and ($selected_product <> '00'))
    {
        $sql = mysqli_query($link,"update households  SET product_approved = '1', current_status = '04' where hhcode = '$hhID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Technology Selection Approved successfully !");'; 
            echo 'window.location.href = "tech_selection.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Either Household Already Has An Approved Technology OR Technology not yet selected!");'; 
        echo 'window.location.href = "tech_selection.php";';
        echo '</script>';
    }
    mysqli_close($link);
        
            
?>