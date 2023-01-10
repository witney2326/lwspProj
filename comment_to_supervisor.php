<?php include 'layouts/session.php'; ?>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php"; 
//send confirmation mail
$hhmemo = $_POST['hhmemo'];

//$result = mysqli_query($link, "SELECT useremail FROM users WHERE id = '$Rec_ID'"); 
//$row = mysqli_fetch_assoc($result); 
//$usermail = $row['useremail'];
$usermail = "lilongwe.water.sanitation@gmail.com";

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
            $mail->Subject = $_SESSION["hhid"];
            $mail->Body    = $hhmemo;
            
            $mail->send();
            echo "Mail has been sent successfully!";
            echo 'history.go(-1)';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here         
    ?>
    
