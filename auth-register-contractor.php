<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php'; ?>

<head>
    <title>Register Contractor</title>
    <?php include 'layouts/head.php'; ?>

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <?php include 'layouts/head-style.php'; ?>
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
        .my-body 
        {
            background-color: orange;
        }
        .center 
        {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        }
    </style>
    
</head>


<?php
// Include config file
require_once "layouts/config.php";

// Define variables and initialize with empty values
$useremail = $username =  $password = $confirm_password = "";
$useremail_err = $username_err = $password_err = $confirm_password_err = "";

$cname = $caddress = $cphone = "";
$cphone_err = $caddress_err = $cname_err = "";

// Processing form data when form is submitted
if (isset($_POST["Submit"])) {

    $region = '00';
    $district = '00';
    $ta = '00';
    $position = $_POST["position"];
    $cphone = $_POST["cphone"];
    $cname = $_POST["cname"];
    $caddress = $_POST["caddress"];



    // Validate useremail
    if (empty(trim($_POST["useremail"]))) {
        $useremail_err = "Please enter a useremail.";
    } elseif (!filter_var($_POST["useremail"], FILTER_VALIDATE_EMAIL)) {
        $useremail_err = "Invalid email format";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_POST["useremail"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $useremail_err = "This useremail is already taken.";
                } else {
                    $useremail = trim($_POST["useremail"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
        $ustatus = '0';
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please enter a confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    
    function get_project_count($link)
    {
        $sql_contractors = "SELECT * FROM tcontractor";
        $mysqliStatus = $link->query($sql_contractors);
        $rows_count_value = mysqli_num_rows($mysqliStatus);
        return $rows_count_value;   
    }
  
     $dbcount= sprintf("%02d", get_project_count($link)+1);		
     $x="LWS/C";				
     $x.=$dbcount;
     $cID = $x;

        $password1 = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        $token = bin2hex(random_bytes(50)); // generate unique token
    // Check input errors before inserting in database

    if (empty($useremail_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) 
        {

            // Prepare an insert statement
            $sql = "INSERT INTO users (useremail, username, ustatus, userrole, usercon, userward, userarea, password, token) VALUES 
            ('$useremail','$username','$ustatus','$position','$cID','00', '00','$password1','$token')";

            $sql2 = "INSERT INTO tcontractor (id,cemail, cname, caddress,phone, token) VALUES ('$cID','$useremail','$cname', '$caddress','$cphone', '$token')";
            // Attempt to execute the prepared statement

            if ($link->query($sql) === true && $link->query($sql2) === true ) {
                echo '<script type="text/javascript">'; 
                    echo 'alert("Successfully Registered, Wait for email confirmation before login!");'; 
                    echo 'window.location.href = "i_registration.php";';
                echo '</script>';
              } else {
                echo "Error: " . $sql . "<br>" . $link->error;
                echo "Error: " . $sql2 . "<br>" . $link->error;
               
              } 
        }
    // Close connection
        mysqli_close($link);
    }
?>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-border">
                            <figure class="card__thumbnail">
                            <img src="assets/images/sanitation.jpg">
                            <span class="card__title"><center><h3>Register LWSP Contractor Account</h3></center></b><br></span>
                        </div> 
                    </div> 
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-border1"> 
                            <div class="p-md-5 p-4">
                                <div class="w-100">

                                    <div class="d-flex flex-column h-100">
  
                                        <div class="mt-4">
                                            <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                                <div class="row mb-1">
                                                    <label for="position" class="col-sm-5 col-form-label">Position</label>
                                                    <select class="form-select" name="position" id="position" style="max-width:50%;" required >
                                                        <option selected value="04">Contractor</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="row mb-1 <?php echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                                    <label for="useremail" class="col-sm-5 col-form-label">email address</label>
                                                    <input type="email" class="form-control" id="useremail" name="useremail"  value="<?php echo $useremail; ?>" style="max-width:50%;">
                                                    <span class="text-danger"><?php echo $useremail_err; ?></span>
                                                </div>

                                                <div class="row mb-1 <?php echo (!empty($cname_err)) ? 'has-error' : ''; ?>">
                                                    <label for="cname" class="col-sm-5 col-form-label">Contractor Name</label>
                                                    <input type="text" class="form-control" id="cname" name="cname" value="<?php echo $cname; ?>" style="max-width:50%;">
                                                    <span class="text-danger"><?php echo $cname_err; ?></span>
                                                </div>

                                                <div class="row mb-1 <?php echo (!empty($caddress_err)) ? 'has-error' : ''; ?>">
                                                    <label for="caddress" class="col-sm-5 col-form-label">Contractor Address</label>
                                                    <input type="text" class="form-control" id="caddress" name="caddress" value="<?php echo $caddress; ?>" style="max-width:50%;">
                                                    <span class="text-danger"><?php echo $caddress_err; ?></span>
                                                </div>

                                                <div class="row mb-1 <?php echo (!empty($cphone_err)) ? 'has-error' : ''; ?>">
                                                    <label for="cphone" class="col-sm-5 col-form-label"> Contractor Phone</label>
                                                    <input type="text" class="form-control" id="cphone" name="cphone" value="<?php echo $cphone; ?>"style="max-width:50%;" >
                                                    <span class="text-danger"><?php echo $cphone_err; ?></span>
                                                </div>

                                                <div class="row mb-1 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                                    <label for="username" class="col-sm-5 col-form-label">Enter Username</label>
                                                    <input type="text" class="form-control" id="username" name="username"  value="<?php echo $username; ?>"style="max-width:50%;">
                                                    <span class="text-danger"><?php echo $username_err; ?></span>
                                                </div>

                                                <div class="row mb-1 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                    <label for="userpassword" class="col-sm-5 col-form-label">Enter Password</label>
                                                    <input type="password" class="form-control" id="userpassword" name="password"  value="<?php echo $password; ?>"style="max-width:50%;">
                                                    <span class="text-danger"><?php echo $password_err; ?></span>
                                                </div>

                                                <div class="row mb-1 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                    <label for="confirm_password" class="col-sm-5 col-form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"  value="<?php echo $confirm_password; ?>"style="max-width:50%;">
                                                    <span class="text-danger"><?php echo $confirm_password_err; ?></span>
                                                </div>
                                                
                                                
                                                <div class="mt-5 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit"name="Submit" value="Submit">Submit Registration</button>
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