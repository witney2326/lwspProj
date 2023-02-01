<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>LWSP|Contribute For Service</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
  <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
  <style> 
        .card-border 
        {
            border-style: solid;
            border-color: orange;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $constituency = $_POST['constituency'];
        $ward = $_POST['ward'];
        //$area = $_POST['area'];
     
    }
    
    
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
                            <h4 class="mb-sm-0 font-size-18">Contribute For Service: Payment Approvals</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Contribute For Service</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
               
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                            <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="contribute_for_service_payments.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Payments</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Payment Approvals</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="contribute_for_service_app_pymnts.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Approved Payments</span>
                                        </a>
                                    </li>
                                                                        
                                    <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="link" href="contribute_for_service_approved_payments.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Approved Full Payments & Works Schedule</span>
                                        </a>
                                    </li>
                                    

                                </ul>


                                <div class="tab-pane active" id="home-1" role="tabpanel">
                                    <p class="mb-0">
                                        <!--start here -->
                                        <div class="card-border">
                                            <div class="card-body">
                                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="contribute_for_service_filter3.php" method ="POST" >
                                                    <div class="col-12">
                                                        <label for="constituency" class="form-label">Constituency</label>
                                                        
                                                        <select class="form-select" name="constituency" id="constituency"  required>
                                                            <option selected value="<?php echo $constituency;?>"><?php echo con_name($link,$constituency);?></option>  
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <label for="ward" class="form-label">Ward</label>
                                                        <select class="form-select" name="ward" id="ward"  required >
                                                            <option selected value="<?php echo $ward; ?>" ><?php echo ward_name($link,$ward); ?></option>
                                                                
                                                        </select>
                                                        
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="area" class="form-label">City Area</label>
                                                        <select class="form-select" name="area" id="area" required >
                                                            <option ></option>
                                                            <?php                                                           
                                                                    $ta_fetch_query = "SELECT areacode,aname FROM areas";                                                  
                                                                    $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                    $i=0;
                                                                        while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                    ?>
                                                                    <option value="<?php echo $DB_ROW_ta["areacode"]; ?>">
                                                                        <?php echo $DB_ROW_ta["aname"]; ?></option><?php
                                                                        $i++;
                                                                            }
                                                                ?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a valid Area
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                                                    </div>
                                                </form>                                            
                                                <!-- End Here -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-border">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-default">Households With OSS Contributions/Payments (Not Yet Approved)</h5>
                                                </div>
                                                <div class="card-body">
                                                <h7 class="card-title mt-0"></h7>
                                                    
                                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                        
                                                            <thead>
                                                                <tr>
                                                                    <th>Rec ID</th> 
                                                                    <th>HH Code</th>                                           
                                                                    <th>HH Name</th>
                                                                    <th>Pmt Option</th>
                                                                    <th>Pmt Ref</th>
                                                                    <th>Amount Paid</th>
                                                                    <th>Approved?</th>
                                                                    <th>Action</th>  
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?Php
                                                                    $query="select * from tpayments inner join households on tpayments.hhCode = households.hhcode where ((ward = '$ward') and (households.selected_product <> '00') and (households.enrolled = '1') and (households.product_approved = '1') and (households.agree_tcs = '1') and (households.pOption <> '00') and (tpayments.pApproved = '0'))";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                        if ($row["pApproved"] == 1){$pApproved = 'Yes';}else{$pApproved = 'No';}
                                                                        if ($row["pOption"] == '00'){$pOption = 'None';}else{$pOption = payment_option_name($link,$row["pOption"]);}
                                                                        if ($row["enrolled"]== 1){$enrolled = 'Yes';}else {$enrolled = 'No';}
                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                        echo "<td>".$row["hhcode"]."</td>\n";
                                                                        echo "<td>".$row["hhname"]."</td>\n";
                                                                        echo "<td>\t\t$pOption</td>\n";
                                                                        echo "<td>".$row["pReference"]."</td>\n";
                                                                        echo "<td>".$row["amount_paid"]."</td>\n";
                                                                        echo "<td>\t\t$pApproved</td>\n";
                                                                        echo "<td>                                               
                                                                            <a href=\"hh_view.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='View Household' style='font-size:18px;color:purple'></i></a> 
                                                                            <a onClick=\"javascript: return confirm('Are You Sure You want To Approve This HOUSEHOLD Payment?');\" href=\"hh_payment_approval.php?id=".$row['pID']."\"><i class='far fa-check-square' title='Approve Payment Amount' style='font-size:18px;color:green'></i></a> 
                                                                        </td>\n";

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
                                    </p>
                                </div>
                                    <!-- Here -->
                                    
                                

                            </div>
                        </div>
                    </div>
                </div>


                

                    

               


                <!-- Collapse -->
                

                
                <!-- end row -->

                
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