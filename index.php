<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>LWSP - Lilongwe Water and Sanitation Project</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://kit.fontawesome.com/a6e2755b4d.js"crossorigin="anonymous"> </script>
    
    <style>
        .center 
        { text-align: center;
        width: 100%;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->


<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; 
          include 'lib.php';
    ?>


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
        <?php echo '<body style="background-color:orange;">' ;?>
            <div class="container-fluid">                                     
                </div>

                <!-- start page title -->
                
                <!-- end page title -->
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-transparent border-primary">
                                <div class="card-group">
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <i class='fa fa-user-plus center' style='font-size:24px;color:orange'></i>
                                                        <p class="text-muted fw-medium center">Registered HouseHolds</p>
                                                        <?php
                                                            $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where deleted = '0'"); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum = $row['value_sum'];
                                                        ?>
                                                            <h5 class="mb-0">
                                                                <div class="container">
                                                                    <div class="mb-0 center"><?php echo "" . number_format($sum);?></div>
                                                                </div> 
                                                            </h5>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        <!-- -->
                                        </div>
                                    </div>
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                    <i class='fas fa-check-circle center' style='font-size:24px;color:orange;'></i>
                                                        <p class="text-muted fw-medium center">Verified and Accepted Households</p>
                                                        <?php
                                                           $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where enrolled = '1'"); 
                                                           $row = mysqli_fetch_assoc($result); 
                                                           $sum = $row['value_sum']; 
                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle center"><?php echo "" . number_format($sum);?></div>
                                                            </div> 
                                                        </h6>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <i class='bx bx-dollar center' style='font-size:24px;color:green'></i>
                                                        <p class="text-muted fw-medium center">Households with Full Payments</p>
                                                        
                                                        <?php
                                                            $hhCount = 0;
                                                            $query="select DISTINCT(tpayments.hhCode) from tpayments inner join households on tpayments.hhCode = households.hhcode  where ((tpayments.pApproved ='1') and (households.selected_product <> '00') and (households.enrolled = '1') and (households.product_approved = '1') and (households.agree_tcs = '1'))";
                                                            
                                                            if ($result_set = $link->query($query)) 
                                                            {
                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                { 
                                                                    $hhcode = $row["hhCode"];
                                                                                                                                                                                                            
                                                                    $result2 = mysqli_query($link, "SELECT SUM(amount_paid) AS total_paid FROM tpayments where ((hhCode ='$hhcode') and (pApproved ='1'))"); 
                                                                    $row2 = mysqli_fetch_assoc($result2); 
                                                                    $total_paid = number_format($row2['total_paid'],2);

                                                                    $pcost = product_cost($link,hh_selected_product($link,$hhcode));

                                                                    if ($total_paid >= $pcost)
                                                                    {
                                                                        $hhCount = $hhCount+1;
                                                                    }

                                                                }
                                                            }
                                                        ?>
                                                            <h6 class="mb-0">
                                                                <div class="container">
                                                                    <div class="numberCircle center"><?php echo number_format($hhCount);?></div>
                                                                </div> 
                                                            </h6>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                    <i class='fa fa-compass center' style='font-size:24px;color:green'></i>
                                                        <p class="text-muted fw-medium center">Households Requesting Technical Guidance on Selection</p>
                                                        <?php
                                                            $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where (((need_tech_guidance_on_selection = '1') or (need_tg = '1')) and (deleted = '0'))"); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum = $row['value_sum']; 
                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle center"><?php echo  number_format($sum);?></div>
                                                            </div> 
                                                        </h6>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- end here row1 -->
                    <!-- Row 2 -->
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-transparent border-primary">
                                <div class="card-group">
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                    <i class='fas fa-toilet center' style='font-size:30px;color:orange'></i>
                                                    
                                                        <p class="text-muted fw-medium center">Total OSS Sites Handed Over to Contractors</p>
                                                        <?php
                                                            $result = mysqli_query($link, "SELECT COUNT(pID) AS value_total FROM tprojects"); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $value_total = $row['value_total']; 
                                                        ?>
                                                        <div class="container">
                                                            <div class="numberCircle center"><?php echo "" . number_format($value_total);?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
       
                                    </div>
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                    <i class='fas fa-tasks center' style='font-size:24px;color:green'></i>
                                                        <p class="text-muted fw-medium center">OSS Works on Schedule</p>
                                                        <?php
                                                            $result = mysqli_query($link, "SELECT COUNT(pID) AS t_projs_l FROM tprojects where ((CURDATE() < pfinishdate) and (pstatus <> '05'))"); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $t_projs_l = $row['t_projs_l']; 
                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle center"><?php echo "" . number_format($t_projs_l);?></div>
                                                            </div> 
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <i class='fas fa-tasks center' style='font-size:24px; color:red'></i>
                                                        
                                                        <p class="text-muted fw-medium center">OSS Works OUT of Schedule</p>
                                                        <?php
                                                            $result = mysqli_query($link, "SELECT COUNT(pID) AS t_projs FROM tprojects where ((CURDATE() > pfinishdate) and (pstatus <> '05'))"); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $t_projs = $row['t_projs']; 
                                                        ?>
                                                            <h6 class="mb-0">
                                                                <div class="container">
                                                                    <div class="numberCircle center"><?php echo "" . number_format($t_projs);?></div>
                                                                </div> 
                                                            </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1"> 
                                                        <i class='fas fa-hourglass-end center' style='font-size:24px;color:orange'></i>
                                                        <p class="text-muted fw-medium center">OSS Products Handed over to Households</p>
                                                        <?php
                                                            $result = mysqli_query($link, "SELECT COUNT(pID) AS total_projs FROM tprojects where ((pstatus = '06') and (pdeleted = '0'))"); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $total_projs = $row['total_projs']; 
                                                        ?>
                                                            <div class="container">
                                                                <div class="numberCircle center"><?php echo "" . number_format($total_projs);?></div>
                                                            </div>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
            </div>
            <!-- container-fluid -->
        </div>

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>
