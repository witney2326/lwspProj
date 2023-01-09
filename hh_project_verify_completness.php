<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS HH Project| Track Progress</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>
<?php
       include "layouts/config.php"; // Using database connection file here
        
       $id = $_GET['id']; // get id through query string
      $query="select * from tprojects where pID='$id'";
       
       if ($result_set = $link->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
           { 
               
               $phhcode= $row["phhcode"];
               $pcontractorID = $row["pcontractorID"];
               $pCost= $row["pCost"];
              
               $pstartdate = $row["pstartdate"];
               $pfinishdate = $row["pfinishdate"];
               $pstatus = $row["pstatus"];

           }
           $result_set->close();
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
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">OSS HH Works Completness Verification</h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form action ="hh_project_progressVerifyCompleteness_Update.php" method="POST"> 
                                        <div class="row mb-1">
                                            <label for="proj_id" class="col-sm-2 col-form-label">Project ID</label>
                                            <input type="text" class="form-control" id="proj_id" name = "proj_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>

                                            <label for="hhcode" class="col-sm-2 col-form-label">Household</label>
                                            <input type="text" class="form-control" id="hhcode" name="hhcode" value ="<?php echo $phhcode; ?>" style="max-width:30%;"readonly>
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="contractor" class="col-sm-2 col-form-label">Contractor</label>
                                            <input type="text" class="form-control" id="contractor" name="contractor" value ="<?php echo $pcontractorID; ?>" style="max-width:30%;"readonly>

                                            <label for="pcost" class="col-sm-2 col-form-label">Proj Cost</label>
                                            <input type="text" class="form-control" id="pcost" name ="pcost" value = "<?php echo $pCost; ?>" style="max-width:30%;"readonly>
                                        </div>

                                                                                                                        
                                        <div class="row mb-1">
                                            <label for="pstartdate" class="col-sm-2 col-form-label">Actual Start Date</label>
                                            <input type="text" class="form-control" id="pstartdate" name="pstartdate" value ="<?php echo $pstartdate; ?>" style="max-width:30%;"readonly>

                                            <label for="pfinishdate" class="col-sm-2 col-form-label">Actual Status Date</label>
                                            <input type="text" class="form-control" id="pfinishdate" name="pfinishdate" value =" <?php echo $pfinishdate; ?>" style="max-width:30%;"readonly>
                                        </div>
                                        
                                                                               
                                        <div class="row mb-1">
                                            <label for="pstatus" class="col-sm-2 col-form-label">Status</label>
                                            <input type="text" class="form-control" id="pstatus" name="pstatus" value =" <?php echo pstatus($link,$pstatus); ?>" style="max-width:30%;"readonly>

                                            <label for="achieved_date" class="col-sm-2 col-form-label">Verification Date</label>
                                            <input type="date" class="form-control" id="achieved_date" name="achieved_date"  style="max-width:30%;">
                                        </div>

                                        
                                        

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-primary w-md" name="Update" value="Update" >Verify OSS Works Complete</button>
                                            </div>
                                        </div>
                                    </form>
                                    
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

</body>

</html>