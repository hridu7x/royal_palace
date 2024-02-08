<?php
    require ('admin/inc/db_config.php');
    require ('admin/inc/essentials.php');

use PHPMailer\inc\PHPMailer\Exception;
use PHPMailer\inc\PHPMailer\PHPMailer;

function sendMail($email, $reset_token)
    {
        require ("PHPMailer/PHPMailer.php");
        require ("PHPMailer/SMTP.php");
        require ("PHPMailer/Exception.php");

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'theblackstonex@gmail.com';                     //SMTP username
            $mail->Password   = 'tzpwcklwshsfaotx';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('theblackstonex@gmail.com', 'Royal Palace');
            $mail->addAddress($email);

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password reset link from Royal Palace';
            $mail->Body    = "Password reset link! <br>
                      Click the link below to verify create new Password
                      <a href='".SITE_URL."updatepassword.php?email=$email&reset_token=$reset_token"."'>Reset Password</a>";

            $mail->send();
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }

    }

    if (isset($_POST['send-reset']))
    {
        $query = "SELECT * FROM `register_user` WHERE `email`='$_POST[email]'";

        $result = mysqli_query($con,$query);
        if ($result)
        {
            if (mysqli_num_rows($result)==1)
            {
                $reset_token = bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d");
                $query ="UPDATE `register_user` SET `resettoken`='$reset_token',`tokenexpired`='$date' WHERE `email`='$_POST[email]'";
                if (mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
                {
                    echo "
                        <script>
                            alert('Password reset link send to mail!');
                            window.location.href='index.php';
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('Try again later!');
                            window.location.href='index.php';
                        </script>
                    ";
                }
            }
            else{
                echo "
                    <script>
                        alert('Email not found!');
                        window.location.href='index.php';
                    </script>
                ";
            }
        }
        else{
            echo "
                <script>
                    alert('Invalid Email');
                    window.location.href='index.php';
                </script>
            ";
        }
    }
?>