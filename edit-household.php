<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Households | Edit</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>




<?php
    include "layouts/config.php"; // Using database connection file here
    
    $id = $_GET['id']; // get id through query string
    $query="select * from households where hhcode='$id'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { 
            $hhname= $row["hhname"];;
            $blockname= $row["blockname"];
            $ward = $row["ward"];
            $area= $row["area"];
            //$nat_id= $row["nat_id"];
            $plot = $row["plot"];
            $phone = $row["phone"];
            
        }
        $result_set->close();
    }

    

    function area_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function grp_name($link, $grpID)
        {
        $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['groupname'];
        }

        function prog_name($link, $progID)
        {
        $prog_query = mysqli_query($link,"select progName from tblspp where progID='$progID'"); // select query
        $prog = mysqli_fetch_array($prog_query);// fetch data
        return $prog['progName'];
        }

        function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

    function iga_name($link, $igaID)
    {
    $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
    $iga = mysqli_fetch_array($iga_query);// fetch data
    return $iga['name'];
    }
            
?>
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
                            <h4 class="mb-sm-0 font-size-18">Edit Household</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit Household</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <?php include 'layouts/body.php'; ?>
                <div class="col-lg-12">
                    
                    <div class="row mb-1">  
                        <div>
                            <p align="right">
                                
                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                            </p>
                        </div>
                    </div>

                    <div class="card border border-success">
                        
                        <div class="card-body">
                            
                            <form novalidate action="uphh.php" method ="POST" >
                                <div class="row mb-1">
                                    <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label> 
                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>
                                    
                                    <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>
                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" >
                                </div>
                                                                        
                                <div class="row mb-1">
                                    <label for="region" class="col-sm-2 col-form-label">Ward</label>              
                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo $ward ; ?>" style="max-width:30%;" readonly>
                                    
                                    <label for="district" class="col-sm-2 col-form-label">Area</label>
                                    <input type="text" class="form-control" id="district" name="district" value ="<?php $area; ?>" style="max-width:30%;" readonly>
                                </div>
                                                                        
                                                                        
                                <div class="row mb-1">
                                    <label for="blockname" class="col-sm-2 col-form-label">Block Name</label>              
                                    <input type="text" class="form-control" id="blockname" name="blockname" value ="<?php echo $blockname; ?>" style="max-width:30%;">
                                    
                                    <label for="plot" class="col-sm-2 col-form-label">Plot No.</label>
                                    <input type="text" class="form-control" id="plot" name="plot" value =" <?php echo $plot ; ?>" style="max-width:30%;" readonly>
                                </div>
                                
                                <div class="row mb-1">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>                          
                                    <input type="text" class="form-control" id="phone" name="phone" value =" <?php echo $phone ; ?>" style="max-width:30%;" >

                                    <label for="nat_id" class="col-sm-2 col-form-label">National ID</label>
                                    <input type="text" class="form-control" id="nat_id" name="nat_id" value =" " style="max-width:30%;">                                           
                                </div>

                                <div class="row mb-1">  
                                    <div>
                                        
                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                           
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

        

    </div>
</div>