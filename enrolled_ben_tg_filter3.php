<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Households That Need Technical Guidance</title>
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

        .record {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/record.png');
        background-repeat: no-repeat;
        }
        .ico-record { background-position: 0 0; }
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $constituency = $_POST['constituency'];
        $ward = $_POST['ward'];
        $area = $_POST['area'];
     
    }
    
    function area_name($link, $acode)
        {
        $rg_query = mysqli_query($link,"select aname from areas where areacode='$acode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['aname'];
        }
    
        function con_name($link, $conID)
        {
        $dis_query = mysqli_query($link,"select cname from constituency where id='$conID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['cname'];
        }

        function ward_name($link, $wID)
        {
        $dis_query = mysqli_query($link,"select wname from wards where id='$wID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['wname'];
        }
?>

<!-- Begin page -->
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
                            <h4 class="mb-sm-0 font-size-18">Households That Need Technical Guidance</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Households That Need Technical Guidance</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card"> 
                            <div class="card-border1">
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link" data-bs-toggle="link" href="register_beneficiary.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Register_Household"]?></span>
                                            </a>
                                        </li>             
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link " data-bs-toggle="link" href="target_ben.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Registered_Households"]?></span>
                                            </a>
                                        </li>

                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="enrolled_ben.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Verified_Households"]?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Verified_Households_Need_Technical_Guidance"]?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-border">
                                <div class="card-body">
                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="" method ="POST" >
                                        <div class="col-12">
                                            <label for="constituency" class="form-label">Constituency</label>
                                            
                                            <select class="form-select" name="constituency" id="constituency"  required>
                                                <option selected value="<?php echo $constituency;?>"><?php echo con_name($link,$constituency);?></option>  
                                            </select>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="ward" class="form-label">Ward</label>
                                            <select class="form-select" name="ward" id="ward"  required >
                                                <option selected value="<?php echo $ward; ?>" ><?php echo ward_name($link,$ward); ?></option>
                                                    
                                            </select>
                                            
                                        </div>

                                        <div class="col-12">
                                            <label for="area" class="form-label">City Area</label>
                                            <select class="form-select" name="area" id="area" required>
                                                <option selected  value="<?php echo $area;?>"><?php echo area_name($link,$area);?></option>
                                            </select>
                                            
                                        </div>

                                        
                                        <div class="col-12">
                                            
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                                        </div>
                                    </form>                                            
                                    <!-- End Here -->
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-border">
                                        <p align="right">
                                            <button class="btn btn-outline-primary  waves-effect waves-light mb-2 me-2" style = "background-color:orange;" onclick="window.location.href = 'view-products.php'">  View OSS Products</button>
                                        </p>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                        
                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                                <thead style="background-color:plum">
                                                    <tr>
                                                        <th>Household Code</th>                                           
                                                        <th>Household Name</th>
                                                        <th>Phone No.</th>
                                                        <th>Block Name</th>
                                                        <th>Plot No.</th>
                                                        <th>Action</th>  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?Php
                                                        $query="select * from households where ((con = '$constituency')and (ward = '$ward') and (area = '$area') and (enrolled ='1') and (deleted = '0') and (need_tg = '1'))";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            
                                                        echo "<tr>\n";
                                                            echo "<td>".$row["hhcode"]."</td>\n";
                                                            echo "<td>".$row["hhname"]."</td>\n"; 
                                                            echo "<td>".$row["phone"]."</td>\n";
                                                            echo "<td>".$row["blockname"]."</td>\n";
                                                            echo "<td>".$row["plot"]."</td>\n";
                                                            echo "<td>                                               
                                                            <a onClick=\"javascript: return confirm('Do you Want To Record Technical Guide Rendered To HH?');\"  href=\"record_hh_tg.php?id=".$row['hhcode']."\"><button class='btn btn-sm btn-outline-secondary' title='Want To Record TG Rendered?' style='font-size:18px; color:black'><i class='record ico-record'></i></button></a> 
                                                            </td>\n";

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