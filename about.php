<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php');?>
   
    <style>
        .box:hover{
            border-top-color: #D413B1 !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

</head>
<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php');?>
      
    <div class="my-5 px-4">
        <h5 class="mt-5 pt-4 mb-3 text-center fw-bold h-font font-2">ABOUT</h5>
        
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Proudly situated on Chicago's Cultural Mile, Royal Palace is a stunning destination for today’s astute business or leisure traveler.
            <br>Modern rooms beckon with immaculate views of Lake Michigan and Grant Park and spacious marble baths. Dining experiences are thoughtful and expertly executed, taking guests on a culinary tour through the bold flavors of Barcelona at Mercat a la Planxa as well as creative craft cocktails in the restaurant's bar and lower lounge. 
            <br>Meeting spaces are poised for your next corporate event or celebration. Just outside our doors, the city calls with its epic art collections, iconic parks, and endless entertainment venues. Explore the offerings of our downtown Chicago luxury hotel below and review our full list of amenities, which include a fitness center, evening in-room dining, and more.    
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h4 class="mb-3">Our Story</h4>
                <p>Since 1910, Royal Palace has attracted celebrities, socialites, and politicians. Appropriately named “The Hotel of Presidents,” this historic Chicago hotel has hosted several heads of state, from Teddy Roosevelt to Jimmy Carter. The Astors, Rockefellers, and Vanderbilts were also frequent visitors, as were such revered icons as Lena Horne, Nat King Cole, and Rudolph Valentino.
                    <br>The hotel also had a notorious streak, favored by legendary mob bosses “Lucky” Luciano and Al Capone.
                    Despite the hotel’s years of being shuttered after a failed attempt to turn the building into a premier condominium complex, Royal Palace was revamped and reborn in the new millennium, evolving into one of the most admired hotels in Chicago, Illinois. View Royal Palace’s timeline below.
                </p>
            </div>

            <div class="col-lg-6 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/about/black.jpg" class="w-100" alt="">
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row justify-content-between align-items-center mt-5">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-2 order-md-1 order-2">
                <h4 class="mb-3">WELCOME TO OUR LUXURY HOTEL</h4>
                <p>Proudly situated on Chicago's Cultural Mile, Royal Palace is a stunning destination for today’s astute business or leisure traveler.
                    <br> Modern rooms beckon with immaculate views of Lake Michigan and Grant Park and spacious marble baths. Dining experiences are thoughtful and expertly executed, taking guests on a culinary tour through the bold flavors of Barcelona at Mercat a la Planxa as well as creative craft cocktails in the restaurant's bar and lower lounge.
                    <br> Meeting spaces are poised for your next corporate event or celebration. Just outside our doors, the city calls with its epic art collections, iconic parks, and endless entertainment venues. Explore the offerings of our downtown Chicago luxury hotel below and review our full list of amenities, which include a fitness center, evening in-room dining, and more.

                </p>
            </div>

            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-2 order-1">
                <img src="images/about/hotel-1.jpg" class="w-100" alt="">
            </div>
        </div>
    </div>




    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box fw-bold">
                    <img src="images/about/hotel.svg" width="70px">
                    <h4 class="mt-3"></h4>200+ Rooms</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box fw-bold">
                    <img src="images/about/customers.svg" width="70px">
                    <h4 class="mt-3"></h4>400+ Customer</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box fw-bold">
                    <img src="images/about/staff.svg" width="70px">
                    <h4 class="mt-3"></h4>400+ Staff</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box fw-bold">
                    <img src="images/about/rating.svg" width="70px">
                    <h4 class="mt-3"></h4>350+ Review</h4>
                </div>
            </div>
        </div>
    </div>

    
    
     <h5 class="mt-5 pt-4 mb-3 text-center fw-bold h-font font-2">Management Team</h5>
    
       
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php
                $about_r = selectAll('team_details');
                $path = ABOUT_IMG_PATH;
                while ($row = mysqli_fetch_assoc($about_r)){

                    echo<<<data
                        <div class="swiper-slide bg-light text-center overflow-hidden rounded">
                            <img src="$path$row[picture]" class="w-100" alt="">
                            <h5 class="mt-2">$row[name]</h5>
                        </div>

                    data;

                }
                ?>
               </div>
        </div>
    </div>

    <!-- Footer -->

    <?php require('inc/footer.php');?>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
        
        spaceBetween: 40,
        loop: true,
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