
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php"; 
//send confirmation mail
$Rec_ID = $_GET['id'];

$result = mysqli_query($link, "SELECT useremail FROM users WHERE id = '$Rec_ID'"); 
$row = mysqli_fetch_assoc($result); 
$usermail = $row['useremail'];

        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 1;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'comsip.org.mw';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'sysadmin@comsip.org.mw';                 
            $mail->Password   = 'x@F4?)R[N@mx';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom('lilongwe.water.sanitation@gmail.com', 'admin@LWSP');           
            $mail->addAddress($usermail);
            
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'OSS IT Platform Status';
            $mail->Body    = 'Your OSS IT Platform User Status has been Activated, You can now login to OSS IT Platform at http://wkabango-001-site1.itempurl.com';
            
            $mail->send();
            echo "Mail has been sent successfully!";
            echo 'history.go(-1)';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here

//update status
         
    
        
    $sql = mysqli_query($link,"update users  SET ustatus = '1' where id = '$Rec_ID'");
            
    if ($sql) {
        echo '<script type="text/javascript">'; 
        echo 'alert("User Activated successfully !");'; 
        echo 'window.location.href = "sysadmin1.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
            
               
    ?>
    
