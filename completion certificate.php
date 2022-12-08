<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Completion Certificate | OSS Works</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'lib.php'; ?>

    <style>
        h1 {text-align: center;}
        h4 {text-align: center;}
    </style>
</head>

<?php include 'layouts/body.php'; 
      include 'layouts/config.php';

      $id = $_GET['id'];
        $query="select * from tprojects where pID='$id'";
         if ($result_set = $link->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $phhcode= $row["phhcode"];;                
                 $pcontractorID = $row["pcontractorID"];
                 $pstatus= $row["pstatus"];
                 $plot= hh_plot($link,$row["phhcode"]);
                 
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
                                    <h3><div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        OSS Works Completion Certificate By Contractor on Record
                                    </div></h3>
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
                                        <label for="proj_id" class="col-sm-2 col-form-label">Submitted On</label>
                                        <input type="text" class="form-control" id="proj_id" name = "proj_id" value="" style="max-width:30%;" readonly>

                                        <label for="hhcode" class="col-sm-2 col-form-label">Certificate No.</label>
                                        <input type="text" class="form-control" id="hhcode" name="hhcode" value ="<?php echo $phhcode;?>" style="max-width:30%;"readonly>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <p>Sir,</p>
                                    <p>1. The works have been constructed according to the sanctioned plans.</p>
                                    <p>2. The works have been constructed as per:</p>
                                    <p>   - The detailed structural drawings and structural specifications.</p>
                                    <p>   -	The detailed architectural drawings and architectural specifications prepared by the architect.</p>
                                    <p>   -	Detailed drawings and specifications of all services</p>
                                    <p>3. All materials used in the constructions have been tested as provided in the specifications and a record of test reports has been kept.</p>
                                    <p></p>
                                </div>
                                <div class="row mb-4">
                                        <label for="proj_id" class="col-sm-2 col-form-label">HH Head's Signature</label>
                                        <input type="text" class="form-control" id="proj_id" name = "proj_id" value="" style="max-width:30%;" readonly>

                                        <label for="hhcode" class="col-sm-2 col-form-label">Contractor's signature</label>
                                        <input type="text" class="form-control" id="hhcode" name="hhcode" value ="" style="max-width:30%;"readonly>
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