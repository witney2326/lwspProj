<?php
include 'layouts/config.php';

if (isset($_POST['Submit'])) 
    {
        $hh_name=$_POST["hh_name"];
        $phone=$_POST["phone"];
        $blockname=$_POST["blockname"];
        $hh_id=$_POST["hh_id"];
        

        $query_up="UPDATE households set blockname = '$blockname', phone = '$phone', hhname = '$hh_name' where hhcode='$hh_id'";
        if ($result_set_up = $link->query($query_up))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Record Updated successfully !");'; 
                echo 'window.location.href = "target_ben.php";';
                echo '</script>';
            } else {
                echo "Error: " . $query_up . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            
    }
?>