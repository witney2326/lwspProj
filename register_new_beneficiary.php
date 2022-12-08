<?php
include_once 'layouts/config.php';
if(isset($_POST['Submit']))
{    
    $con = $_POST['con']; 
    $ward = $_POST['ward'];
     $area = $_POST['area'];
     $block = $_POST['block'];
     $hhname = $_POST['hhname'];
     $plot = $_POST['plot'];
     $phone = $_POST['phone'];
     $age_category = $_POST['age_category'];
     $livelihood = $_POST['livelihood'];
     $average_income = $_POST['average_income'];
     $hh_vulnerable = $_POST['hh_vulnerable'];
     $hh_poor = $_POST['hh_poor'];
     $hh_ownership_status = $_POST['hh_ownership_status'];
     $location_zone = $_POST['location_zone'];
     $hh_latrine = $_POST['hh_latrine'];
     $hh_identification = $_POST['hh_identification'];

     function get_hh_count($link){
        $sql = "SELECT * FROM households";
        $mysqliStatus = $link->query($sql);
        $rows_count_value = mysqli_num_rows($mysqliStatus);
        return $rows_count_value;   
     }
      
         $dbcount= sprintf("%06d", get_hh_count($link)+1);
         $x=date("Y");		
         $x.="/BEN/";				
         $x.=$dbcount;
 
         $hhcode = $x;


         $pstatus = 0;
         $enrolled = 0;
         $current_status = '01';


     $sql = "INSERT INTO households (hhcode, con, ward, area, blockname, plot, phone, hhname, agecat, livelihood, income, homestatus, zonename, latrine, vulnerable, poor, pstatus,identification, enrolled,current_status)
     VALUES ('$hhcode','$con','$ward','$area','$block','$plot','$phone','$hhname','$age_category','$livelihood','$average_income','$hh_ownership_status','$location_zone','$hh_latrine','$hh_vulnerable','$hh_poor','$pstatus','$hh_identification','$enrolled','$current_status')";
     if (mysqli_query($link, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Beneficiary Record has been added successfully !");'; 
        echo 'window.location.href = "register_beneficiary.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
     mysqli_close($link);
}

    
?>