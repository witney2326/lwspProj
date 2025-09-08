<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php'; ?>

<head>
    <title>Register User</title>
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
    
    </style>
</head>


<?php
// Include config file
require_once "layouts/config.php";

// Define variables and initialize with empty values
$useremail = $username =  $password = $confirm_password = "";
$useremail_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if (isset($_POST["Submit"])) 
{

    $region = '00';
    $district = '00';
    $ta = '00';
    $position = $_POST["position"];

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
    
    $password1 = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
    $token = bin2hex(random_bytes(50)); // generate unique token
    // Check input errors before inserting in database
    if (empty($useremail_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) 
        {

            // Prepare an insert statement
                $sql = "INSERT INTO users (useremail, username, ustatus, userrole, usercon, userward, userarea, password, token) VALUES 
                ('$useremail','$username','$ustatus' ,'$position' ,'00' ,'00', '00', '$password1', '$token')";
                // Attempt to execute the prepared statement
                if ($link->query($sql) === true) {
                    // Redirect to login page
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Successfully Registered, Wait for email confirmation before login!");'; 
                    echo 'window.location.href = "i_registration.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }

                // Close statement
                mysqli_close($link);
        }
        }
    
    // Close connection
   

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
                            <span class="card__title"><center><h5>Register LWSP Staff Account</h5></center></b><br></span>
                        </div> 
                    </div> 
                </div>
                <!-- end col -->

                <div class="col-xl-2">
                    <div class="card">
                        <div class="card-border1"> 
                            <div class="p-md-5 p-2">
 
                                <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                    <div class="mb-1">
                                        <label for="position" class="form-label">Role</label>
                                        <select class="form-select" name="position" id="position" required >
                                            <option ></option>
                                            <?php                                                           
                                                    $ta_fetch_query = "SELECT roleid,rolename FROM userroles where ((roleid = '01') or (roleid = '02'))";                                                  
                                                    $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_ta["roleid"]; ?>">
                                                        <?php echo $DB_ROW_ta["rolename"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                        </select>
                                        
                                    </div>

                                    <div class="mb-1 <?php echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                        <label for="useremail" class="form-label">email address</label>
                                        <input type="email" class="form-control" id="useremail" name="useremail"  value="<?php echo $useremail; ?>">
                                        <span class="text-danger"><?php echo $useremail_err; ?></span>
                                    </div>

                                    <div class="mb-1 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label for="username" class="form-label">Enter Username</label>
                                        <input type="text" class="form-control" id="username" name="username"  value="<?php echo $username; ?>">
                                        <span class="text-danger"><?php echo $username_err; ?></span>
                                    </div>

                                    <div class="mb-1 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label for="userpassword" class="form-label">Enter Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password"  value="<?php echo $password; ?>">
                                        <span class="text-danger"><?php echo $password_err; ?></span>
                                    </div>

                                    <div class="mb-1 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                        <label for="confirm_password" class="form-label">Confirm Your Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"  value="<?php echo $confirm_password; ?>">
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