<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Status|Approval</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php";    
        
        $Rec_ID = $_GET['id']; 

        $query="select enrolled from households where hhcode='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $prog_status = $row["enrolled"];}
            $result_set->close();
        }
 
        if ($prog_status =='0') 
        {
            $sql = mysqli_query($link,"update households  SET enrolled = '1', current_status= '02' where hhcode = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Enrolled successfully !");'; 
                echo 'window.location.href = "target_ben.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Enrolled !");'; 
            echo 'window.location.href = "target_ben.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>