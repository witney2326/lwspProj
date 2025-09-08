<?php
require_once 'layouts/config.php'; 
?>
<head>
    <title>Register Household</title>

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <?php include 'layouts/head-style.php'; ?>

    <script>
      function getWard(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_ward.php",
            data:'conID='+val,
            success: function(data)
                    {
                    $("#ward").html(data);
                    }
                });
        }

        function getArea(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_area.php",
                data:'wardid='+val,
                success: function(data){
                $("#area").html(data);
                }
                });
            }

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
    </style>
</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-border">
                            <figure class="card__thumbnail">
                            <img src="assets/images/sanitation.jpg">
                            <span class="card__title"><center><h3>Register Household Account</h3></center></b><br></span>
                        </div> 
                    </div> 
                </div>
                <!-- end col -->

                <div class="col-xl-2">
                    <div class="card">
                        <div class="card-border1"> 
                            <div class="p-md-5 p-4">
                                <div class="w-100">

                                    <div class="d-flex flex-column h-100">
                                        
                                        

                                        <div class="mt-4">
                                            <form class="needs-validation"  action="auth-register-hh4.php" method="POST">

                                                <div class="mb-1">
                                                    <label for="constituency" class="form-label">Constituency</label>
                                                                                    
                                                    <select class="form-select" name="constituency" id="constituency" onChange="getWard(this.value);" required>
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
                                                </div>

                                                <div class="mb-1">
                                                    <label for="ward" class="form-label">Select Ward</label>
                                                    <select class="form-select" name="ward" id="ward" onChange="getArea(this.value);" required>
                                                        <option></option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="area" class="form-label">Select Area</label>
                                                    <select class="form-select" name="area" id="area" required>
                                                        <option ></option>
                                                    </select>
                                                </div>

                                                </b><br><br><br><br><br><br>
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Submit Area</button>
                                                </div>
                                                
                                            </form>

                                            

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>
    <!-- owl.carousel js -->
    <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>
    <!-- validation init -->
    <script src="assets/js/pages/validation.init.js"></script>
    <!-- auth-2-carousel init -->
    <script src="assets/js/pages/auth-2-carousel.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>