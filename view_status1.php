
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    
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

<?php
    include 'layouts/body.php';
    include 'layouts/Config.php';

    $statusMsg = '';

    $ID = $_GET["id"];

    // File upload path

    // Display status message
    echo $statusMsg;

        echo '<div id="display-image">';
            
                $query = " select filename_ from tproject_progress where recID =$ID ";
                $result = mysqli_query($link, $query);
        
                $data = mysqli_fetch_assoc($result);
                echo '<img src="./uploads/'; echo $data['filename_']; 
        echo '</div>';
?>

<body>   
    <!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>
    <?php include 'lib.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid"> 
            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:100px" VALUE="Back" onClick="history.go(-1);">  
                                    
                <div class = "col-lg-6">
                    <div class ="row">
                        <div class="card">
                            <div class="card-border">     

                                <?php
                                    echo $statusMsg;
                                    echo " ";
                                    echo '<div id="display-image">';
                                        
                                            $query = " select filename_ from tproject_progress where recID = '$ID' ";
                                            $result = mysqli_query($link, $query);
                                    
                                            $data = mysqli_fetch_assoc($result);
                                            echo '<img src="./uploads/'; echo $data['filename_']; 
                                    echo '</div>';       
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