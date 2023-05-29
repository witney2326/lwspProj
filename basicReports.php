<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS | Reports</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <style>
        .card-border {
            border-style: solid;
            border-color: orange;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php 
        if (($_SESSION["userrole"] == '01') or ($_SESSION["userrole"] == '02') or ($_SESSION["userrole"] == '03'))
        {
            include 'layouts/menu.php'; 
        }else if ($_SESSION["userrole"] == '04')
        {
            include 'layouts/menu_con.php';
        }else if ($_SESSION["userrole"] == '05')
        {
            include 'layouts/menu_hh.php';
        }
        
        include 'layouts/config.php';
    
        $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_registered FROM households where deleted = '0'"); 
        $row = mysqli_fetch_assoc($result); 
        $hh_registered = $row['value_registered'];

        $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_verified FROM households where enrolled = '1'"); 
        $row = mysqli_fetch_assoc($result); 
        $hh_verified = $row['value_verified'];

        $result = mysqli_query($link, "SELECT SUM(amount_paid) AS approved_amount FROM tpayments where pApproved = '1'"); 
        $row = mysqli_fetch_assoc($result); 
        $hh_approved_amount = $row['approved_amount'];

        $result = mysqli_query($link, "SELECT COUNT(DISTINCT(selected_product)) AS approved_products FROM households where product_approved = '1'"); 
        $row = mysqli_fetch_assoc($result); 
        $approved_products = $row['approved_products'];

        $result = mysqli_query($link, "SELECT COUNT(pID) AS approved_projects FROM tprojects"); 
        $row = mysqli_fetch_assoc($result); 
        $approved_projects = $row['approved_projects'];

        $result = mysqli_query($link, "SELECT COUNT(pID) AS completed_projects FROM tprojects where pstatus = '06'"); 
        $row = mysqli_fetch_assoc($result); 
        $completed_projects = $row['completed_projects'];

        $result = mysqli_query($link, 'SELECT SUM(amount_paid) AS payments FROM tpayments'); 
        $row = mysqli_fetch_assoc($result); 
        $hh_savings = $row['payments'];

        


    ?>
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
                            <h4 class="mb-sm-0 font-size-18">Basic OSS Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Basic OSS Reports</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-9">
                        <div class="card-border">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Report Category</th>
                                                <th>Report Detail </th>

                                                <th>Report Main Statistic</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Households Registered</td>
                                                <td><a href="OSS_reports_registration.php"><button class='btn btn-sm btn-outline-info' style='font-size:12px' aria-hidden="true">View Report</button></a></td>

                                                <td><?php echo $hh_registered;?> Household(s)</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Households Verified/Accepted</td>
                                                <td><a href="OSS_reports_registration_verified_hhs.php"><button class='btn btn-sm btn-outline-info' style='font-size:12px' aria-hidden="true">View Report</button></a></td>

                                                <td><?php echo $hh_verified;?> Households</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Products Selected</td>
                                                <td><a href="OSS_reports_hhs_selected_products.php"><button class='btn btn-sm btn-outline-info' style='font-size:12px' aria-hidden="true">View Report</button></i></a></td>
                                                <td><?php echo $approved_products;?> OSS Products</td>
                                            </tr>
                                           
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Approved Household Contributions/Payments</td>
                                                <td><a href="OSS_reports_hhs_payments.php"><button class='btn btn-sm btn-outline-info' style='font-size:12px' aria-hidden="true">View Report</button></a></td>

                                                <td><?php echo "MK"; echo number_format($hh_approved_amount,2);?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Household OSS Works</td>
                                                <td><a href="OSS_reports_hhs_oss_works.php"><button class='btn btn-sm btn-outline-info' style='font-size:12px' aria-hidden="true">View Report</button></a></td>

                                                <td><?php echo $approved_projects;?> OSS Works</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Completed and Verified OSS Works </td>
                                                <td><a href="OSS_reports_completed_oss_works.php"><button class='btn btn-sm btn-outline-info' style='font-size:12px' aria-hidden="true">View Report</button></a></td>

                                                <td><?php echo $completed_projects;?> OSS Works</td>
                                            </tr>
                                              
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    
                </div>
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

<script src="assets/js/app.js"></script>

</body>

</html>