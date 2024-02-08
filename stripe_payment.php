<?php

//	require ('admin/inc/db_config.php');
	require ('admin/inc/essentials.php');

	include ('config.php');

//	require ('confirm_booking.php');
//echo $_POST['stripeToken'];
//exit();
	global $SecretKey,$PublishableKey;

//	filter($_POST);

	$payment_id = $statusMsg = '';
	$ordStatus = 'error';
	$id = '';

	// Check whether stripe token is not empty

//	session_start();

	if(!empty($_POST['stripeToken'])){

		// Get Token, Card and User Info from Form
		$token = $_POST['stripeToken'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phonenum'];
		$address = $_POST['address'];
		$checkin = $_POST['checkin'];
		$checkout = $_POST['checkout'];
		$card_no = $_POST['card_number'];
		$card_cvc = $_POST['card_cvc'];
		$card_exp_month = $_POST['card_exp_month'];
		$card_exp_year = $_POST['card_exp_year'];
		$price = $_POST['price'];


		// Include STRIPE PHP Library
		require_once('stripe/stripe-php/init.php');

		// set API Key
		include ('config.php');

		$stripe = array(
			$SecretKey,
			$PublishableKey
		);

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey($SecretKey);

		// Add customer to stripe
	    $customer = \Stripe\Customer::create(array(
	        'email' => $email,
	        'source'  => $token,
	        'name' => $name,
	        'description'=>$address
	    ));

	    // Generate Unique order ID
	    $orderID = strtoupper(str_replace('.','',uniqid('', true)));

	    // Convert price to cents
	    $itemPrice = ($price*100);
	    $currency = "BDT";

	    // Charge a credit or a debit card
	    $charge = \Stripe\Charge::create(array(
	        'customer' => $customer->id,
	        'amount'   => $itemPrice,
	        'currency' => $currency,
	        'description' => $address,
	        'metadata' => array(
	            'order_id' => $orderID
	        )
	    ));

	    // Retrieve charge details
    	$chargeJson = $charge->jsonSerialize();
    	// Check whether the charge is successful
    	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){

	        // Order details
	        $transactionID = $chargeJson['balance_transaction'];
	        $paidAmount = $chargeJson['amount'];
	        $paidCurrency = $chargeJson['currency'];
	        $payment_status = $chargeJson['status'];
	        $payment_date = date("Y-m-d H:i:s");
	        $dt_tm = date('Y-m-d H:i:s');

	        // Insert tansaction data into the database
			$hostname = 'localhost';
			$username = 'root';
			$password = '';
			$database = 'the_blackstone';
			$mysqli_connection = mysqli_connect($hostname, $username, $password, $database);

			if (!$mysqli_connection) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO `payment`(
                      `name`, 
                      `phonenum`,
                      `address`,
                      `checkin`,
                      `checkout`,
                      `price`, 
                      `card_number`, 
                      `card_expirymonth`, 
                      `card_expiryyear`, 
                      `status`, 
                      `paymentid`,
                      `date`
                      ) 
				VALUES (
				        '$name',
				        $phone,
				        '$address',
				        '$checkin',
				        '$checkout',
				        $price,
				        '$card_no',
				        $card_exp_month,
				        $card_exp_year,
				        '$payment_status',
				        '$transactionID',
				        '$dt_tm'
				        )";

			$result = mysqli_query($mysqli_connection, $sql);

//			mysqli_query($sql,$con) or die("Mysql Error stripe-Charge(SQL)".mysqli_error($con));


	        // If the order is successful
	        if($payment_status == 'succeeded'){
	            $ordStatus = 'success';
	            $statusMsg = 'Your Payment has been Successful!';
	    	} else{
	            $statusMsg = "Your Payment has Failed!";
	        }
	    } else{
	        //print '<pre>';print_r($chargeJson);
	        $statusMsg = "Transaction has been failed!";
	    }
	} else{
	    $statusMsg = "Error on form submission.";
	}

?>

<!DOCTYPE html>
<html>
	<head>
        <title> Royal Palace </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/stripe.css">
    </head>

    <div class="container">
        <h2 style="text-align: center; color: blue;"> Royal Palace </h2>
        <h4 style="text-align: center;"> 1 Minto Road Dhaka 1000, Bangladesh</h4>
        <br>
        <div class="row">
	        <div class="col-lg-12" style="text-align: center;>
				<div class="status">
					<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>

					<h4 class="heading">Payment Information - </h4>
					<br>
					<p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
					<p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?> (৳<?php echo $price;?>.00)</p>
					<p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
					<br>
					<h4 class="heading">User Information - </h4>
					<p><b>Name:</b> <?php echo $name; ?></p>
					<p><b>Phone:</b> <?php echo $phone; ?></p>
					<p><b>Price:</b> <?php echo $price.' '.$currency; ?> (৳<?php echo $price;?>.00)</p>
				</div>
			</div>
			<div class="col-lg-12 text-center mt-5 d-inline-block text-decoration-none d-flex justify-content-evenly mb-2">
				<a href="index.php" class="btn btn-sm text-white bg-2 rounded-5 shadow-none"><i class="bi bi-skip-backward-fill"></i>Back to Home</a>
			</div>
		</div>
	</div>
</html>