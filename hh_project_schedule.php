<?php
include_once 'layouts/config.php';
include 'lib.php';

function get_project_count($link)
{
    $sql_projects = "SELECT * FROM tprojects";
    $mysqliStatus = $link->query($sql_projects);
    $rows_count_value = mysqli_num_rows($mysqliStatus);
    return $rows_count_value;   
 }
  
     $dbcount= sprintf("%06d", get_project_count($link)+1);
     $x=date("Y");		
     $x.="/LWS/";				
     $x.=$dbcount;
     $pID = $x;

  
    $hh_id = $_POST["hh_id"];
    $contractor= $_POST["contractor"];   
    $startdate = $_POST["startdate"];
    $finishdate = $_POST["finishdate"];
    
    if (hh_id_found($link,$hh_id) === false)
    {
        $sql2 = mysqli_query($link,"update households  SET contractor_identified = '1', contractor_allocated ='1', contractor ='$contractor', current_status = '07' where hhcode = '$hh_id'");

        $sql = "INSERT INTO tprojects (pID,phhcode,pcontractorID,pCost,pstartdate,pfinishdate,pcompletiondate,pstatus,pCompletenessVerified,pCertificateProduced,pHandedOverHH,pHandedOverContractor,pdeleted)
        VALUES ('$pID','$hh_id','$contractor','0','$startdate','$finishdate','NULL','00','0','0','0','0','0')";

        if (mysqli_query($link,$sql) and ($sql2)) 
            {
            
            echo '<script type="text/javascript">'; 
            echo 'alert("OSS Works Successfully Scheduled !");'; 
            //echo 'window.location.href = history.go(-1);';
            echo 'window.location.href = "contribute_for_service_approved_payments.php";';
            echo '</script>';
            } 
        else 
            {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
    }else
    {
        echo '<script type="text/javascript">'; 
            echo 'alert("Household OSS Works Already Scheduled !");'; 
            
            echo 'window.location.href = "contribute_for_service_approved_payments.php";';
            echo '</script>';
    }
    
    mysqli_close($link);

?>