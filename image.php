<!DOCTYPE html>
<html>
   
<head>
    <title>Image Upload</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />

        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            #content{
                width: 50%;
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                border: 1px solid #cbcbcb;
            }
            form{
                width: 50%;
                margin: 20px auto;
            }
            
            #display-image{
                width: 100%;
                justify-content: center;
                padding: 5px;
                margin: 15px;
            }
            img{
                margin: 5px;
                width: 350px;
                height: 250px;
            }
        </style>
    </head>

 <body>   
   
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>

    <div id="display-image">
        <?php
        include 'layouts/Config.php';
            $query = " select filename_ from tproject_progress where recID ='14' ";
            $result = mysqli_query($link, $query);
    
            while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./uploads/<?php echo $data['filename_']; ?>">
    
        <?php
            }
        ?>
    </div>
</body>
 
</html>