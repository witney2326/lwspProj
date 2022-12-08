
    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select agree_tcs from households where hhcode='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $prog_status = $row["agree_tcs"];}
            $result_set->close();
        }
 
        if ($prog_status =='0') 
        {
            $sql = mysqli_query($link,"update households  SET agree_tcs = '1' where hhcode = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Agrees OSS T&Cs!");'; 
                echo 'window.location.href = "enrolled_ben.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Endorsed T&Cs !");'; 
            echo 'window.location.href = "enrolled_ben.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>