<?php include 'layouts/session.php'; ?>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php"; 
//send confirmation mail
$hhmemo = $_POST['hhmemo'];

$usermail = "lwsp@oss-lwsp.net";

$sql2 = mysqli_query($link, "SELECT cmail,chost,cpass FROM tconfig"); 
$rw = mysqli_fetch_assoc($sql2); 
$chost = $rw['chost'];
$cmail = $rw['cmail'];
$cpass = $rw['cpass'];

        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 1;                                       
            $mail->isSMTP();                                            
            $mail->Host       = $chost;                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = $cmail;                 
            $mail->Password   = $cpass;                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom($cmail, 'Household');            
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
    
