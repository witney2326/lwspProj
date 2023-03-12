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
        
        $constituency = $_POST["constituency"];

        function get_constituency_name($link, $ccode)
        {
            $rg_query = mysqli_query($link,"select cname from constituency where id='$ccode'"); // select query
            $rg = mysqli_fetch_array($rg_query);// fetch data
            return $rg['cname'];
        }

        function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }     
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Register Beneficiary Household</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Register Beneficiary Household</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <p align="right">
                    <INPUT TYPE="button" class="btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                </p>
                <div class="card-border">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                    <span class="d-none d-sm-block">Register HH</span>
                                </a>
                            </li>             
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link " data-bs-toggle="link" href="target_ben.php" role="link">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Registered HHs</span>
                                </a>
                            </li>
                            
                            
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="link" href="enrolled_ben.php" role="link">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
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
                <div class="card-border">
                    <div class="card-body">
                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="register_beneficiary_filter2.php" method ="POST" >
                            <div class="col-12">
                                <label for="constituency" class="form-label">Constituency</label>
                                <select class="form-select" name="constituency" id="constituency" value =""  required>
                                    <option selected value="<?php echo $constituency;?>" ><?php echo get_constituency_name($link,$constituency);?></option>
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <label for="ward" class="form-label">Ward</label>
                                <select class="form-select" name="ward" id="ward" value ="" required >
                                        <?php                                                           
                                            $dis_fetch_query = "SELECT id,wname FROM wards where constituency ='$constituency'";                                                  
                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                            $i=0;
                                                while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                            ?>
                                            <option value="<?php echo $DB_ROW_Dis["id"]; ?>">
                                                <?php echo $DB_ROW_Dis["wname"]; ?></option><?php
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
                                    <option>Select Area</option>
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
                                <button type="submit" class="btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>            
                            </div>
                        </form>                                             
                        <!-- End Here -->
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