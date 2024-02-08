<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php');?>

    <style>
        .font-b{
            font-family: 'Times New Roman', Times, serif;
        }

    </style>
</head>
<body class="bg-light">

<!-- Navbar -->
<?php require('inc/header.php');

    if (!(isset($_SESSION['login']) && $_SESSION['login'])){
    redirect('index.php');
}
?>




<div class="container">
    <div class="row">

        <div class="col-12 my-5 px-4">
            <h2 class="mt-5 pt-4 mb-3 fw-bold"> BOOKINGS</h2>
            <div style="font-size: 14px;">
                <a href="index.php" class="text-secondary text-decoration-none">Home</a>
                <span class="text-secondary"> > </span>
                <a href="#" class="text-secondary text-decoration-none">Booking</a>
            </div>
        </div>

        <?php

            $query = "SELECT * FROM `payment` WHERE `id`=?";

        ?>

    </div>
</div>





<!-- Footer -->

<?php require('inc/footer.php');?>

</body>
</html>