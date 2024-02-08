<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
    <?php require('inc/header.php');?>
      
    <div class="my-5 px-4">
        <h5 class="mt-5 pt-4 mb-3 text-center fw-bold h-font font-2">CONNECT US</h5>
        
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Contact Royal Palace to learn more about our luxurious accommodations, stunning event space, and on-site amenities and services.
        <br>Discover one of the best Michigan Avenue Chicago hotels today.
        </p>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-mb-6 mb-2 px-4 mt-4">
                    <div class=" bg-white rounded shadow p-4">
                        <iframe class="w-100 mb-4" height="320px" src="<?php echo $contact_r['iframe']?>" loading="lazy">
                        </iframe>
                        <h5>Address</h5>
                        <a href="<?php echo $contact_r['gmap']?>" target="_blank" class="d-inline-block text-decoration-none mb-2 text-dark">
                            <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address']?>
                        </a>

                        <div class=" text-dark p-2 rounded mb-2">
                            <h5>Contact Us</h5>
                            <a href="tel: +<?php echo $contact_r['pn-1']?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                                <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn-1']?>
                            </a>
                            <br>
                            <a href="tel: +<?php echo $contact_r['pn-2']?>" class="d-inline-block text-dark mb-2 text-decoration-none">
                                <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn-2']?>
                            </a>
                                <br>
                            <a href="mailto: <?php echo $contact_r['email']?>" class="d-inline-block mb-3 me-2">
                                <span class="d-inline-block text-dark text-decoration-none fs-6">
                                    <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email']?>
                                </span>
                            </a>
                            <br>
                            <a href="<?php echo $contact_r['tw']?>" class="d-inline-block mb-3 me-2">
                                <span class="badge bg-dark text-white fs-6 p-2">
                                    <i class="bi bi-twitter-x"></i>
                                </span>
                            </a>

                            <a href="<?php echo $contact_r['fb']?>" class="d-inline-block mb-3 me-2">
                                <span class="badge bg-dark text-white fs-6 p-2">
                                    <i class="bi bi-facebook"></i>
                                </span>
                            </a>

                            <a href="<?php echo $contact_r['insta']?>" class="d-inline-block mb-3 me-2">
                                <span class="badge bg-dark text-white fs-6 p-2">
                                    <i class="bi bi-instagram"></i>
                                </span>
                            </a>

                            <a href="<?php echo $contact_r['li']?>" class="d-inline-block">
                                <span class="badge bg-dark text-white fs-6 p-2">
                                    <i class="bi bi-linkedin"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-mb-6 mb-2 px-4 mt-4">
                    <form method="POST">
                        <div class=" bg-white rounded shadow p-4">
                            <form>
                                <h5>Send a message</h5>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" required type="text" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input name="email" required type="email" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input name="subject" required type="text" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" required type="text" class="form-control shadow-none" rows="5" style="resize:none"></textarea>
                                </div>
                                    <button type="submit" name="send" class="btn bg-dark text-white mb-lg-2 mt-2 shadow-none me-3">SEND</button>
                            </form>
                        </div>
                    </form>
                </div>
        </div>
    </div>


    <?php
        if (isset($_POST['send']))
        {
            $frm_data = filter($_POST);

            $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

            $res = insert($q,$values,'ssss');

            if ($res==1){
                alert('success', 'Mail send!');
            }
            else{
                alert('Error','Try again later!');
            }
        }
    ?>
       

    <!-- Footer -->

    <?php require('inc/footer.php');?>

</body>
</html>