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

                <div class="col-xl-9">
                    
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            
                                
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary"></h4>

                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">Lilongwe Water and Sanitation Project</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"></h4>
                                                                    <p class="font-size-14 mb-0"></p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">Lilongwe Water and Sanitation Project</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"></h4>
                                                                    <p class="font-size-14 mb-0"></p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-border1"> 
                            <div class="auth-full-page-content p-md-5 p-4">
                                <div class="w-100">

                                    <div class="d-flex flex-column h-100">
                                        
                                        <div class="mt-5 text-center">
                                            <img src="assets/images/logo-dark.png" alt="" height="64" class="auth-logo-dark">
                                        </div>
                                        <div class="mt-5 text-center">
                                            <h5 class="text-default">Register Household</h5>
                                        </div>

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

                                                <div class="mb-1">
                                                    <label for="area" class="form-label">Select Area</label>
                                                    <select class="form-select" name="area" id="area" required>
                                                        <option ></option>
                                                    </select>
                                                </div>

                                                
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Submit Area</button>
                                                </div>

                                            </form>

                                            <div class="mt-5 text-center">
                                                
                                            </div>

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