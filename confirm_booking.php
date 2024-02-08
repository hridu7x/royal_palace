<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
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



<?php

    global$setting_q;
    if (!isset($_GET['id']) || $setting_q['shutdown']==true){
        redirect('rooms.php');
    }
    else if (!(isset($_SESSION['login']) && $_SESSION['login'])){
        redirect('rooms.php');
    }

    $data = filter($_GET);

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if (mysqli_num_rows($room_res)==0){
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);

    global$setting_q,$con;

    $_SESSION['room']=[
      "id" => $room_data['id'],
      "name" => $room_data['name'],
      "price" => $room_data['price'],
      "payment" => null,
      "available" => false,
    ];

    $user_res = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']],"i");
    $user_data = mysqli_fetch_assoc($user_res);

?>



<div class="container">
    <div class="row">

        <div class="col-12 my-5 mb-4 px-4">
            <h2 class="mt-5 pt-4 mb-3 fw-bold">CONFIRM BOOKING</h2>
            <div style="font-size: 14px;">
                <a href="index.php" class="text-secondary text-decoration-none">Home</a>
                <span class="text-secondary"> > </span>
                <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a>
                <span class="text-secondary"> > </span>
                <a href="#" class="text-secondary text-decoration-none">Confirm</a>

            </div>
        </div>

        <div class="col-lg-7 col-md-12 px-4">

            <?php
                $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                                WHERE `room_id`='$room_data[id]' 
                                AND `thumb`='1'");


                if(mysqli_num_rows($thumb_q)>0){
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                }

                echo<<<data
                    <div class="card p-3 shadow-sm rounded">
                        <img src="$room_thumb" class="img-fluid rounded mb-3">
                        <h5>$room_data[name]</h5>
                        <h5>৳$room_data[price] per night</h5>
                    </div>
                data;


            ?>

        </div>

        <div class="col-lg-5 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <form action="stripe_payment.php" method="POST" name="cardpayment" id="booking_form">
                        <h6 class="mb-3">BOOKING DETAILS</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" value="<?php echo $user_data['name']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="phonenum" type="number" value="<?php echo $user_data['phonenum']?>" class="form-control shadow-none" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" value="<?php echo $user_data['email']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" type="text" rows="1" class="form-control shadow-none" required><?php echo $user_data['address']?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Check-in</label>
                                <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Check-out</label>
                                <input name="checkout" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                            </div>
                            <input name="price" id="priceAdd" type="hidden" value="0" class="form-control shadow-none" required>
                            <div class="col-12">
                                <div class="spinner-border text-info mb-3 d-none" role="status" id="info_loader">
                                    <span class="visually-hidden">Loading...</span>
                                </div>

                                <h6 class="mb-3 text-danger" id="pay_info">Provide check-in & check-out date!</h6>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="cardNumber">CARD NUMBER</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control shadow-none" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class="visible-xs-inline">MON</span></label>
                                            <select name="card_exp_month" id="card_exp_month" class="form-control shadow-none" data-stripe="exp_month" required>
                                                <option>MON</option>
                                                <option value="01">01 ( JAN )</option>
                                                <option value="02">02 ( FEB )</option>
                                                <option value="03">03 ( MAR )</option>
                                                <option value="04">04 ( APR )</option>
                                                <option value="05">05 ( MAY )</option>
                                                <option value="06">06 ( JUN )</option>
                                                <option value="07">07 ( JUL )</option>
                                                <option value="08">08 ( AUG )</option>
                                                <option value="09">09 ( SEP )</option>
                                                <option value="10">10 ( OCT )</option>
                                                <option value="11">11 ( NOV )</option>
                                                <option value="12">12 ( DEC )</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class="visible-xs-inline">YEAR</span></label>
                                            <select name="card_exp_year" id="card_exp_year" class="form-control shadow-none" data-stripe="exp_year">
                                                <option>Year</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                                <option value="27">2027</option>
                                                <option value="28">2028</option>
                                                <option value="29">2029</option>
                                                <option value="30">2030</option>
                                                <option value="31">2031</option>
                                                <option value="32">2032</option>
                                                <option value="33">2033</option>
                                                <option value="34">2034</option>
                                                <option value="35">2035</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-4 mb-2 col-md-4 pull-right">
                                        <div class="form-group">
                                            <label for="cardCVC">CV CODE</label>
                                            <input type="password" class="form-control shadow-none" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
                                        </div>
                                    </div>
                                </div>

                                <button name="pay_now" class="btn w-100 text-white bg-dark shadow-none mb-1" disabled>Pay Now</button>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Footer -->

