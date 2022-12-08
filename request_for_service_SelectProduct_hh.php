
    <?php
        include "layouts/config.php";     
        
        $hhID = $_POST['hhcode'];
        $product = $_POST['product'];

                
        $result = mysqli_query($link, "SELECT selected_product  FROM households where hhcode='$hhID'"); 
        $row = mysqli_fetch_assoc($result); 
        $selected_product = $row["selected_product"];
               
 
        if (($selected_product =='00'))
        {
            $sql = mysqli_query($link,"update households  SET  selected_product = '$product', current_status = '03' where hhcode = '$hhID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household successfully Updated With OSS Product!");'; 
                echo 'window.location.href = "index_hh.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }else

        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household AlreadyHas an OSS Product!");'; 
            echo 'window.location.href = "index_hh.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    