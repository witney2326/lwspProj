<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>LWSP - Lilongwe Water and Sanitation Project</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

<?php
$hhCode = $_SESSION["hhid"];
?>

<!-- Begin page -->
<div id="layout-wrapper">

<?php include 'layouts/menu_hh.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">                                     
                </div>

                <!-- start page title -->
                <div class="row">
                        <div class="col-9">
                    
                            <div class="card">
                                <div class="card-header bg-transparent border-primary">
                                    <div class="card-group">
                                        <div class="card border">
                                            <img src="..." class="card-img-top" alt="">
                                            <div class="card-body">
                                                
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <button class="btn btn-btn btn-outline-secondary w-md" onclick="window.location.href='view-products_hh.php';">
                                                                View OSS Products
                                                            </button>
                                                            <button class="btn btn-btn btn-outline-secondary w-md" onclick="window.location.href='tcs_tech_guide_hh.php';">
                                                                Tech Guide
                                                            </button>
                                                            <button class="btn btn-btn btn-outline-secondary w-md" onclick="window.location.href='request_for_service_hh.php';">
                                                                Select OSS Products
                                                            </button>
                                                            
                                                            <button class="btn btn-btn btn-outline-secondary w-md" onclick="window.location.href='tcs_opt_payment_hh.php';">
                                                                Payment Opt
                                                            </button>
                                                            <button class="btn btn-btn btn-outline-secondary w-md" onclick="window.location.href='hh_payments_hh.php';">
                                                                Payment 
                                                            </button>
                                                            <button class="btn btn-btn btn-outline-secondary w-md" onclick="window.location.href='comments_hh.php';">
                                                                Comments
                                                            </button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            <!-- -->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end page title -->
                    <div class="row">
                        <div class="col-9">
                    
                            <div class="card">
                                <div class="card-header bg-transparent border-primary">
                                    <div class="card-group">
                                        <div class="card border">
                                            <img src="..." class="card-img-top" alt="">
                                            <div class="card-body">
                                                
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            
                                                            <p class="text-muted fw-medium"><h4>Household Current Status</h4></p>
                                                            <?php
                                                                $result = mysqli_query($link, "SELECT current_status  FROM households where hhcode = '$hhCode'"); 
                                                                $row = mysqli_fetch_assoc($result); 
                                                                $current_status = $row['current_status'];
                                                            ?>
                                                                
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            <!-- -->
                                            </div>
                                        </div>
                                        <div class="card border">
                                            <img src="..." class="card-img-top" alt="">
                                            <div class="card-body bg-info text-white">
                                                <div class="card-body bg-info text-white">                                                  
                                                    <h4 class="mb-0">
                                                        <div class="container">
                                                            <div class="mb-0"><?php echo "" . hh_status($link,$current_status);?></div>
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
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

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
