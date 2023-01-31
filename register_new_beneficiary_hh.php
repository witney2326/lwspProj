<?php
include_once 'layouts/config.php';
session_start();

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

     $hh_status = $_POST['hh_status'];
     $hh_gender = $_POST['hh_gender'];
     $hh_population = $_POST['hh_population'];
     $latrine_use = $_POST['latrine_use'];
     $hh_nat_id = $_POST['hh_nat_id'];
     
     
     function get_hh_count($link)
     {
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

    $_SESSION['hhid'] = $hhcode;
   

    if(($block == "") or ($hhname =="") or ($plot=="") or ($phone=="") or ($age_category=="") or ($livelihood=="") or ($average_income=="") or
    ($hh_vulnerable =="") or ($hh_poor=="") or ($hh_ownership_status=="") or ($location_zone=="") or ($hh_latrine=="") or ($hh_identification=="") or ($hh_status=="") or ($hh_gender=="") or
    ($hh_population=='0') or ($latrine_use =="") or ($hh_nat_id==""))
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Please fill in the missing values on the form !");'; 
        echo 'history.go(-1);';
        echo '</script>';
    }
    else
    {
        $sql = "INSERT INTO households (hhcode, con, ward, area, blockname, plot, phone, hhname, agecat, livelihood, income, homestatus, zonename, latrine, vulnerable, poor, pstatus,identification, enrolled,current_status,hh_status,hh_gender,hh_population,latrine_use,hh_nat_id)
        VALUES ('$hhcode','$con','$ward','$area','$block','$plot','$phone','$hhname','$age_category','$livelihood','$average_income','$hh_ownership_status','$location_zone','$hh_latrine','$hh_vulnerable','$hh_poor','$pstatus','$hh_identification','$enrolled','$current_status','$hh_status','$hh_gender','$hh_population','$latrine_use','$hh_nat_id')";

        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Beneficiary Record has been added successfully !");'; 
            echo 'window.location.href = "auth-register-hh5-1.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
    }

}

    
?>