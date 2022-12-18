<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS Works|Household Works Schedule</title>
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
               
       $id = $_GET['id'];
       $query="select * from households where hhcode ='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
              $ward = $row["ward"];
              $area= $row["area"];
              $blockname = $row["blockname"];
              $plot = $row["plot"];
              $phone= $row["phone"];
              $hhname = $row["hhname"];
              $selected_product = $row["selected_product"];
              $pOption = $row["pOption"];
                
            }
            
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
                            <h4 class="mb-sm-0 font-size-18">Household Works Schedule</h4>
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
                                    
                                    <form method="POST" action="hh_project_schedule.php">
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="hhname" class="col-sm-2 col-form-label">HH Name</label>
                                            <input type="text" class="form-control" id="hhname" name = "hhname" value="<?php echo $hhname; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="ward" class="col-sm-2 col-form-label">Ward</label>
                                            <input type="text" class="form-control" id="ward" name="ward" value ="<?php echo $ward ; ?>" style="max-width:30%;" readonly>
                                        
                                            <label for="area" class="col-sm-2 col-form-label">City Area </label>
                                            <input type="text" class="form-control" id="area" name="area" value ="<?php echo $area ; ?>" style="max-width:30%;" readonly>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="blockname" class="col-sm-2 col-form-label">Block Name</label>
                                            <input type="text" class="form-control" id="blockname" name="blockname" value ="<?php echo $blockname ; ?>" style="max-width:30%;" readonly>
                                        
                                            <label for="plot" class="col-sm-2 col-form-label">HH Plot No.</label>
                                            <input type="text" class="form-control" id="plot" name="plot" value ="<?php echo $plot ; ?>" style="max-width:30%;" readonly>
                                        </div>

                                                                             
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value ="<?php echo $phone?>" style="max-width:30%;" readonly>
                                            
                                            <label for="product" class="col-sm-2 col-form-label">Product</label>
                                            <input type="text" class="form-control" id="product" name="product" value ="<?php echo pname($link,$selected_product);?>" style="max-width:30%;" readonly>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="contractor" class="col-sm-3 col-form-label"> Select Contractor</label>
                                            
                                            
                                                <select class="form-select" name="contractor" id="contractor" style="max-width:22%;background-color:LightGray;"  required>
                                                    <option ></option>
                                                        <?php                                                           
                                                            $slg_fetch_query = "SELECT id,cname FROM tcontractor";                                                  
                                                            $result_slg_fetch = mysqli_query($link, $slg_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_slg = mysqli_fetch_array($result_slg_fetch)) {
                                                            ?>
                                                            <option  value="<?php echo $DB_ROW_slg["id"]; ?>">
                                                                <?php echo $DB_ROW_slg["cname"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                            

                                            
                                        </div>

                                       
                                        <div class="row mb-4"><h6 class="my-0 text-primary">Allocate and Schedule Contractor To Project</h6></div>
                                        <div class="row mb-4">
                                            <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;background-color:LightGray;">

                                            <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>
                                            <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;background-color:LightGray;">
                                        </div>

                                        
                                        <div class="row justify-content-end">
                                            <div>
                                                
                                                <button type="submit" class="btn btn-btn btn-outline-success w-md" name="Allocate" value="Allocate">Schedule Household OSS Works</button>
                                                
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