
    <?php
        include "layouts/config.php";    
        
        $Rec_ID = $_GET['id']; 

        $query="select ready_selection from households where hhcode='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $prog_status = $row["ready_selection"];}
            $result_set->close();
        }
 
        if ($prog_status =='0') 
        {
            $sql = mysqli_query($link,"update households  SET ready_selection = '1' where hhcode = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Ready To Make OSS Selection!");'; 
                echo 'window.location.href = "enrolled_ben.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Indicated Readiness For Selection!");'; 
            echo 'window.location.href = "enrolled_ben.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
