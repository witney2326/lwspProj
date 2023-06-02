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
$result = mysqli_query($link, "SELECT pvalue FROM app_parameters WHERE id = '05'"); 
$row = mysqli_fetch_assoc($result); 
$usermail = $row['pvalue'];

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
        
            $mail->setFrom($cmail, 'Admin');           
            $mail->addAddress($usermail);
            
            
            $mail->isHTML(true);                                  
            $mail->Subject = $_SESSION["hhid"];
            $mail->Body    = $hhmemo;
            
            $mail->send();
            echo '<script type="text/javascript">'; 
                echo 'alert("Mail has been sent successfully!");'; 
                echo 'history.go(-1)';
            echo '</script>';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here                 
    ?>
    
