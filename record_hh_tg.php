<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS Works|Technical Guidance</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
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
</head>

<?php include 'layouts/body.php'; ?>
<?php
       include "layouts/config.php";    
    
       $Rec_ID = $_GET['id']; 
   
       $query="select enrolled from households where hhcode='$Rec_ID'";
       
       if ($result_set = $link->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                if (isset($row["hhname"])){$hhname = $row["hhname"];}
                if (isset($row["blockname"])){$blockname = $row["blockname"];}
                if (isset($row["plot"])){$plot = $row["plot"];}
                if (isset($row["phone"])){$phone = $row["phone"];}
            }
           $result_set->close();
       }
               
         
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Technical Guidance Record</h4>
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
                                    
                                    <form method="POST" action="OSS_product_add1.php">
                                        <div class="row mb-1">
                                            <label for="hhcode" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $Rec_ID;?>"  style="max-width:30%;" readonly >
                                            
                                            <label for="hhname" class="col-sm-2 col-form-label">HH Name</label>
                                            <input type="text" class="form-control" id="hhname" name = "hhname" value ="<?php  if (isset($hhname)){echo $hhname;}?>"  style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="plotno" class="col-sm-2 col-form-label">Plot No</label>
                                            <input type="text" class="form-control" id="plotno" name="plotno" value="<?php if (isset($plot)){echo $plot;}?>" style="max-width:30%;" readonly>
                                        
                                            <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php if (isset($phone)){echo $phone;}?>"  style="max-width:30%;" readonly >
                                        </div>

                                        <div class="row mb-1">
                                            <label for="tg" class="col-sm-2 col-form-label">Technical Guidance</label>
                                            <input type="memo" class="form-control" id="tg" name="tg"  >

                                        </div>
                                        <div class="row mb-1">
                                            <label for="plotno" class="col-sm-2 col-form-label">Date</label>
                                            <input type="date" class="form-control" id="plotno" name="plotno" style="max-width:30%;" >

                                        </div>                              
                                                                                
                                        <div class="row justify-content-end">
                                            <div>
                                                
                                                <button type="submit" class="btn btn-btn btn-outline-success w-md" name="Add" value="Add">Add Product</button>
                                                
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