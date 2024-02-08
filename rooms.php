<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
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
    <?php
    require('inc/header.php');


    $checkin_default = "";
    $checkout_default = "";
    $adult_default = "";
    $children_default = "";

    if (isset($_GET['check_availability']))
    {
        $frm_data = filter($_GET);

        $checkin_default = $frm_data['checkin'];
        $checkout_default = $frm_data['checkout'];
        $adult_default = $frm_data['adult'];
        $children_default = $frm_data['children'];
    }

    ?>
      
    <div class="my-5 px-4">
        <h5 class="mt-5 pt-4 mb-3 text-center fw-bold h-font font-2">ROOMS</h5>
        
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                        <div class="container-fluid flex-lg-column align-items-stretch">
                            <h4 class="mt-2">FILTERS</h4>
                            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse flex-column align-items-stretch" id="filterDropdown">
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class=" d-flex align-items-center justify-content-between mb-3" style="font-size: 18px;">
                                        <span>Check Availability</span>
                                        <button id="chl_avail_btn" onclick="chk_avail_clear()" class="btn btn-secondary shadow-none d-none">Reset</button>
                                    </h5>
                                        <label class="form-label mt-3">Check In</label>
                                        <input type="date" class="form-control shadow-none mb-3" value="<?php echo $checkin_default?>" id="checkin" onchange="chk_avail_filter()">
                                        <label class="form-label">Check Out</label>
                                        <input type="date" class="form-control shadow-none" value="<?php echo $checkout_default?>" id="checkout" onchange="chk_avail_filter()">
                                </div>

<!--                                <div class="border bg-light p-3 rounded mb-3">-->
<!--                                    <h5 class="mb-3" style="font-size: 18px;"></h5>FACILITIES</h5>-->
<!--                                    <div class="mb-2 mt-2">-->
<!--                                        <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">-->
<!--                                        <label class="form-check-label" for="f1">Facility One</label>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="mb-2 mt-2">-->
<!--                                        <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">-->
<!--                                        <label class="form-check-label" for="f2">Facility Two</label>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="mb-2 mt-2">-->
<!--                                        <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">-->
<!--                                        <label class="form-check-label" for="f3">Facility Three</label>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class=" d-flex align-items-center justify-content-between mb-3" style="font-size: 18px;">
                                        <span>GUESTS</span>
                                        <button id="guests_btn" onclick="guests_clear()" class="btn btn-secondary shadow-none d-none">Reset</button>
                                    </h5>
                                    <div class="d-flex">
                                        <div class="me-3 mt-2">
                                            <label class="form-label">Adult</label>
                                            <input type="number" min="1" value="<?php echo $adult_default?>" id="adults" oninput="guests_filter()" class="form-control shadow-none">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label">Children</label>
                                            <input type="number" min="1" value="<?php echo $children_default?>" id="children" oninput="guests_filter()" class="form-control shadow-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4" id="rooms-data">

            </div>

        </div>
    </div>


    <script>

        let rooms_data = document.getElementById('rooms-data');
        let checkin = document.getElementById('checkin');
        let checkout = document.getElementById('checkout');
        let chl_avail_btn = document.getElementById('chl_avail_btn');


        let adults = document.getElementById('adults');
        let children = document.getElementById('children');
        let guests_btn = document.getElementById('guests_btn');

        function fetch_rooms()
        {
            let chk_avail = JSON.stringify({
                checkin: checkin.value,
                checkout: checkout.value
            });

            let guests = JSON.stringify({
                adults: adults.value,
                children: children.value
            });

            let xhr = new XMLHttpRequest();
            xhr.open("GET","ajax/rooms.php?fetch_rooms&chk_avail="+chk_avail+"&guests="+guests,true);

            xhr.onprogress = function ()
            {
                rooms_data.innerHTML = `<div class="spinner-border text-info mb-3 d-block mx-auto" role="status" id="info_loader">
                    <span class="visually-hidden">Loading...</span>
                </div>`
            }

            xhr.onload = function (){
                rooms_data.innerHTML = this.responseText;
            }
            xhr.send();
        }

        function chk_avail_filter(){
            if (checkin.value!=''&& checkout.value !=''){
                fetch_rooms();
                chl_avail_btn.classList.remove('d-none');
            }
        }


        function chk_avail_clear(){
            checkin.value='';
            checkout.value='';
            chl_avail_btn.classList.add('d-none');
            fetch_rooms();
        }

        function guests_filter(){
            if (adults.value>0 || children.value>0){
                fetch_rooms();

                guests_btn.classList.remove('d-none');
            }
        }

        function guests_clear(){
            adults.value = '';
            children.value = '';
            fetch_rooms();
            guests_btn.classList.add('d-none');
        }

        window.onload = function (){
            fetch_rooms();
        }

    </script>
       

    <!-- Footer -->

    <?php require('inc/footer.php');?>

</body>
</html>