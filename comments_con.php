<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Send Mail</title>
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
    </style>
</head>

<?php include 'layouts/body.php'; 
      include 'lib.php'; 

$hhCode = $_SESSION["hhid"];

$enrolled = hh_enroll_check($link,$hhCode);
?>

<!-- Begin page -->
<div id="layout-wrapper">
<?php include 'layouts/menu_con.php'; ?>
   

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
                            <h4 class="mb-sm-0 font-size-18">Mail To Supervisor</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
               
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-border1">
                                <div class="card-body">

                                    
                                    <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>

                                        <form action = 'comment_to_supervisor.php' method ='POST'>
                                            <div class="row mb-1">
                                                <label for="hhcode" class="col-sm-2 col-form-label">Contractor ID</label>                           
                                                <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $hhCode;?>" style="max-width:30%;" readonly >
                                            </div>
                                            
                                       
                                            <div class="row mb-3"> 
                                                <label for="product" class="col-sm-2 col-form-label">Mail Body</label>
                                                <textarea id="hhmemo" name="hhmemo" rows="5" cols="33"></textarea>
                                                    
                                            </div>
                                            
                                            
                                            <div>
                                                <button type="submit" class="btn btn-outline-primary" name="FormSubmit" value="Submit" onClick="return confirmSubmit()">Send Message</button>
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