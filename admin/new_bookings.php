<?php
    require('inc/essentials.php');
    require ('inc/db_config.php');
    adminLogin();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bookings</title>
    <?php require('inc/links.php');?>

    <style>
        .text-bg{
            color: white !important;
        }
    </style>

</head>
<body class="bg-light">

<?php require('inc/header.php');?>


<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4"> NEW BOOKINGS</h3>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <!--Room setting--->
                    <div class="text-end mb-4">
                        <input type="text" oninput="get_bookings(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Search">
                    </div>


                    <div class="table-responsive" >
                        <table class="table table-hover border" style="min-width: 1300px">
                            <thead class="">
                            <tr class="bg-dark text-light">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Checkin</th>
                                <th scope="col">Checkout</th>
                                <th scope="col">Price</th>
                                <th scope="col">Order id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="table-data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!----Assign Room Model------->

<div class="modal fade" id="assign-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="assign_room_form">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Room
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Room Number</label>
                        <input type="text" name="feature_name" class="form-control shadow-none" required>
                    </div>
                    <input type="hidden" name="booking_id">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn bg-6 shadow-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn bg-10 text-white shadow-none">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>





<?php require('inc/scripts.php');?>

    <script src="scripts/new_bookings.js"></script>

</body>
</html>