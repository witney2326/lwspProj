<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php header("Cache-Control: max-age=300, must-revalidate"); ?>

<head>
    <title>Register Beneficiary Household</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    
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

<div id="layout-wrapper">

    <?php 
        if ($_SESSION["userrole"] == '04')
        {
            include 'layouts/vertical-menu_con.php';
        } else
        {
        include 'layouts/menu.php'; 
        }
    ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
        include "lib.php";
        
        $con = $_POST['constituency'];
        $ward = $_POST['ward'];
        $area = $_POST['area'];

        
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php include 'layouts/body.php'; ?>
    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <!-- start page title -->
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Register Beneficiary Household</h4>

                        </div>
                    </div>
                    <div class="col-6">
                        <p align="right">
                            <INPUT TYPE="button" class="btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                        </p>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card-border1">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                    <span class="d-none d-sm-block">Register HH</span>
                                </a>
                            </li>              
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link " data-bs-toggle="link" href="target_ben.php" role="link">
                                    <span class="d-none d-sm-block">Registered HHs</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="link" href="enrolled_ben.php" role="link">
                                    <span class="d-none d-sm-block">Verified HHs</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="link" href="enrolled_ben_tg.php" role="link">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Verified HHs: Need Technical Guidance</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- end here -->
                <div class="row">
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="card-border">
                            
                            <div class="card-body">
                                
                                <form novalidate action="register_new_beneficiary_hh.php" method ="POST">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="con" class="form-label">Constituency</label>
                                                <select class="form-select" id="con" name ="con" style="background-color:plum;" required >
                                                    <option selected value="<?php echo $con;?>" ><?php echo con_name($link,$con);?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ward" class="form-label">Ward</label>
                                                <select class="form-select" id="ward" name ="ward" style="background-color:plum;" required >
                                                    <option selected value="<?php echo $ward;?>" ><?php echo ward_name($link,$ward);?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="area" class="form-label">Area</label>
                                                <select class="form-select" id="area" name ="area" style="background-color:plum;" required>
                                                    <option selected  value="<?php echo $area;?>"><?php echo area_name($link,$area);?></option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="block" class="form-label">Block Name</label>
                                                <input type="text" class="form-control" id="block" name="block">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hhname" class="form-label">HH Name</label>
                                                <input type="text" class="form-control" id="hhname" name = "hhname" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="plot" class="form-label">Plot Number</label>
                                                <input type="text" class="form-control" id="plot" name ="plot"  >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" pattern="/(0)\d{9}/" title="Please enter valid phone number">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="age_category" class="form-label">Age Category</label>
                                                <select class="form-select" id="age_category" name ="age_category" required>
                                                
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, cat FROM age_category";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["cat"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="livelihood" class="form-label">Source Of Livelihood</label>
                                                <select class="form-select" id="livelihood" name ="livelihood" required>
                                                
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, livelihood FROM main_livelihood";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["livelihood"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="average_income" class="form-label">Average Monthly Income</label>
                                                <select class="form-select" id="average_income" name ="average_income" required>
                                                    
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, income FROM month_income";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["income"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_vulnerable" class="form-label">HH Vulnerable?</label><br>
                                                
                                                <input type="radio" id="Yes" name="hh_vulnerable" value="1">
                                                <label for="Yes">Yes</label>
                                                <input type="radio" id="No" name="hh_vulnerable" value="0">
                                                <label for="No">No</label><br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_poor" class="form-label">HH Poor?</label><br>
                                                
                                                <input type="radio" id="Yes" name="hh_poor" value="1">
                                                <label for="Yes">Yes</label>
                                                <input type="radio" id="No" name="hh_poor" value="0">
                                                <label for="No">No</label><br>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_ownership_status" class="form-label">House Ownership Status</label>
                                                <select class="form-select" id="hh_ownership_status" name ="hh_ownership_status" required>
                                                    
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, status_ FROM home_status";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["status_"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="location_zone" class="form-label">HH Structure Location Zone</label>
                                                <select class="form-select" id="location_zone" name ="location_zone" required>
                                                    
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, l_zone FROM location_zone";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["l_zone"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_latrine" class="form-label">HH Latrine</label>
                                                <select class="form-select" id="hh_latrine" name ="hh_latrine" required>
                                                    
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, type_ FROM hh_latrine";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["type_"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_identification" class="form-label">Identified Through:</label><br>
                                                
                                                <input type="radio" id="CBT" name="hh_identification" value="1">
                                                <label for="CBT">CBT</label>
                                                <input type="radio" id="Self" name="hh_identification" value="0">
                                                <label for="Self">Self</label><br>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_status" class="form-label">Household Status</label>
                                                <select class="form-select" id="hh_status" name ="hh_status" required>
                                                    
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, status_ FROM household_status";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["status_"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_gender" class="form-label">HH Head Gender</label>
                                                <select class="form-select" id="hh_gender" name ="hh_gender" required>
                                                    
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, gender FROM tgender";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["gender"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_population" class="form-label">HH Population</label>
                                                <input type="number" min="1" class="form-control" id="hh_population" name="hh_population">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="latrine_use" class="form-label">Latrine Use</label><br>
                                                
                                                <input type="radio" id="single" name="latrine_use" value="1">
                                                <label for="single">Single</label>
                                                <input type="radio" id="shared" name="latrine_use" value="2">
                                                <label for="shared">Shared</label><br>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_nat_id" class="form-label">National ID For HH Head</label>
                                                <input type="text"  class="form-control" id="hh_nat_id" name="hh_nat_id">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md" style="width:200px" name="Submit" value="Submit">Save Household Record</button>
                                                
                                            </div>                                   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</div>