<?php
    include "layouts/config.php";     
    
    $hhID = $_GET['id']; 

    $query="select agree_tcs, selected_product from households where hhcode='$hhID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $agree_tcs= $row["agree_tcs"];$selected_product= $row["selected_product"];}
        $result_set->close();
    }

    if (($agree_tcs =='0') and ($selected_product <> '00') )
    {
        $sql = mysqli_query($link,"update households  SET agree_tcs = '1' where hhcode = '$hhID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Agreement To Terms and Conditions of OSS Updated successfully !");'; 
            echo 'window.location.href = "tcs_opt_payment.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Household Already Agreed To OSS Terms and Conditions OR No OSS Product Selected!");'; 
        echo 'window.location.href = "tcs_opt_payment.php";';
        echo '</script>';
    }
    mysqli_close($link);
        
            
?>