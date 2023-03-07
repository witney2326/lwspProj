<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household View</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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
<?php include 'layouts/config.php'; ?>
<?php include 'lib.php'; ?>
<?php
        $id = $_GET['id']; // get id through query string
        $query="select * from households where hhcode='$id'";
         if ($result_set = $link->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $hhname= $row["hhname"];;                
                 $ward = $row["ward"];
                 $area= $row["area"];
                 $plot= $row["plot"];
                 $phone= $row["phone"];
                 $identification= $row["identification"];
                 $product= $row["selected_product"];

                 $agecat= $row["agecat"];
                 $livelihood= $row["livelihood"];
                 $income= $row["income"];
                 $homestatus= $row["homestatus"];
                 $zonename= $row["zonename"];
                 $latrine= $row["latrine"]; 
                 $vulnerable= $row["vulnerable"];
                 $poor= $row["poor"]; 
                 $enrolled= $row["enrolled"];
             }
             $result_set->close();
         }
                
     ?>

<!-- Begin page -->
<div id="layout-wrapper">

   <?php if ($_SESSION["userrole"] == "04")
    {
        echo include 'layouts/vertical-menu_con.php';
    } else if ($_SESSION["userrole"] == "05")
    {
        echo include 'layouts/vertical-menu_hh.php';
    } else
    { 
        echo include 'layouts/menu.php';
    }
   ?>
    

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
                            <h4 class="mb-sm-0 font-size-18">View Household: <?php echo $hhname;?></h4>
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

                    <div class="col-xl-12">
                        <div class="card-border1">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Household Details</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Household Payments</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Selected Products</a>
                                            <a class="nav-link mb-2" id="v-pills-mycs-tab" data-bs-toggle="pill" href="#v-pills-mycs" role="tab" aria-controls="v-pills-mycs" aria-selected="false">Works Progress</a>
                                            <a class="nav-link mb-2" id="v-pills-mjsg-tab" data-bs-toggle="pill" href="#v-pills-mjsg" role="tab" aria-controls="v-pills-mjsg" aria-selected="false">Works Certificate</a>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card-border">
                                                        <h5 class="card-title mt-0"> Household Details</h5>   
                                                            <div class="col-lg-11">
                                                                <div class="row mb-1">
                                                                    <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label> 
                                                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>
                                                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="ward" class="col-sm-2 col-form-label">Ward</label>              
                                                                    <input type="text" class="form-control" id="ward" name="ward" value ="<?php echo ward_name($link,$ward) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="area" class="col-sm-2 col-form-label">Area</label>
                                                                    <input type="text" class="form-control" id="area" name="area" value ="<?php echo area_name($link,$area); ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="plot" class="col-sm-2 col-form-label">Plot No.</label>                          
                                                                    <input type="text" class="form-control" id="plot" name="plot" value =" <?php echo $plot ; ?>" style="max-width:30%;" disabled ="True">

                                                                    <label for="identification" class="col-sm-2 col-form-label">Identification</label>
                                                                    <input type="text" class="form-control" id="identification" name="identification" value =" <?php if($identification =='1'){echo "Targetted Through CBT";}else{echo "Self Targetting";} ?>" style="max-width:30%;" disabled ="True">                                           
                                                                </div>                                  
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="group" class="col-sm-2 col-form-label">Phone</label>              
                                                                    <input type="text" class="form-control" id="group" name="group" value ="<?php echo $phone; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="agecat" class="col-sm-2 col-form-label">Age Category</label>
                                                                    <input type="text" class="form-control" id="agecat" name="agecat" value =" <?php echo agecat_name($link,$agecat); ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="Livelihood" class="col-sm-2 col-form-label">Livelihood</label>              
                                                                    <input type="text" class="form-control" id="Livelihood" name="Livelihood" value ="<?php echo livelihood_name($link,$livelihood);?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="income" class="col-sm-2 col-form-label">HH Income</label>
                                                                    <input type="text" class="form-control" id="income" name="income" value =" <?php echo hh_income($link,$income); ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="Homestatus" class="col-sm-2 col-form-label">Home Status</label>              
                                                                    <input type="text" class="form-control" id="Homestatus" name="Homestatus" value ="<?php echo hh_homestatus($link,$homestatus);?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="zonename" class="col-sm-2 col-form-label">HH Zone</label>
                                                                    <input type="text" class="form-control" id="zonename" name="zonename" value =" <?php echo hh_lzone($link,$zonename); ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="latrine" class="col-sm-2 col-form-label">Latrine</label>              
                                                                    <input type="text" class="form-control" id="latrine" name="latrine" value ="<?php echo hh_latrine($link,$latrine);?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="vulnerable" class="col-sm-2 col-form-label">Vulnerable?</label>
                                                                    <input type="text" class="form-control" id="vulnerable" name="vulnerable" value =" <?php if ($vulnerable == '1'){echo "Yes";}else{echo "No";}; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="poor" class="col-sm-2 col-form-label">HH Poor?</label>              
                                                                    <input type="text" class="form-control" id="poor" name="poor" value ="<?php if ($poor == '1'){echo "Yes";}else{echo "No";};;?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="enrolled" class="col-sm-2 col-form-label">Verified/Accepted?</label>
                                                                    <input type="text" class="form-control" id="enrolled" name="enrolled" value =" <?php if ($enrolled == '1'){echo "Yes";}else{echo "No";}; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card-border">
                                                            <div class="col-lg-12">

                                                                <div class="card-header bg-transparent border-primary">
                                                                    <?php
                                                                        $result = mysqli_query($link, "SELECT SUM(amount_paid) AS value_total FROM tpayments where hhCode ='$id'"); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $total_savings = $row['value_total'];
                                                                    ?>
                                                                    <h5 class="my-0 text-default">Household Contributions: MK<?php echo number_format($total_savings,2); ?> </h5>
                                                                    
                                                                </div>
                                                                <div class="card-body">
                                                                <h5 class="card-title mt-0"></h5>
                                                                
                                                                    <div class="table-responsive">
                                                                                        
                                                                        <table class="table table-striped mb-0">
                                                                        
                                                                            <thead>
                                                                                <tr>   
                                                                                    <th>Payment_ID</th>                                              
                                                                                    <th>Date</th>                                                                                               
                                                                                    <th>Reference</th>
                                                                                    <th>Amount Paid</th>
                                                                                    <th>Payment Status</th>
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
                                                                                        if  ($row["pApproved"] == "1"){$pApproved = "Approved";}else{$pApproved = "Not Approved";}
                                                                                    echo "<tr>\n";                                           
                                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                                        echo "<td>".$row["pDate"]."</td>\n";
                                                                                        echo "<td>".$row["pReference"]."</td>\n";
                                                                                        echo "\t\t<td>$amount</td>\n";
                                                                                        echo "<td>\t\t$pApproved</td>\n";

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
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> Household Selected Product</h5>
                                                            <div class="card-header bg-transparent border-primary">
                                                                
                                                                <h6 class="my-0 text-default">Product: <?php echo pname($link,$product); ?> </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p> 
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-mycs" role="tabpanel" aria-labelledby="v-pills-mycs-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> Works Progress</h5>

                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                            <thead>
                                                                <tr>
                                                                    <th>Project Code</th>                                           
                                                                    <th>Start Date</th>
                                                                    <th>Expected End Date</th>
                                                                    <th>Contractor</th>
                                                                    <th>Status</th>
 
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?Php
                                                                    $query="select * from tprojects where phhcode = '$id'";                                                               
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                       
                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                        echo "<td>".$row["pstartdate"]."</td>\n";
                                                                        echo "<td>".$row["pfinishdate"]."</td>\n";
                                                                        echo "<td>".contractor_name($link,$row["pcontractorID"])."</td>\n";
                                                                        echo "<td>".pstatus($link,$row["pstatus"])."</td>\n";
                                                                        
                                                                    echo "</tr>\n";
                                                                    }
                                                                    $result_set->close();
                                                                    }  
                                                                                                     
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-mjsg" role="tabpanel" aria-labelledby="v-pills-mjsg-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> Project Completion Certificate</h5>
                                                              
                                                            

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
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