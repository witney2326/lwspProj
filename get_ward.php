<?php
    include 'layouts/config.php';
    if(!empty($_POST["conID"])) 
    {
        $id=$_POST["conID"];
        
        $stmt = mysqli_query($link,"SELECT id,wname FROM wards WHERE constituency ='$id'");
        ?><option selected="selected">Select Ward </option><?php
        while($row=mysqli_fetch_array($stmt))
        {
        ?>
        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['wname']); ?></option>
        <?php
        }
    }
?>

