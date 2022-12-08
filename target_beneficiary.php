<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>



<head>
    <title>LWSP |Add New Beneficiary</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    
    <?php include "layouts/config.php"; ?>
    <?php include 'layouts/body.php'; ?>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
</head>

<div id="layout-wrapper">
    <?php include 'layouts/menu.php'; ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Target Beneficiary</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Target Households</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"></i>Location Filter</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="register_beneficiary_filter1.php" method ="GET" >
                            <div class="col-12">
                                <label for="constituency" class="form-label">Constituency</label>
                                
                                <select class="form-select" name="constituency" id="constituency"  required>
                                    <option ></option>
                                    <?php                                                           
                                            $dis_fetch_query = "SELECT id, cname FROM constituency";                                                  
                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                            $i=0;
                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                            ?>
                                            <option value ="<?php
                                                    echo $DB_ROW_reg["id"];?>">
                                                <?php
                                                    echo $DB_ROW_reg["cname"];
                                                ?>
                                            </option>
                                            <?php
                                                $i++;
                                                    }
                                        ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Constituency
                                </div>
                                
                            </div>
                            
                            <div class="col-12">
                                <label for="district" class="form-label">Ward</label>
                                <select class="form-select" name="district" id="district" value ="$district" required disabled>
                                    <option selected value="$district" ></option>
                                        <?php                                                           
                                            $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                            $i=0;
                                                while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                            ?>
                                            <option value="<?php echo $DB_ROW_Dis["DistrictID"]; ?>">
                                                <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                $i++;
                                                    }
                                        ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Ward.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="ta" class="form-label">City Area</label>
                                <select class="form-select" name="ta" id="ta" required disabled>
                                    <option selected  value="$ta"></option>
                                    <?php                                                           
                                            $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                            $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                            $i=0;
                                                while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                            ?>
                                            <option>
                                                <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                $i++;
                                                    }
                                        ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Area
                                </div>
                            </div>

                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                <INPUT TYPE="button" class="btn btn-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                            </div>
                        </form>                                             
                        <!-- End Here -->
                    </div>
                </div>

                <!-- end here -->
                <div class="row">
                    <div class="col-12">

                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary">SLG Members for: </h5>
                            </div>
                            <div class="card-body">
                                <h7 class="card-title mt-0"></h7>
                        
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            <th>Beneficiary Code</th>                                           
                                            <th>HH Name</th>
                                            
                                            
                                            <th>Identification</th>
                                            <th>Enrolled</th>
                                            <th>Action</th>
                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            
                                            $query="select * from households";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                
                                                echo "<td>".$row["hhcode"]."</td>\n";
                                                echo "<td>".$row["hhname"]."</td>\n";
                                                echo "<td>".$row["identification"]."</td>\n";
                                                echo "<td>".$row["enrolled"]."</td>\n";
                                                echo "<td>                                               
                                                    <a href=\"basicSLGMemberview.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px'></i></a> 
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To Approve This HOUSEHOLD for Livelihood Programme?');\" href=\"basicHHStatusApproval.php?id=".$row['hhcode']."\"><i class='far fa-check-square' title='Approve Household' style='font-size:18px' color:green></i></a> 
                                                    <a href=\"basicSLGMemberedit.php?id=".$row['hhcode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px'></i></a> 
                                                    <a href=\"basicSLGMembersavings.php?id=".$row['hhcode']."\"><i class='fas fa-hand-holding-usd' title='Update Member Savings' style='font-size:18px'></i></a>
                                                    <a href=\"basicSLGMemberloans.php?id=".$row['hhcode']."\"><i class='fas fa-book' title='Update Member Loans' style='font-size:18px'></i></a> 
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This HOUSEHOLD');\" href=\"basicSLGMemberdelete.php?id=".$row['hhcode']."\"><i class='far fa-trash-alt' title='Delete Member' style='font-size:18px'></i></a>      
                                                </td>\n";

                                            echo "</tr>\n";
                                            }
                                            $result_set->close();
                                            }  
                                                                
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"> 

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