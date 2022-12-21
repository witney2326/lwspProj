<?php
include_once 'layouts/config.php';

function get_records_count($link)
{
    $sql_tgs = "SELECT * FROM ttechnical_guide";
    $mysqliStatus = $link->query($sql_tgs);
    $rows_count_value = mysqli_num_rows($mysqliStatus);
    return $rows_count_value;   
 }
  
     $dbcount= sprintf("%08d", get_records_count($link)+1);

if(isset($_POST['Add']))
{    
    $hhcode = $_POST["hhcode"];
    $tg= $_POST["tg"];   
    $supervisor = $_POST["supervisor"];
    $rdate = $_POST["rdate"];

        $sql_hh_update = "UPDATE households set  need_tg = '0',need_tech_guidance_on_selection = '0',ready_for_tech_selection ='1',ready_selection = '1' where hhcode = '$hhcode'";

        $sql = "INSERT INTO ttechnical_guide (rec_id,hhcode,tg,tguider,tdate)
        VALUES ('$dbcount','$hhcode','$tg','$supervisor','$rdate')";

        if ((mysqli_query($link, $sql)) and (mysqli_query($link, $sql_hh_update))) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Technical Guide Recorded Successfully!");'; 
        echo 'window.location.href = "enrolled_ben_tg.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>