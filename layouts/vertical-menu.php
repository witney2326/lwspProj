<style>
    .navbar-header {
        background-color: orange !important;
        border: none !important;
        border-width:0!important;
    }
    .users {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/users1.png');
        background-repeat: no-repeat;
        }
        .ico-users { background-position: 0 0; }

        .settings {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/settings.png');
        background-repeat: no-repeat;
        }
        .ico-settings { background-position: 0 0; }

        .dollar {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/dollars.png');
        background-repeat: no-repeat;
        }
        .ico-dollar { background-position: 0 0; }

        .chart {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/chart1.png');
        background-repeat: no-repeat;
        }
        .ico-chart { background-position: 0 0; }

        .report {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/report1.png');
        background-repeat: no-repeat;
        }
        .ico-report { background-position: 0 0; }

        .service {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/service.png');
        background-repeat: no-repeat;
        }
        .ico-service { background-position: 0 0; }

        .home {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/home.png');
        background-repeat: no-repeat;
        }
        .ico-home { background-position: 0 0; }

        .page {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/page.png');
        background-repeat: no-repeat;
        }
        .ico-page { background-position: 0 0; }

        .down {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/down1.png');
        background-repeat: no-repeat;
        }
        .ico-down { background-position: 0 0; }
        
</style>
<header id="page-topbar">

    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
        
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <div class="row mb-3">
                </div>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="66">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            
            <div class = "row">
                <?php include_once 'layouts/config.php';
                    $result = mysqli_query($link, "SELECT pvalue FROM app_parameters where id = '01'"); 
                    $row = mysqli_fetch_assoc($result); 
                    $pvalue = $row['pvalue'];
                ?>
                <br></br><br></br>
                <div class="row mb-3">
                </div>
                <span><h2><b><?php echo" "; echo $pvalue;?></h2></span>
            </div>


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo lcfirst($_SESSION["username"]); ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo $language["Logout"]; ?></span></a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li ></li>
                <div class="row mb-3">
                </div>
                <li>
                    <a href="index_check.php" class="waves-effect">
                        <i class="home ico-home" ></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                    
                </li>
                <?php
                    if ($_SESSION["userrole"] == '01')
                    {
                        echo '<li>';
                                echo '<a href="sysadmin1.php" class="waves-effect">';
                                echo  '<i class="settings ico-settings" style="color:orangered;font-size:small;"></i><span class="badge rounded-pill bg-info float-end"></span>';
                                echo '<span key="t-dashboards"><b>System Admin</b></span>';
                            echo '</a>';
                        echo '</li>';
                    }
                ?>

                <li>
                    <a href="register_beneficiary.php" class="waves-effect">
                        <i class="users ico-users" ></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Register and Target</span>
                    </a>
                    
                </li>

                <li>
                    <a href="request_for_service.php" class="waves-effect">
                    <i class="service ico-service"style="font-size:small;"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Request for Service</span>
                    </a>
                </li>

                <li>
                    <a href="contribute_for_service_payments.php" class="waves-effect">
                    <i class="dollar ico-dollar"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Contribute for Service</span>
                    </a>
                    
                </li>
           
                <li>
                    <a href="works_tracking.php" class="waves-effect">
                        <i class="chart ico-chart"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">OSS Works</span>
                    </a>
                    
                </li>

                <li>
                   
                    <a href="basicReports.php" class="waves-effect">
                    <i class="report ico-report" style="color:blue;font-size:small;"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards"> Project Reports</span>
                    </a>
                    
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->