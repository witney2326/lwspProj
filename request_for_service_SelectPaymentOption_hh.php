

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $hhID = $_POST['hhcode'];
        $payment_option = $_POST['payment_option'];
        $tcs_agreement = $_POST['tcs_agreement'];

        
        $query="select pOption from households where hhcode='$hhID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $pOption= $row["pOption"];}
            $result_set->close();
        }
 
        if (($pOption =='00'))
        {
            $sql = mysqli_query($link,"update households  SET  pOption = '$payment_option' where hhcode = '$hhID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Successfully Updated With Payment Option!");'; 
                echo 'window.location.href = "index_hh.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }else

        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Has a Payment Option!");'; 
            echo 'window.location.href = "index_hh.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    