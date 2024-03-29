<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php'; 

    $result = mysqli_query($link, "SELECT pvalue FROM app_parameters where id = '01'"); 
    $row = mysqli_fetch_assoc($result); 
    $pvalue = $row['pvalue'];
?>
<head>
    <title><?php echo $pvalue;?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'lib.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .bkground{
            background-color: orange !important;
            border: none !important;
            border-width:0!important;
        }
        .card-border 
        {
            border-style: solid;
            border-color: orange;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

<?php
$contractorID = $_SESSION["hhid"];
?>

<!-- Begin page -->
<div id="layout-wrapper">

<?php include 'layouts/menu_con.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">                                     
                

                <!-- start page title -->
                <b><h4>Contractor's Dashboard</h4></b>
                <div class="row">
                    <div class="col-4">
                        <div class="card-group">
                            <div class="card-border">
                                <div class="card-body">
                                    <p class="text-muted fw-medium"><h5>OSS Sites Handed Over</h5></p>
                                    <?php
                                        $result = mysqli_query($link, "SELECT COUNT(pID) as projects FROM tprojects where pcontractorID = '$contractorID'"); 
                                        $row = mysqli_fetch_assoc($result); 
                                        $projects = $row['projects'];
                                    ?>
                                </div>
                            </div>
                            <div class="card-border">
                                <div class="card-body">                                            
                                    <h4 class="mb-0">
                                        <div class="container">
                                            <div class="mb-0"><?php echo "" . $projects;?></div>
                                        </div> 
                                    </h4>
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
