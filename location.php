<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>OSS Works GeoPoint</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?> 
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style> 
        .card-border 
        {
            border-style: groove;
            border-color: orange;
            border-width: 8px;
        }
        .Mycell
        {
            background-color:red;
        }
        
    </style>

<script>
  var x = document.getElementById("demo");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
      x.value = navigator.geolocation.getCurrentPosition(showPosition);
      
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
   
    var loc_lat  = position.coords.latitude; 
    var loc_long  = position.coords.longitude;

    document.getElementById("lat_input").value =  loc_lat;
    document.getElementById("long_input").value =  loc_long;
  }
</script>

</head>
<?php 
    $id = $_GET['id'];

    $query="select * from households where hhcode='$id'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { 
            
            $hhcode= $id;
            $hhname = $row["hhname"];
            $ward = $row["ward"];
            $area = $row["area"];
            $plot = $row["plot"];
            $phone = $row["phone"];
            $lat = $row["lat"];
            $longi = $row["longi"];

        }
        $result_set->close();
    }
?>
<?php include 'layouts/body.php'; ?>
<div id="layout-wrapper">

    <?php if ($_SESSION["userrole"] == "04"){include 'layouts/vertical-menu_con.php';}else{include 'layouts/menu.php';}?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Geo Coordinates For OSS Household Works</h4>
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
              <div class="col-lg-9">
                  <div class="card-border">
                      <div class="card-header bg-transparent border-success">
                          
                      </div>
                      <div class="card-body">
                          
                            <form action ="hh_works_update_geopoint.php" method="POST"> 
                              <div class="row mb-1">
                                  <label for="hhcode" class="col-sm-2 col-form-label">Household ID</label>
                                  <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>

                                  <label for="hhname" class="col-sm-2 col-form-label">Household</label>
                                  <input type="text" class="form-control" id="hhname" name="hhname" value ="<?php echo $hhname; ?>" style="max-width:30%;"readonly>
                              </div>

                              
                              <div class="row mb-1">
                                  <label for="ward" class="col-sm-2 col-form-label">Ward</label>
                                  <input type="text" class="form-control" id="ward" name="ward" value ="<?php echo $ward; ?>" style="max-width:30%;"readonly>

                                  <label for="area" class="col-sm-2 col-form-label">Area</label>
                                  <input type="text" class="form-control" id="area" name ="area" value = "<?php echo $area; ?>" style="max-width:30%;"readonly>
                              </div>

                                                                                                              
                              <div class="row mb-2">
                                  <label for="plot" class="col-sm-2 col-form-label">Plot No.</label>
                                  <input type="text" class="form-control" id="plot" name="plot" value ="<?php echo $plot; ?>" style="max-width:30%;"readonly>

                                  <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value =" <?php echo $phone; ?>" style="max-width:30%;"readonly>
                              </div>
                              
                              <p style="color: blue">Click The Button Below To Capture Geopoint for Household OSS Works</p>
                              <div class="row mb-1">
                                  <label for="lat_input" class="col-sm-2 col-form-label">Latitude</label>
                                  <input type="text" class="form-control" id="lat_input" name="lat_input" value ="<?php if ($lat == 0){echo "Not Set";}else{echo $lat;} ?>" style="max-width:30%;"readonly>

                                  <label for="long_input" class="col-sm-2 col-form-label">Longitude</label>
                                  <input type="text" class="form-control" id="long_input" name="long_input" value ="<?php if ($longi == 0){echo "Not Set";} else {echo $longi;} ?>" style="max-width:30%;"readonly>
                              </div>
                                <div class="col-12">
                                    <?php
                                    if ((isset($lat)) and (isset($longi)))
                                    {
                                        echo '<button type="submit" class="btn btn-outline-primary w-md" name="Submit" value="Submit" disabled >Update Household</button>';
                                    } else
                                    {
                                        echo '<button type="submit" class="btn btn-outline-primary w-md" name="Submit" value="Submit">Update Household</button>';
                                    }
                                    ?>
                                </div>
                          </form>
                          
                      </div>
                  </div>
              </div>
            
                <div class ="row">
                    <div class="col-xl-4">                        
                      <div class="card-border">

                        <p><h6>Geo Coordinates For OSS Household Works</h6></p>
                        <?php
                            if ((isset($lat)) and (isset($longi)))
                            {
                                echo '<div class="col-12"><button class="btn btn-btn btn-outline-info w-md" onclick="getLocation()" disabled>Get Coordinates</button></div>';
                            }else
                            {
                                echo '<div class="col-12"><button class="btn btn-btn btn-outline-info w-md" onclick="getLocation()">Get Coordinates</button></div>'; 
                            }
                        ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>