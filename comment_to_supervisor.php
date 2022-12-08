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
            $mail->SMTPDebug = 2;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'mail.comsip.org.mw';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'wkabango@comsip.org.mw';                 
            $mail->Password   = 'G08N6aXLN%Gu';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom('wkabango@comsip.org.mw', 'admin@LWSP');           
            $mail->addAddress($usermail);
            
            
            $mail->isHTML(true);                                  
            $mail->Subject = $_SESSION["hhid"];
            $mail->Body    = $hhmemo;
            
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here         
    ?>
    
