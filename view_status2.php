<!DOCTYPE html>
<html>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<head>
	<title>Pictorial Progress</title>
	
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php if ($_SESSION["userrole"] == "04"){include 'layouts/vertical-menu_con.php';}else{include 'layouts/menu.php';}?>
    <?php include 'layouts/config.php'; ?>
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
        .card-border1 
        {
            border-style: solid;
            border-color: orange;
            border-width: 4px;
            background-color:greenyellow;
            
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<body>
<div id="layout-wrapper">


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">



    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-7">
                    <h4 class="mb-sm-0 font-size-18">OSS Works Pictorial Progress</h4>
                    <p align="right">
                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                    </p>
                </div>
            </div>
	
            <div class = "col-lg-7">
                <div class ="row">
                    <div class="card">
                        <div class="card-border">  
                            <div id="display-image">
                                <?php
                                    $ID = $_GET["id"];
                                    $query = " select filename_ from tproject_progress where recID = $ID";
                                    $result = mysqli_query($link, $query);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <img src="./uploads/<?php echo $data['filename_']; ?>" height=450 width=600>

                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
