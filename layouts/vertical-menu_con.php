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
        background-image: url('icons/settings1.png');
        background-repeat: no-repeat;
        }
        .ico-settings { background-position: 0 0; }

    .dollar {
        display: inline-block;
        width: 18px; height: 18px;
        background-image: url('icons/dollar1.png');
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
</style>
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
        
            <div class="navbar-brand-box">
                <a href="index_con.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="index_con.php" class="logo logo-light">
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

            <!-- App Search-->

            <div>
                <span><h2><b>Lilongwe Water and Sanitation Project</h2></b></span>
            </div>


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">

            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo lcfirst($_SESSION["username"]); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo $language["Logout"]; ?></span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog "></i>
                </button>
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
                <li class="menu-title" key="t-menu"><?php echo $language["Menu"]; ?></li>

                <li>
                    <a href="index_con.php" class="waves-effect">
                        <i class="home ico-home"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                    
                </li>

                <li>
                    <a href="register_beneficiary.php" class="waves-effect">
                        <i class="users ico-users"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Register and Target</span>
                    </a>
                    
                </li>

                <li>
                    <a href="works_tracking_con.php" class="waves-effect">
                        <i class="chart ico-chart"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Allocated OSS Works</span>
                    </a>
                    
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->