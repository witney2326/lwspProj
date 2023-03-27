<?php
include_once 'layouts/config.php';

if(isset($_POST['Submit']))
{    
$hh_code = $_POST["hhcode"];
$lat_input= $_POST["lat_input"];
$long_input = $_POST['long_input'];

$sql = "UPDATE households set lat = '$lat_input', longi = '$long_input' where hhcode = '$hh_code'";

if (mysqli_query($link, $sql)) {
    echo '<script type="text/javascript">'; 
    echo 'alert("HH OSS Works Site has Been updated successfully with GeoPoints !");'; 
    echo 'history.go(-2)';
    echo '</script>';
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);
}

?>