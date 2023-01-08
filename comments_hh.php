<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS|Comments</title>
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

    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to this message to supervisor?");
        if (agree)
        return true ;
        else
        return false ;
        }   
    </script>
</head>

<?php include 'layouts/body.php'; 
      include 'lib.php'; 

$hhCode = $_SESSION["hhid"];

$enrolled = hh_enroll_check($link,$hhCode);
?>

<!-- Begin page -->
<div id="layout-wrapper">
<?php include 'layouts/menu_hh.php'; ?>
   

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
                            <h4 class="mb-sm-0 font-size-18">Household Comment To Supervisor</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_hh.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Household Comment</li>
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
                              

                                <!--start here -->
                                
                                <div class="row">
                                    <div class="col-9">
                                    <p align="right">
                                        <button class="btn btn-outline-primary  waves-effect waves-light mb-2 me-2" onclick="window.location.href = 'view-products_hh.php'">  View OSS Products</button>
                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                    </p>
                                    
                                        <div class="card border border-primary">
                                            <?php if ($enrolled == '0'){echo '<div class="alert alert-warning" role="alert"> Household NOT YET Enrolled, Check Household Status!</a></div>';}?>
                                            <div class="card-body">
                                                <h7 class="card-title mt-0"></h7>

                                                <form action = 'comment_to_supervisor.php' method ='POST'>
                                                    <div class="row mb-1">
                                                        <label for="hhcode" class="col-sm-2 col-form-label">HH Code</label>                           
                                                        <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $hhCode;?>" style="max-width:30%;" readonly >
                                                    </div>
                                                    <div class="row mb-1"> 
                                                        <label for="hhname" class="col-sm-2 col-form-label">HH Name</label>
                                                        <input type="text" class="form-control" id="hhname" name ="hhname" value = "<?php echo hh_name($link,$hhCode);?>" style="max-width:30%;" readonly >
                                                    </div>
                                                <?php
                                                if ($enrolled == '1'){
                                                    echo '<div class="row mb-3">'; 
                                                        echo '<label for="product" class="col-sm-2 col-form-label">Comment</label>';
                                                        echo '<input type="memo" class="form-control" id="hhmemo" name ="hhmemo" >';
                                                            
                                                    echo '</div>';
                                                    
                                                    
                                                    echo '<div>';
                                                        echo '<button type="submit" class="btn btn-outline-primary" name="FormSubmit" value="Submit" onClick="return confirmSubmit()">Send Comment to supervisor</button>';
                                                    echo '</div>';}
                                                    ?>
                                                </form>
                                            </div>
                                        </div>     
                                    </div>            
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