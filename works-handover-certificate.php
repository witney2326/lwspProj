<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS Works| Contractor Handover Certificate</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'lib.php'; ?>

    <style>
        h1 {text-align: center;}
        h4 {text-align: center;}
        .my-words {text-align: center;}
    </style>
</head>

<?php include 'layouts/body.php'; 
      include 'layouts/config.php';

      $id = $_GET['id'];
        $query="select * from tprojects where pID='$id'";
         if ($result_set = $link->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $phhcode= $row["phhcode"];                
                 $pcontractorID = $row["pcontractorID"];
                 $pstatus= $row["pstatus"];
                 $plot= hh_plot($link,$row["phhcode"]); 
                 $pstartdate= $row["pstartdate"];
                 $pfinishdate= $row["pfinishdate"];
             }
             $result_set->close();
         }
                
     ?>
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
                
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    
                                    <div class="mb-4">
                                        <h1><img src="assets/images/logo-dark.png" alt="logo" height="50" /></h1>
                                    </div>
                                    <h4><div class="my-words">
                                        OSS Works Handover Certificate By LWSP
                                    </div></h4>
                                </div>
                                <hr>
                                <div class="row">
                                    
                                    <div class="row mb-1">
                                        <label for="hhname" class="col-sm-2 col-form-label">HH Name</label>
                                        <input type="text" class="form-control" id="hhname" name = "hhname" value="<?php echo hh_name($link,$phhcode);?>" style="max-width:30%;" readonly>

                                        <label for="hhcode" class="col-sm-2 col-form-label">Plot No</label>
                                        <input type="text" class="form-control" id="hhcode" name="hhcode" value ="<?php echo $plot;?>" style="max-width:30%;"readonly>
                                    </div>
                                    <div class="row mb-1">
                                        <label for="proj_id" class="col-sm-2 col-form-label">Works ID</label>
                                        <input type="text" class="form-control" id="proj_id" name = "proj_id" value="<?php echo $id;?>" style="max-width:30%;" readonly>

                                        <label for="hhcode" class="col-sm-2 col-form-label">Certificate No.</label>
                                        <input type="text" class="form-control" id="hhcode" name="hhcode" value ="<?php echo $phhcode;?>" style="max-width:30%;"readonly>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <p>Sir,</p>
                                    <p>The Works have been scheduled to start on : <?php echo $pstartdate;?> and completed by: <?php echo $pfinishdate;?>  </p>
                                    <p>The detailed architectural drawings and architectural specifications are all attached.</p>
                                    
                                </div>
                                <div class="row mb-4">
                                        <label for="proj_id" class="col-sm-2 col-form-label">Supervisor's Signature</label>
                                        <input type="text" class="form-control" id="proj_id" name = "proj_id" value="" style="max-width:30%;" readonly>

                                        <label for="hhcode" class="col-sm-2 col-form-label">Certificate Date</label>
                                        <input type="text" class="form-control"  id="hhcode" name="hhcode" value ="<?php echo date("Y/m/d");?>" style="max-width:30%;"readonly>
                                    </div>
                                    
                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<script src="assets/js/app.js"></script>

</body>

</html>