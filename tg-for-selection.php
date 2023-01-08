<?php
    include "layouts/config.php";     
    
    $Rec_ID = $_GET['id']; 

    $query="select need_tg,ready_selection from households where hhcode='$Rec_ID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { 
            $need_tech_guidance_on_selection = $row["need_tg"]; 
            $ready_selection = $row["ready_selection"];
        }
        $result_set->close();
    }

    if (($need_tech_guidance_on_selection =='0') and ($ready_selection == '0')) 
    {
        $sql = mysqli_query($link,"update households  SET need_tg = '1' where hhcode = '$Rec_ID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Flagged successfully For Technical Guide!");'; 
                echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Household Already Flagged OR Indicated Readiness For Selection !");'; 
            echo 'history.go(-1)';
        echo '</script>';
    }
    mysqli_close($link);
            
?>
