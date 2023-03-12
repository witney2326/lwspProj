<?php
// Include the database configuration file
include 'layouts/Config.php';
$statusMsg = '';

$ID = $_GET["id"];

// File upload path

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

            $insert="UPDATE tproject_progress set filename_ = '$fileName' where recID=$ID";
            if ($result_set_up = $link->query($insert))
            {
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

    echo '<div id="display-image">';
        
            $query = " select filename_ from tproject_progress where recID =$ID ";
            $result = mysqli_query($link, $query);
    
            $data = mysqli_fetch_assoc($result);
            echo '<img src="./uploads/'; echo $data['filename_']; ?>">;
    </div>
?>
<body>   
   
    <form action="" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>