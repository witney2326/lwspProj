<?php include 'layouts/session.php'; ?>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php";
    include "lib.php"; 
//send notification mail
$id=$_GET["id"];
$hhid=$_GET["hhcode"];
$sdate=$_GET["sdate"];

$result = mysqli_query($link, "SELECT cemail FROM tcontractor WHERE id = '$id'"); 
$row = mysqli_fetch_assoc($result); 
$usermail = $row['cemail'];


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
            $mail->Subject = $hhid.": OSS Works Allocation";
            $mail->Body    = "You have been allocated OSS Works: log on to http://wkabango-001-site1.itempurl.com for details";
            
            $mail->send();
            echo '<script type="text/javascript">'; 
                echo 'alert("Mail has been sent successfully!");'; 
                echo 'history.go(-1)';
            echo '</script>';
            //echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here         
    ?>
    
