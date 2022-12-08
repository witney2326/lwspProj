<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>LWSP |Add New Beneficiary Household</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

   <!-- DataTables -->
   <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: auto;
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

        $constituency = $_GET["constituency"];
        
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
                            <h4 class="mb-sm-0 font-size-18">Targetting and Registration: Register Household</h4>

                            <div class="page-title-right">
                                
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
                                        <a class="nav-link" data-bs-toggle="tab" href="#iga" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Summarised Registered Households</span>
                                        </a>
                                    </li>
                        </ul>
                    </div>
                </div>

                
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card-border">
                                <div class="card-header bg-transparent border-primary">
                                    <p><center><h5 class="my-0 text-primary">Registered Households</h5></p></center>
                                </div>

                            

                                <div class="card-body">
                                
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                        
                                        <img src="assets/images/logo-dark.png" alt="" height="64" class="center">
                                        
                                        <thead>
                                            <tr>
                                                <th>HH Code</th>
                                                <th>HH Name</th>
                                                <th>Ward</th>
                                                <th>Area</th>
                                                <th>Block Name</th>
                                                <th>Phone</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?Php
                                                $query="SELECT hhcode,hhname,ward, area,blockname,plot,phone
                                                FROM households where con = '$constituency' group by con,ward,area";
                                                
                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    
                                                echo "<tr>\n";
                                                    
                                                    echo "<td>".$row["hhcode"]."</td>\n";
                                                    echo "<td>".$row["hhname"]."</td>\n";
                                                    echo "<td>".$row["ward"]."</td>\n";
                                                    echo "<td>".$row["area"]."</td>\n";
                                                    echo "<td>".$row["blockname"]."</td>\n";
                                                    echo "<td>".$row["phone"]."</td>\n";
                                                    
                                                    
                                                echo "</tr>\n";
                                                }
                                                $result_set->close();
                                                }  
                                                                    
                                            ?>
                                        </tbody>
                                    </table>
                                    </p>
                                </div>
                            </div>     
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