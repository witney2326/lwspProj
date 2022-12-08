<?php
include_once 'layouts/config.php';

if(isset($_POST['Submit']))
{    
$hh_id = $_POST["hh_id"];
$amount= $_POST["amount"];
$pref = $_POST['pref'];
$pdate = $_POST['pdate'];

    
    $sql = "INSERT INTO tpayments (hhCode,amount_paid,pReference,pDate)
    VALUES ('$hh_id','$amount','$pref','$pdate')";

    $sql2 = "UPDATE households set current_status = '05' where hhcode = '$hh_id'";

if ((mysqli_query($link, $sql)) and (mysqli_query($link, $sql2))) {
    echo '<script type="text/javascript">'; 
    echo 'alert("HH Payment Record has been added successfully !");'; 
    echo 'window.location.href = "index_hh.php";';
    echo '</script>';
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);
}

?>