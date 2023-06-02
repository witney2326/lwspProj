<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Add_Parameter</title>
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
                border-width: 9px;
            }
        .card1
            {
                background-color: rgba(0, 0, 0, 0.2);
            }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<?php include "layouts/config.php";?>

<?php
        
       $id = $_GET['id'];
       $query="select * from app_parameters where id='$id'";
       
       if ($result_set = $link->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
           { 
               $pname= $row["pname"];
               if (isset($row["pvalue"])){$pvalue= $row["pvalue"];}else{$pvalue="Not Set";}                           
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
                    <div class="col-6">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Add Parameter</h4>
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-border1">
                                    <div class="card-body">
                                        
                                        <form method="POST" action="parameter_add_1.php">
                                            <div class="row mb-1">
                                                <label for="paramID" class="col-sm-2 col-form-label">Parameter_ID</label>
                                                <input type="text" class="form-control" id="paramID" name = "paramID" Value ="<?php echo $id;?>"  style="max-width:10%;" readonly>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="pname" class="col-sm-2 col-form-label">Parameter</label>
                                                <input type="text" class="form-control" id="pname" name = "pname" Value ="<?php echo $pname;?>"  style="max-width:60%;" readonly>
                                            </div>
                                            
                                            <div class="row mb-1">
                                                <label for="pvalue" class="col-sm-2 col-form-label">Parameter Value</label>
                                                <input type="text" class="form-control" id="pvalue" name="pvalue" Value ="<?php echo $pvalue;?>" style="max-width:60%;" >
                                            </div>
                                            
                                                                            
                                                                                    
                                            <div class="row justify-content-end">
                                                <div>
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Add" value="Add">Add Parameter</button>
                                                </div>
                                            </div>
                                        </form>
                                        
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

</body>

</html>