<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Registration Reports</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <style>
        
    </style>
</head>

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

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php 
        
?>

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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Households With Approved Contribution</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-border">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Households with Approved Contribution</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="OSS_reports_hhs_payments_filter.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Filtered Households with Approved Contribution</span>
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-border">
                            <div class="card-body">

                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>

                                <div class="card-header bg-transparent border-primary">
                                    <p><center><h5 class="my-0 text-primary">Households With Contributions</h5></p></center>
                                </div>

                                    <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                        
                                        <img src="assets/images/logo-dark.png" alt="" height="84" class="center">
                                        
                                        <thead style="background-color:plum;">
                                            <tr>
                                                <th>Household Code</th>
                                                <th>Household Name</th>
                                                <th>City Area</th>
                                                <th>Plot No.</th>
                                                <th>Selected Product</th>
                                                <th>Product Cost</th>
                                                <th>Total Paid</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?Php
                                                $query="select tpayments.hhCode as code, hhname, area, plot, pname, pCost, SUM(amount_paid) as Total_Paid from tpayments inner join households on tpayments.hhCode = households.hhcode
                                                inner join tproducts on households.selected_product = tproducts.pID  
                                                where ((tpayments.pApproved ='1') and (households.selected_product <> '00') and 
                                                (households.enrolled = '1') and (households.product_approved = '1') and (households.agree_tcs = '1')) group by tpayments.hhCode";
                                                                    
                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    
                                                    echo "<tr>\n";
                                                        echo "<td>".$row["code"]."</td>\n";
                                                        echo "<td>".$row["hhname"]."</td>\n";
                                                        echo "<td>".area_name($link,$row["area"])."</td>\n";
                                                        echo "<td>".$row["plot"]."</td>\n";
                                                        echo "<td>".$row["pname"]."</td>\n";
                                                        echo "<td>".number_format($row["pCost"],2)."</td>\n";
                                                        echo "<td>".number_format($row["Total_Paid"],2)."</td>\n";
                                                    echo "</tr>\n";
                                                    }
                                                }
                                                $result_set->close();
                                                 
                                                                    
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Required datatable js -->
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

</body>

</html>