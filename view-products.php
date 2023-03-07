<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS Products</title>
    <?php include 'layouts/head.php'; ?>
    <!-- ION Slider -->
    <link href="assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-style.php'; ?>

    <style> 
        .card-border 
        {
            border-style: solid;
            border-color: orange;
        }
        .card-border1 
        {
            border-style: groove;
            border-color: orange;
            border-width: 8px;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-sm-0 font-size-18">OSS Products</h4>
                        <p align="right">
                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                        </p>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card-border1">
                    
                    <div class="col-lg-12">

                        
                        <div class="row">
                            <div class="col-xl-4 col-sm-6">
                                <div class="card-border1">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            
                                            <img src="assets/images/product/PourFlash1.jpg" alt="" height="200" width="200" alt="Image resize">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h7 class="mb-3 text-truncate"><a href="#" class="text-dark">Pour Flash Toilet </a></h7>
                                            <h7 class="my-0"><span class="text-muted me-2">Product Code:</span> <b>PFT/01</b></h7>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card-border1">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            <img src="assets/images/product/PourFlash2.jpg" alt="" height="200" width="200" alt="Image resize">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h7 class="mb-3 text-truncate"><a href="#" class="text-dark">Pour Flash Toilet </a></h7>
                                            <h7 class="my-0"><span class="text-muted me-2">Product Code:</span> <b>PFT/01</b></h7>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card-border1">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            
                                            <img src="assets/images/product/singleVIP1.jpg" alt="" height="200" width="200" alt="Image resize">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h7 class="mb-3 text-truncate"><a href="#" class="text-dark">Single VIP Toilet</a></h7>

                                            
                                            <h7 class="my-0"><span class="text-muted me-2">Product Code:</span> <b>SVT/01</b></h7>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card-border1">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            <img src="assets/images/product/singleVIP2.jpg" alt="" height="200" width="200" alt="Image resize">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h7 class="mb-3 text-truncate"><a href="#" class="text-dark">Single VIP Toilet</a></h7> 
                                            <h7 class="my-0"><span class="text-muted me-2">Product Code:</span> <b>SVT/01</b></h7>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card-border1">
                                    <div class="card-body">

                                        <div class="product-img position-relative">
                                            
                                            <img src="assets/images/product/TwinVIP1.jpg" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h7 class="mb-3 text-truncate"><a href="#" class="text-dark">Twin VIP Toilet</a></h7>

                                            
                                            <h7 class="my-0"><span class="text-muted me-2">Product Code:</span> <b>TVT/01</b></h7>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card-border1">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            
                                            <img src="assets/images/product/TwinVIP2.jpg" alt="" height="200" width="200" alt="Image resize">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h7 class="mb-3 text-truncate"><a href="#" class="text-dark">Twin VIP Toilet</a></h7>
                                            <h7 class="my-0"><span class="text-muted me-2">Product Code:</span> <b>TVT/01</b></h7>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                    </div>
                </div>
                <!-- end row -->
                
                

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Ion Range Slider-->
<script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/product-filter-range.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>