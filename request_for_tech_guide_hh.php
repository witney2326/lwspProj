

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $hhID = $_POST['hhcode'];
        $need_tech_guide = $_POST['need_tech_guide'];

        
        $query="select need_tg from households where hhcode='$hhID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $need_tg= $row["need_tg"];}
            $result_set->close();
        }
 
        if (($need_tg =='0') and ($need_tech_guide == '0'))
        {
            $sql = mysqli_query($link,"update households  SET  need_tg = '$need_tech_guide', ready_for_tech_selection = '1', ready_selection = '1' where hhcode = '$hhID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Successfully Flagged For Technical Guidance!");'; 
                echo 'history.go(-1)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        } else if (($need_tg =='0') and ($need_tech_guide == '1'))
        {
            $sql = mysqli_query($link,"update households  SET  need_tg = '$need_tech_guide' where hhcode = '$hhID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Successfully Flagged For Technical Guidance!");'; 
                echo 'history.go(-1)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else

        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Flagged For Technical Guidance!");'; 
            echo 'history.go(-1)';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    