<?php require('inc/footer.php');?>

    <script>
        let booking_form = document.getElementById('booking_form')
        let info_loader = document.getElementById('info_loader')
        let pay_info = document.getElementById('pay_info')

        function check_availability(){
            let checkin_val = booking_form.elements['checkin'].value;
            let checkout_val = booking_form.elements['checkout'].value;


             booking_form.elements['pay_now'].setAttribute('disabled',true);

             if (checkin_val!='' && checkout_val!='')
             {
                 pay_info.classList.add('d-none');
                 pay_info.classList.replace('text-dark','text-danger');
                 info_loader.classList.remove('d-none');

                 let data = new FormData();

                 data.append('check_availability','');
                 data.append('check_in',checkin_val);
                 data.append('check_out',checkout_val);
                 data.append('price',checkout_val);


                 let xhr = new XMLHttpRequest();
                 xhr.open("POST","ajax/confirm_booking.php",true);


                 xhr.onload = function (){
                     let data = JSON.parse(this.responseText);

                     if (data.status == 'check_in_out_equal'){
                         pay_info.innerText = "You cannot check-out on the same day!";
                     }
                     else if (data.status == 'check_out_earlier'){
                         pay_info.innerText = "Check-out date earlier than Check-in date!";
                     }
                     else if (data.status == 'check_in_earlier'){
                         pay_info.innerText = "Check-in date earlier than Todays date!";
                     }
                     else if (data.status == 'unavailable'){
                         pay_info.innerText = "Room not available this Check-in date!";
                     }
                     else {

                         pay_info.innerHTML = "No. of Days: "+data.days+"<br>Total amount to Pay: ৳"+data.payment;
                         pay_info.classList.replace('text-danger','text-dark');
                         booking_form.elements['pay_now'].removeAttribute('disabled');
                     }
                     document.getElementById('priceAdd').value = data.payment
                     pay_info.classList.remove('d-none');
                     info_loader.classList.add('d-none');
                 }
                 xhr.send(data);
             }

        }
    </script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>


<script>
    // Set your publishable key
    Stripe.setPublishableKey('pk_test_51OGLv3HX0UI3JzFAzA88EMz9D0adYoJkYabEIPlhhY5ebpBK9eZcAOIrC3uVAwsXskUsLZkkNxd8pSgabtIHA3Yd00GNifpbV4');


    // Callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            // Enable the submit button
            $('#pay_now').removeAttr("disabled");
            // Display the errors on the form
            $(".payment-status").html('<p>'+response.error.message+'</p>');
        } else {
            var form$ = $("#booking_form");
            // Get token id
            var token = response.id;
            // Insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            // Submit form to the server
            form$.get(0).submit();
        }
    }

    $(document).ready(function() {
        // On form submit
        $("#booking_form").submit(function() {
            // Disable the submit button to prevent repeated clicks
            $('#pay_now').attr("disabled", "disabled");

            // Create single-use token to charge the user
            Stripe.createToken({
                number: $('#card_number').val(),
                exp_month: $('#card_exp_month').val(),
                exp_year: $('#card_exp_year').val(),
                cvc: $('#card_cvc').val()
            }, stripeResponseHandler);

            // Submit from callback
            return false;
        });
    });
</script>


</body>
</html>