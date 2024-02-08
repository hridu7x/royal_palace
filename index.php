<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Palace</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php');?>


    <style>
        .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form{
                margin-top: 20px;
                padding: 0 35px;
            }
        }
    </style>


</head>
<body class="bg-light">

        <!-- Navbar -->
        <?php require('inc/header.php');?>

        <!-- Carousel -->

        <section>
            <div class="container-fluid px-lg-4 mt-4">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        <?PHP
                        $res = selectAll('carousel');

                        while ($row = mysqli_fetch_assoc($res))
                        {
                            $path= CAROUSEL_IMG_PATH;
                            echo <<<data
                                <div class="swiper-slide">
                                    <img src="$path$row[image]" class="w-100 d-block" />
                                </div>
                            data;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Check availability form -->

        <section>
            <div class="container availability-form">
                <div class="row">
                    <div class="col-lg-12 bg-white shadow p-4 rounded">
                        <h5 class="mb-4">Check Booking Availability</h5>

                        <form action="rooms.php">
                            <div class="row align-items-end">
                                <div class="col-lg-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="font-weight:500;">Check In</label>
                                        <input type="date" class="form-control shadow-none" name="checkin" required>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="font-weight:500;">Check Out</label>
                                        <input type="date" class="form-control shadow-none" name="checkout" required>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="font-weight:500;">Adult</label>
                                        <select class="form-select shadow-none" name="adult">

                                            <?php
                                                $guests_q = mysqli_query($con,"SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` FROM `rooms` WHERE `status`='1' AND `removed`='0'");

                                                $guests_res = mysqli_fetch_assoc($guests_q);

                                                for ($i=1; $i<=$guests_res['max_adult']; $i++){
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="font-weight:500;">Children</label>
                                        <select class="form-select shadow-none" name="children">
                                           <?php
                                               for ($i=1; $i<=$guests_res['max_children']; $i++){
                                                   echo "<option value='$i'>$i</option>";
                                               }
                                           ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="check_availability">
                                <div class="col-lg-1 mb-lg-3 mb-3">
                                    <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    <!-- Rooms -->

    <section class="our-rooms ">
        <h5 class="mt-5 pt-4 mb-4 text-center fw-bold h-font font-size">OUR ROOMS</h5>

        <div class="container">
            <div class="row">

                <?php
                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

                while ($room_data = mysqli_fetch_assoc($room_res))
                {
                    //get features of room

                    $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                                INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                                WHERE rfea.room_id = '$room_data[id]' ORDER BY `id`DESC LIMIT 5");

                    $features_data = "";
                    while ($fea_row = mysqli_fetch_assoc($fea_q))
                    {
                        $features_data.="<span class='badge bg-light text-dark text-warp me-1 mb-1'>
                                $fea_row[name]
                                </span>";

                    }

                    //get facilities of room
                    $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                                INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                                WHERE rfac.room_id = '$room_data[id]' ORDER BY `id`DESC LIMIT 5");

                    $facilities_data = "";

                    while ($fac_row = mysqli_fetch_assoc($fac_q))
                    {
                        $facilities_data.="<span class='badge bg-light text-dark text-warp me-1 mb-1'>
                                $fac_row[name]
                                </span>";

                    }

                    //get thumbnail of image

                    $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                    $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                            WHERE `room_id`='$room_data[id]' 
                            AND `thumb`='1'");


                    if(mysqli_num_rows($thumb_q)>0){
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                    }


                    $book_btn = "";
                    global$setting_q;
                    $login = 0;

                    if (!$setting_q['shutdown']){
                        if (isset($_SESSION['login']) && $_SESSION['login']){
                            $login=1;
                        }
                        $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white bg-2 shadow-none'>Book Now</button>";
                    }

                    // print room card

                    echo<<<data
                            
                            <div class="col-lg-4 col-md-6 my-3">
                                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                    <img src="$room_thumb" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5>$room_data[name]</h5>
                                        <h6 class="mb-4">৳$room_data[price] Every Night</h6>
                                        <div class="features mb-4">
                                            <p class="mb-1">Room Features</p>
                                            $features_data
                                        </div>
                                        
                                        <div class="facilities mb-4">
                                            <p class="mb-1">Room Facilities</p>
                                            $facilities_data 
                                        </div>
                                        
                                        <div class="guests mb-4">
                                            <p class="mb-1">Guests</p>
                                            <span class="badge bg-light text-dark text-warp">
                                                $room_data[adult] Adult
                                            </span>
                                            <span class="badge bg-light text-dark text-warp">
                                                $room_data[children] Children
                                            </span>
                                        </div>
                                        
                                        <div class="d-flex justify-content-evenly mb-2">
                                            $book_btn
                                            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm text-white bg-3 shadow-none">More Details</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            data;

                }
                ?>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
            </div>
        </div>
    </section>


    <!-- Facilities -->

    <section>
        <h5 class="mt-5 pt-4 mb-4 text-center fw-bold h-font font-size">OUR FACILITIES</h5>

        <div class="container">
            <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">

                <?php
                $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id`DESC LIMIT 5");
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                    echo<<<data
                    
                    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-4">
                        <img src="$path$row[icon]" width="60px">
                        <h5 class="mt-3">$row[name]</h5>
                    </div>
                    data;
                }
                ?>

            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
            </div>
        </div>
    </section>


    <!-- Testimonial -->

<!--    <section>-->
<!--        <h5 class="mt-5 pt-4 mb-4 text-center fw-bold h-font font-size">TESTIMONIALS</h5>-->
<!---->
<!--        <div class="container mt-5">-->
<!--            <div class="swiper swiper-testimonials">-->
<!--                <div class="swiper-wrapper mb-5">-->
<!--                    <div class="swiper-slide bg-white p-4">-->
<!--                        <div class="profile d-flex align-items-center mb-3">-->
<!--                            <img src="images/facilities/IMG_96423.svg" alt="" width="30px">-->
<!--                            <h6 class="m-0 ms-2">Rendom User</h6>-->
<!--                        </div>-->
<!--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.-->
<!--                            Nam nulla molestiae distinctio rerum aliquam eaque praesentium -->
<!--                            vitae sequi delectus dignissimos.-->
<!--                        </p>-->
<!---->
<!--                        <div class="rating mb-4">-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="swiper-slide bg-white p-4">-->
<!--                        <div class="profile d-flex align-items-center mb-3">-->
<!--                            <img src="images/facilities/IMG_96423.svg" alt="" width="30px">-->
<!--                            <h6 class="m-0 ms-2">Rendom User</h6>-->
<!--                        </div>-->
<!--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.-->
<!--                            Nam nulla molestiae distinctio rerum aliquam eaque praesentium -->
<!--                            vitae sequi delectus dignissimos.-->
<!--                        </p>-->
<!---->
<!--                        <div class="rating mb-4">-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="swiper-slide bg-white p-4">-->
<!--                        <div class="profile d-flex align-items-center mb-3">-->
<!--                            <img src="images/facilities/IMG_96423.svg" alt="" width="30px">-->
<!--                            <h6 class="m-0 ms-2">Rendom User</h6>-->
<!--                        </div>-->
<!--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.-->
<!--                            Nam nulla molestiae distinctio rerum aliquam eaque praesentium -->
<!--                            vitae sequi delectus dignissimos.-->
<!--                        </p>-->
<!---->
<!--                        <div class="rating mb-4">-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="swiper-slide bg-white p-4">-->
<!--                        <div class="profile d-flex align-items-center mb-3">-->
<!--                            <img src="images/facilities/IMG_96423.svg" alt="" width="30px">-->
<!--                            <h6 class="m-0 ms-2">Rendom User</h6>-->
<!--                        </div>-->
<!--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.-->
<!--                            Nam nulla molestiae distinctio rerum aliquam eaque praesentium -->
<!--                            vitae sequi delectus dignissimos.-->
<!--                        </p>-->
<!---->
<!--                        <div class="rating mb-4">-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="swiper-slide bg-white p-4">-->
<!--                        <div class="profile d-flex align-items-center mb-3">-->
<!--                            <img src="images/facilities/IMG_96423.svg" alt="" width="30px">-->
<!--                            <h6 class="m-0 ms-2">Rendom User</h6>-->
<!--                        </div>-->
<!--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.-->
<!--                            Nam nulla molestiae distinctio rerum aliquam eaque praesentium -->
<!--                            vitae sequi delectus dignissimos.-->
<!--                        </p>-->
<!---->
<!--                        <div class="rating mb-4">-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="swiper-slide bg-white p-4">-->
<!--                        <div class="profile d-flex align-items-center mb-3">-->
<!--                            <img src="images/facilities/IMG_96423.svg" alt="" width="30px">-->
<!--                            <h6 class="m-0 ms-2">Rendom User</h6>-->
<!--                        </div>-->
<!--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.-->
<!--                            Nam nulla molestiae distinctio rerum aliquam eaque praesentium -->
<!--                            vitae sequi delectus dignissimos.-->
<!--                        </p>-->
<!---->
<!--                        <div class="rating mb-4">-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                            <i class="bi bi-star-fill text-warning"></i>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                    <div class="swiper-pagination"></div>-->
<!--            </div>-->
<!--                <div class="col-lg-12 text-center mt-5">-->
<!--                    <a href="about.php" class="btn btn-sm btn-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>-->
<!--                </div>-->
<!--        </div>-->
<!---->
<!--    </section>-->

    <!-- Reach Us -->



    <section>
        <h5 class="mt-5 pt-4 mb-4 text-center fw-bold h-font font-size">REACH US</h5>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 bg-6 p-4 mb-lg-0 mb-3  rounded">
                    <iframe class="w-100" height="320px" src="<?php echo $contact_r['iframe']?>" loading="lazy">
                    </iframe>
                </div>
                <div class="col-lg-4 col-md-4 p-4 mb-lg-0 mb-3 rounded">
                    <h class="text-dark mt-5 pt-4 mb-4 text-center fw-bold h-font font-1">
                        A Standout Location on Michigan Avenue
                    </h>

                    <p class="text-dark mb-3 text-left mt-4">This unassuming hotel is 3 km from the Bangladesh National Museum, and 4 km from both the 12th-century Dhakeshwari Temple and the 17th-century Lalbagh Fort.
                        No-nonsense rooms and suites offer satellite TV. Some have air conditioning. Room service is available 24/7.
                        Amenities consist of a prayer room, a business centre and a 24-hour restaurant, as well as a meeting room and a barber shop. Parking is available. <br>
                    </p>
                </div>
            </div> 
        </div>
    </section>

    <!-- Footer -->

    <?php require('inc/footer.php');?>



   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


    <script>
        var swiper = new Swiper(".mySwiper",
        {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
            
        });

        var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
         el: ".swiper-pagination",
        },
        breakpoints:{
        320: {
            slidesPerView: 1,
        },

        640: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
        },

        1024: {
            slidesPerView: 3,
        },
      }
    });
  </script>
</body>
</html>