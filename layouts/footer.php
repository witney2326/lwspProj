<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <?php include_once 'layouts/config.php';
                $result = mysqli_query($link, "SELECT pvalue FROM app_parameters where id = '02'"); 
                $row = mysqli_fetch_assoc($result); 
                $pvalue = $row['pvalue'];
            ?>
                <script>document.write(new Date().getFullYear())</script> ©<?php echo $pvalue?>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                <a href="mailto:admin@cimis.tech"> Developed by Wilok Concepts</a>
                </div>
            </div>
        </div>
    </div>
</footer>