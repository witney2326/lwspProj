<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Households | View</title>
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
                            <h4 class="mb-sm-0 font-size-18">View Household</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">View Household</li>
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
                            
                            <form>
                                <div class="row mb-1">
                                    <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label> 
                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                    
                                    <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>
                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" disabled ="True">
                                </div>
                                                                        
                                <div class="row mb-1">
                                    <label for="region" class="col-sm-2 col-form-label">Ward</label>              
                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo $ward ; ?>" style="max-width:30%;" disabled ="True">
                                    
                                    <label for="district" class="col-sm-2 col-form-label">Area</label>
                                    <input type="text" class="form-control" id="district" name="district" value ="<?php $area; ?>" style="max-width:30%;" disabled ="True">
                                </div>
                                                                        
                                                                        
                                <div class="row mb-1">
                                    <label for="group" class="col-sm-2 col-form-label">Block Name</label>              
                                    <input type="text" class="form-control" id="group" name="group" value ="<?php echo $blockname; ?>" style="max-width:30%;" disabled ="True">
                                    
                                    <label for="cohort" class="col-sm-2 col-form-label">Plot No.</label>
                                    <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $plot ; ?>" style="max-width:30%;" disabled ="True">
                                </div>
                                
                                <div class="row mb-1">
                                    <label for="sppname" class="col-sm-2 col-form-label">Phone</label>                          
                                    <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo $phone ; ?>" style="max-width:30%;" disabled ="True">

                                    <label for="nat_id" class="col-sm-2 col-form-label">National ID</label>
                                    <input type="text" class="form-control" id="nat_id" name="nat_id" value =" " style="max-width:30%;" disabled ="True">                                           
                                </div>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-12">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <?php
                                    //$result = mysqli_query($link, ""); 
                                    //$row = mysqli_fetch_assoc($result); 
                                    //$total_investment = $row['value_total'];
                                ?>
                                <h6 class="my-0 text-default">Household Project Summary</h6>
                            </div>
                            <div class="card-body">
                            <h5 class="card-title mt-0"></h5>
                            
                                <div class="table-responsive">
                                                    
                                    <table class="table table-striped mb-0">
                                    
                                        <thead>
                                            <tr>   
                                                <th>Product ID</th>                                              
                                                <th>Product Name</th>
                                                <th>Payment Status</th>
                                                <th>Start Date</th>                                 
                                                <th>Works Done</th>
                                                <th>Completion Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?Php
                                                    $id = $_GET['id'];
                                                $query="select * from tblmember_iga where sppCode ='$id';";

                                                //Variable $link is declared inside config.php file & used here
                                                
                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                {                                                
                                                    $amount = number_format($row["amount_invested"],"2");
    
                                                    $ig_name = iga_name($link,$row["type"]);
                                                    
                                            
                                                echo "<tr>\n";                                           
                                                    echo "<td>".$row["recID"]."</td>\n";
                                                    echo "\t\t<td>$ig_name</td>\n";
                                                    
                                                    
                                                    echo "\t\t<td>$amount</td>\n";
                                                    
                                                    echo "<td>
                                                        <a href=\"basicSLGMemberIGAEdit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                        <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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

        

    </div>
</div>