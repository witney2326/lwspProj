<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>LWSP |Households Registration Reports</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

    <style>
    .nav-link active {
        background-color: orange !important;
        border: none !important;
        border-width:0!important;
    }
    .card-border {
            border-style: solid;
            border-color: orange;
        }
</style>
</head>
<?php include 'layouts/body.php'; ?>
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here 
        include "lib.php";
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php include 'layouts/body.php'; ?>
    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Household Registration</h4>

                            <div class="page-title-right">
                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                
                <div class="card-border">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="OSS_reports_registration.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Overall Registered Households</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="link" href="OSS_reports_registration_filter.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Filtered Registered Households</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="OSS_reports_registration_sumarised.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Summarised Registered Households</span>
                                        </a>
                                    </li>
                        </ul>
                    </div>
                </div>

                <div class="card-border">
                    
                    <div class="card-body">
                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="OSS_reports_registration_con.php" method ="GET" >
                            <div class="col-12">
                                <label for="constituency" class="form-label">Constituency</label>
                                
                                    <select class="form-select" name="constituency" id="constituency"  required>
                                        <?php                                                           
                                                $dis_fetch_query = "SELECT id, cname FROM constituency";                                                  
                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                $i=0;
                                                    while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                ?>
                                                <option value ="<?php
                                                        echo $DB_ROW_reg["id"];?>">
                                                    <?php
                                                        echo $DB_ROW_reg["cname"];
                                                    ?>
                                                </option>
                                                <?php
                                                    $i++;
                                                        }
                                            ?>
                                    </select>
                                    
                            </div>
                            <div class="col-12">
                                <label for="ward" class="form-label">Ward</label>
                                <select class="form-select" name="ward" id="ward" disabled>
                                    <option>Select Ward</option>
                                </select>
                                
                            </div>

                            <div class="col-12">
                                <label for="area" class="form-label">City Area</label>
                                <select class="form-select" name="area" id="area" disabled>
                                    <option>Select Area</option>
                                </select>
                               
                            </div>

                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                            </div>
                        </form>                                             
                        <!-- End Here -->
                    </div>
                </div>

            </div>
        </div>
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>
    </div>
</div>