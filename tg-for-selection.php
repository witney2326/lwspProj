<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household TG|Flagging</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select need_tech_guidance_on_selection from households where hhcode='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $prog_status = $row["need_tech_guidance_on_selection"];}
            $result_set->close();
        }
 
        if ($prog_status =='0') 
        {
            $sql = mysqli_query($link,"update households  SET need_tech_guidance_on_selection = '1' where hhcode = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Flagged successfully For Technical Guide!");'; 
                echo 'window.location.href = "enrolled_ben.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Flagged !");'; 
            echo 'window.location.href = "enrolled_ben.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>