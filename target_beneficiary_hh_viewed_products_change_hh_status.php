<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Status|Update</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        

        if(isset($_POST['Submit']))
        {    
            $hhcode = $_POST['hhcode'];
            $tech_guidance = $_POST['tech_guidance'];
            $hh_ready_selection = $_POST['hh_ready_selection'];

            $query="select hh_checked_products from households where hhcode='$hhcode'";
            
            if ($result_set = $link->query($query)) {
                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                { $prog_status = $row["hh_checked_products"];}
                $result_set->close();
            }
 
            if ($prog_status =='0') 
            {
                $sql = mysqli_query($link,"update households  SET hh_checked_products = '1', ready_for_tech_selection = '$hh_ready_selection', need_tech_guidance_on_selection = '$tech_guidance' where hhcode = '$hhcode'");
                        
                if ($sql) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Household Status Updated successfully !");'; 
                    echo 'window.location.href = "target_ben.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
            }
            else
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Already Updated Status, Please Check HH Status !");'; 
                echo 'window.location.href = "target_ben.php";';
                echo '</script>';
            }
        }
        mysqli_close($link);
            
               
    ?>
    
</div>