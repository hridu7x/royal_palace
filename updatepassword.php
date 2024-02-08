<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Password</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: Poppins;
        }
        form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #f0f0f0;
            width: 350px;
            border-radius: 5px;
            padding: 20px 25px 30px 25px;
        }
        form h3{
            margin: 15px;
            color: #30475e;

        }
        form input{
            width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid #30475e;
            border-radius: 5px;
            padding: 5px;
            font-weight: 550;
            font-size: 14px;
            outline: none;
        }
        form button{
            font-weight: 550;
            font-size: 15px;
            color: white;
            background-color: #30475e;
            padding: 4px 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    <?php

    require ('admin/inc/db_config.php');

    if (isset($_GET['email']) && isset($_GET['reset_token']))
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $query = "SELECT * FROM `register_user` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND  `tokenexpired`='$date'";
        $result = mysqli_query($con, $query);

        if ($result)
        {
            if (mysqli_num_rows($result)==1)
            {
                echo "
                    <form method='POST'>
                        <h3>Create New Password</h3>
                        <input type='password' placeholder='New Password' name='Password'>
                        <button type='submit' name='updatepassword'>UPDATE</button>
                        <input type='hidden' name='email' value='$_GET[email]'>
                    </form>
                ";
            }
            else{
                echo "
                    <script>
                        alert('Expired Link!');
                        window.location.href='index.php';
                    </script>
                ";
            }
        }
        else{
            echo "
                <script>
                    alert('Try again later!');
                    window.location.href='index.php';
                </script>
            ";
        }

    }

    ?>



    <?php
        if (isset($_POST['updatepassword']))
        {
            $pass = password_hash($_POST["Password"],PASSWORD_BCRYPT);
            $update = "UPDATE `register_user` SET `password`='$pass',`resettoken`=NULL,`tokenexpired`=NULL WHERE `email`='$_POST[email]'";
            if (mysqli_query($con,$update))
            {
                echo "
                    <script>
                        alert('Password Update successfully');
                        window.location.href='index.php';
                    </script>
                ";
            }
            else{
                echo "
                    <script>
                        alert('Try again later!');
                        window.location.href='index.php';
                    </script>
                ";
            }
        }
    ?>


</body>
</html>