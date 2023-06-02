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

    <?php include 'layouts/vertical-menu_hh.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">OSS Products</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card-border1">
                    
                <div class="row">
                    
                    <div class="col-lg-12">
                        <?php
                            //get current directory
                            $working_dir = getcwd();
                            
                            //get image directory
                            $img_dir = $working_dir . "/uploads_products/";
                            
                            //change current directory to image directory
                            chdir($img_dir);
                            
                            //using glob() function get images 
                            $files = glob("*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE );
                            
                            //again change the directory to working directory
                            chdir($working_dir);

                            //iterate over image files
                            foreach ($files as $file) {
                            ?>
                            
                                <img src="<?php echo "uploads_products/" . $file ?>" style="height: 400px; width: 440px; border-style: groove;border-color: gray;border-width: 8px;"/>
                            
                            <?php }
                        ?>
                        
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