<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>User View</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'layouts/config.php'; ?>
<?php include 'lib.php'; ?>
<?php
        $id = $_GET['id']; // get id through query string
        $query="select * from users where id='$id'";
         if ($result_set = $link->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $username= $row["username"];;                
                 $useremail = $row["useremail"];
                 $ustatus= $row["ustatus"];
                 $userrole= $row["userrole"];
                 $usercon= $row["usercon"];
                 
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">View User: <?php echo $username;?></h4>
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
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User Details</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card border border-success">
                                                        <h5 class="card-title mt-0"> User Details</h5>   
                                                            <div class="col-lg-9">
                                                                <div class="row mb-1">
                                                                    <label for="userid" class="col-sm-2 col-form-label">User Code</label> 
                                                                    <input type="text" class="form-control" id="userid" name = "userid" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                                    <input type="text" class="form-control" id="username" name ="username" value = "<?php echo $username ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="email" class="col-sm-2 col-form-label">email</label>              
                                                                    <input type="text" class="form-control" id="email" name="email" value ="<?php echo $useremail ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="status1" class="col-sm-2 col-form-label">status</label>
                                                                    <input type="text" class="form-control" id="status1" name="status1" value ="<?php if ($ustatus == "1") {echo "Active";}else {echo "Not active";} ?>" style="max-width:30%;"  readonly>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="userrole" class="col-sm-2 col-form-label">User Role</label>                          
                                                                    <input type="text" class="form-control" id="userrole" name="userrole" value =" <?php echo role_name($link,$userrole); ?>" style="max-width:30%;" disabled ="True">

                                                                    <label for="usercon" class="col-sm-2 col-form-label">HH Code</label>
                                                                    <input type="text" class="form-control" id="usercon" name="usercon" value ="<?php if ($usercon == "00"){echo "Not Household";}else{echo $usercon ;} ?>" style="max-width:30%;" disabled ="True">                                           
                                                                </div>                                  
                                                                                                        
                                                                                                                                
                                                                
                                                            </div>
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