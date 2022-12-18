    <?php
        include "layouts/config.php";    
        
        $Rec_ID = $_GET['id']; 

        $query="select pApproved,hhCode from tpayments where pID ='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $pApproved = $row["pApproved"];
              $hhCode = $row["hhCode"];
            }
            $result_set->close();
        }
 
        if ($pApproved =='0') 
        {
            $sql = mysqli_query($link,"update tpayments  SET pApproved = '1' where pID = '$Rec_ID'");
            $sql2 = mysqli_query($link,"update households  SET current_status = '06' where hhcode = '$hhCode'");
                    
            if (($sql) and ($sql2)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Payment Approved successfully !");'; 
                echo 'window.location.href = "contribute_for_service.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Payment Already Approved !");'; 
            echo 'window.location.href = "contribute_for_service.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    