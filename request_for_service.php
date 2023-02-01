<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php header("Cache-Control: max-age=300, must-revalidate"); ?>

<head>
    <title>OSS|Request For Service</title>
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
        var agree=confirm("Are you sure you want to Select this OSS Product?");
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
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $region = $_POST['region'];
        $district = $_POST['district'];
        $ta = $_POST['ta'];
     
    }
    
    function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }
    
        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Request For Service: Technology Choice</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Request For Service</li>
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
                                
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">OSS Technology Option</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" data-bs-toggle="link" href="tech_selection.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                            <span class="d-none d-sm-block">Technology Selection and Approvals</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="tcs_opt_payment.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Payment Option</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                                
                                <p align="right">
                                    <button class="btn btn-outline-primary  waves-effect waves-light mb-2 me-2" onclick="window.location.href = 'view-products.php'">  View OSS Products</button>
                                </p>
                                <!--start here -->
                                
                                <div class="card-border">
                                    <div class="card-body">
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="request_for_service_filter1.php" method ="POST" >
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
                                                <label for="ward" class="form-label">Ward</label>
                                                <select class="form-select" name="ward" id="ward"  required disabled>
                                                    <option>Select Ward</option>
                                                        
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Ward.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="area" class="form-label">City Area</label>
                                                <select class="form-select" name="area" id="area" required disabled>
                                                    <option >Select Area</option>
                                                    
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Area
                                                </div>
                                            </div>

                                            
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                                            </div>
                                        </form>                                            
                                        <!-- End Here -->
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-border">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-default">Households Ready For Option Selection</h5>
                                        </div>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th>HH Code</th>                                           
                                                            <th>HH Name</th>
                                                            <th>Tech Option?</th>
                                                            <th>Action</th>  
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?Php
                                                            $query="select * from households where ((enrolled='1') and (ready_selection = '1') and (deleted = '0') and (need_tg = '0') and (selected_product = '00'))";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                if ($row["identification"] == 1){$ident = 'CBT';}else{$ident = 'Self';}
                                                                $hhID = $row["hhcode"];
                                                            echo "<tr>\n";
                                                                echo "<td>".$row["hhcode"]."</td>\n";
                                                                echo "<td>".$row["hhname"]."</td>\n";
                                                                echo "<td>";
                                                                    echo "<form action = 'request_for_service_SelectProduct.php' method ='POST'>";
                                                                        echo '<select id="product"  name="product">';
                                                                            
                                                                            $ta_fetch_query = "SELECT pID,pname,pCost FROM tproducts";                                                  
                                                                            $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                            ?>
                                                                            <option value="<?php echo $DB_ROW_ta["pID"]; ?>">
                                                                                <?php echo $DB_ROW_ta["pname"]." :   ".$DB_ROW_ta["pCost"];?></option><?php
                                                                                $i++;
                                                                                    }
                                                                        echo "</select>";
                                                                        echo "<input type='hidden' id='hhID' name='hhID' value='$hhID'>";
                                                                        echo "<button type='submit' class='btn-outline-primary' name='FormSubmit' value='Submit' onClick='return confirmSubmit()'>Select</button>";
                                                                    echo "</form>";
                                                                echo "</td>";
                                                                echo "<td>                                               
                                                                        <a href=\"hh_View.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='View Household' style='font-size:18px; color: purple'></i></a>\n";
                                                                    
                                                                

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