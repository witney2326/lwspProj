<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>User Management</title>
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
        .card-border1 
        {
            border-style: groove;
            border-color: orange;
            border-width: 8px;
        }

        .view {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/view.png');
        background-repeat: no-repeat;
        }
        .ico-view { background-position: 0 0; }

        .check {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/check.png');
        background-repeat: no-repeat;
        }
        .ico-check { background-position: 0 0; }

        .delete {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/delete.png');
        background-repeat: no-repeat;
        }
        .ico-delete { background-position: 0 0; }

        .deactive {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/deactive.png');
        background-repeat: no-repeat;
        }
        .ico-deactive { background-position: 0 0; }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>


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
                            <h4 class="mb-sm-0 font-size-18">User Management</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-border1">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">users</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="sysadmin1_contractors.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">contractors</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_roles.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">roles</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_regions.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Constituency</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_districts.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Ward</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_tas.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Area</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_buscats.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">OSS Products</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="parameter_mgt.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Project Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-border">
                                
                                <div class="card-body">
                                <h7 class="card-title mt-0"></h7>
                                    
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        
                                            <thead style="background-color:plum;">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>uName</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Action</th>                                                              
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?Php
                                                    $query = "SELECT * FROM users where deleted = '0' ORDER by id";

                                                    if ($result_set = $link->query($query)) {
                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                    { 
                                                        if ($row['ustatus'] == '1'){$ustatus ="Active";}else{$ustatus = "Not Activated";}
                                                        echo "<tr>";
                                                        echo "<td>".$row['id']."</td>";
                                                        echo "<td>".$row['username']."</td>";
                                                        echo "<td>".$row['useremail']."</td>";                                                       
                                                        echo "<td>".role_name($link,$row['userrole'])."</td>";
                                                        echo "<td>\t\t$ustatus</td>";
                                                        if ($row['ustatus'] == '1')
                                                        {
                                                            echo "<td>
                                                                <a href=\"user_View.php?id=".$row['id']."\"><button class='btn btn-sm btn-outline-success' title='View User' style='font-size:18px;color:purple'><i class='view ico-view'></i></button></a>
                                                                <button class='btn btn-sm btn-outline-info' title='User Already Activated' style='font-size:18px;color:green'><i class='check ico-check'></i></button></a>
                                                                <a href=\"sysadmin1_mail.php?id=".$row['id']."\"><button class='btn btn-sm btn-outline-primary' title='Deactivate User' style='font-size:18px'><i class='deactive ico-deactive'></i></button></a>
                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This User - You Must Be a Supervisor');\" href=\"app_user_delete.php?id=".$row['id']."\"><button class='btn btn-sm btn-outline-secondary' title='Delete User' style='font-size:18px;color:Red'><i class='delete ico-delete'></i></button></a>
                                                            </td>\n";
                                                        }else
                                                        {
                                                            echo "<td>
                                                                <a href=\"user_View.php?id=".$row['id']."\"><button class='btn btn-sm btn-outline-success' title='View User' style='font-size:18px;color:purple'><i class='view ico-view'></i></button></a>
                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Activate This User');\" href=\"sysadmin_useractivate.php?id=".$row['id']."\"><button class='btn btn-sm btn-outline-info' title='Activate User' style='font-size:18px;color:green'><i class='check ico-check'></i></button></a>
                                                                <button class='btn btn-sm btn-outline-primary' title='User Not active' style='font-size:18px'><i class='deactive ico-deactive'></i></button></a>
                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This User?');\" href=\"del_user.php?id=".$row['id']."\"><button class='btn btn-sm btn-outline-secondary' title='Delete User' style='font-size:18px;color:Red'><i class='delete ico-delete'></i></button></a>
                                                            </td>\n";
                                                        }
                                                        echo "</tr>";
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