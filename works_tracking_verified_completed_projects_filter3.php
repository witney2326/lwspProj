<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Completed & Verified OSS Works</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>
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
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $constituency = $_POST['constituency'];
        $ward = $_POST['ward'];
        $area = $_POST['area'];
     
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
                            <h4 class="mb-sm-0 font-size-18">Completed & Verified OSS Works</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Completed & Verified OSS Works</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
               
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-border1">
                                <div class="card-body">

                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="works_tracking.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">OSS Works and Progress Updates</span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link" data-bs-toggle="link" href="works_tracking_ongoing_projects.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                                <span class="d-none d-sm-block">On-going OSS Works</span>
                                            </a>
                                        </li>
                                        
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link " data-bs-toggle="link" href="works_tracking_completed_projects.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                <span class="d-none d-sm-block">Completed OSS Works</span>
                                            </a>
                                        </li>

                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                <span class="d-none d-sm-block">Verified Completed OSS Works</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="card-border">
                                <div class="card-body">
                                    <form class="row row-cols-lg-auto g-3 align-items-center" >
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
                                            <select class="form-select" name="area" id="area" required>
                                                <option selected  value="<?php echo $area;?>"><?php echo area_name($link,$area);?></option>
                                            </select>
                                            
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
                                    
                                    <div class="card-body">
                                    <h7 class="card-title mt-0"></h7>
                                        
                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                                <thead>
                                                    <tr>
                                                        <th>OSS Works Code</th>                                           
                                                        <th>HH Code</th>
                                                        <th>Start Date</th>
                                                        <th>Completion Date</th>
                                                        <th>Contractor</th>
                                                        <th>Action</th>  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?Php
                                                        $query="select tprojects.pID,tprojects.phhcode,tprojects.pstartdate,tprojects.pfinishdate,tprojects.pcontractorID,tprojects.pstatus from tprojects inner join households on tprojects.phhcode = households.hhcode where ((households.con = '$constituency') and (households.ward = '$ward') and (households.area = '$area') and (tprojects.pstatus = '06') and (tprojects.pCompletenessVerified = '1'))";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            
                                                        echo "<tr>\n";
                                                            echo "<td>".$row["pID"]."</td>\n";
                                                            echo "<td>".$row["phhcode"]."</td>\n";
                                                            echo "<td>".$row["pstartdate"]."</td>\n";
                                                            echo "<td>".$row["pfinishdate"]."</td>\n";
                                                            echo "<td>".contractor_name($link,$row["pcontractorID"])."</td>\n";
                                                            
                                                            echo "<td>                                               
                                                            <a href=\"hh_View.php?id=".$row['phhcode']."\"><i class='far fa-eye' title='View HH' style='font-size:18px;color:purple'></i></a> 
                                                            <a href=\"hh_project_progressTrack.php?id=".$row['pID']."\"><i class='fa fa-print' title='Print Completion Certificate' style='font-size:18px;color:black'></i></a> 
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