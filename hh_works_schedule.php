<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS Works|Household Schedule</title>
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
<?php
      include "layouts/config.php"; 
     $id = $_GET['id'];
     $query="select * from households where hhcode='$id'";
      
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
                                
                                <div class="card-body">
                                    
                                    <form method="POST" action="hh_payments_update.php">
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="hhname" class="col-sm-2 col-form-label">HH Name</label>
                                            <input type="text" class="form-control" id="hhname" name = "hhname" value="<?php echo $hhname; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="area" class="col-sm-2 col-form-label">City Area</label>
                                            <input type="text" class="form-control" id="area" name="area" value ="<?php echo $area ; ?>" style="max-width:30%;" readonly>
                                        
                                            <label for="blockname" class="col-sm-2 col-form-label">Block Name</label>
                                            <input type="text" class="form-control" id="blockname" name="blockname" value ="<?php echo $blockname ; ?>" style="max-width:30%;" readonly>
                                        </div>

                                                                             
                                        <div class="row mb-1">
                                            <label for="pdate" class="col-sm-2 col-form-label">Date Paid</label>
                                            <input type="date" class="form-control" id="pdate" name="pdate"  style="max-width:30%;">
                                            
                                            <label for="poption" class="col-sm-2 col-form-label">Pymt Option</label>
                                            <input type="text" class="form-control" id="poption" name="poption" value ="<?php echo $pOption;?>" style="max-width:30%;" readonly>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="pref" class="col-sm-2 col-form-label">Payment Ref </label>
                                            <input type="text" class="form-control" id="pref" name="pref"  style="max-width:30%;">
                                            
                                            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount"  style="max-width:30%;">
                                        </div>

                                                                                
                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-success w-md" name="Submit" value="Submit">Save Payment</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-9">
                        <div class="card border border-success">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">HH Payments Record</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            <th>Payment_ID</th>                                              
                                            <th>Date</th>                                                                                               
                                            <th>Reference</th>
                                            <th>Amount Paid</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                                $id = $_GET['id'];
                                                $query="select * from tpayments where hhCode ='$id';";
                                                                                    
                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                {                                                
                                                    $amount = number_format($row["amount_paid"],"2");
    
                                                echo "<tr>\n";                                           
                                                    echo "<td>".$row["pID"]."</td>\n";
                                                    echo "<td>".$row["pDate"]."</td>\n";
                                                    echo "<td>".$row["pReference"]."</td>\n";
                                                    echo "\t\t<td>$amount</td>\n";
                                                    echo "<td>".$row["pApproved"]."</td>\n";
                                                    
                                                    
                                                    echo "<td>
                                                        <a href=\".php?id=".$row['pID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                        <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['pID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
                                                    </td>\n";
                                                echo "</tr>\n";
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