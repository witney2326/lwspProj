<?php
include('layouts/config.php');
if(!empty($_POST["wardid"])) 
{
 $id=$_POST['wardid'];
 

 $stmt = mysqli_query($link,"SELECT areacode,aname FROM areas WHERE wardid ='$id'");
 ?><option selected="selected">Select Area </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['areacode']); ?>"><?php echo htmlentities($row['aname']); ?></option>
  <?php
 }


}
?>