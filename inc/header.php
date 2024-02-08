<?php
    require ('admin/inc/db_config.php');
    require ('admin/inc/essentials.php');

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $setting_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
    $setting_q = mysqli_fetch_assoc(select($setting_q,$values,'i'));

?>



<style>
    .bg-9{
        color: black !important;
    }
</style>

<section>
    <div>
        <nav id="nav_bar" class="navbar navbar-expand-lg fixed-top navbar-light bg-light px-lg-3 py-lg-2 shadow-sm" data-spy="affix" data-offset-top="197">
            <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3  h-font" style="color: #C18506;" href="index.php"><?php echo $setting_q['site_title'] ?></a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-3" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="rooms.php">Rooms</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link me-3" href="facilities.php">Facilities</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link me-3" href="food.php">Food Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link me-3" href="contact.php">Contact Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link me-3" href="about.php">About</a>
                </li>

                </ul>
                <div class="d-flex">


                    <?php

                    session_start();
                    if (isset($_SESSION['login']) && $_SESSION['login']==true)
                    {
                        echo<<<data
                            <div class="btn-group">
                              <button type="button" class="btn btn-secondary shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                $_SESSION[uName]
                              </button>
                              <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>
                              </ul>
                            </div>
                        data;
                    }
                    else{
                       echo<<<data
                            <button type='Button' class='btn bg-6 mb-lg-2 shadow-none me-3' data-bs-toggle='modal' data-bs-target='#loginmodal'>
                            Login
                            </button>
                            
                            <button type='Button' class='btn bg-6 mb-lg-2 shadow-none ' data-bs-toggle='modal' data-bs-target='#registermodal'>
                            Register
                            </button>
                       data;

                    }
                    ?>
                </form>
            </div>
            </div>
        </nav>
    </div>
</section>

          <!-- Login -->

<section>
<div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email or Phone</label>
                        <input type="text"  name="email_mob" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control shadow-none" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" name="login"  class="btn btn-success mb-lg-2 shadow-none me-3">Login</button>
                        <button type="button" class="btn bg-white text-dark text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotmodal" data-bs-dismiss="modal" >Forgot Password?</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

    <!-- register -->

<section>
    <div class="modal fade" id="registermodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form" ">
                    <div class="modal-header">
                        <h5 class="modal-title">Register</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <span class="badge bg-light text-dark mb-3 text-warp lh-base">
                        Note: Your details must be match your real Document
                    </span>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of birth</label>
                                <input name="dob" type="date" class="form-control shadow-none" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" type="text" rows="1" class="form-control shadow-none" required></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>

                        </div>

                        <div class="text-center my-1">
                            <button type="submit" name="register" class="btn btn-success mb-lg-2 shadow-none me-3">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




<section>
    <div class="modal fade" id="forgotmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="forgotpass.php">
                    <div class="modal-header">
                        <h5 class="modal-title">Forgot Password</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="email"  name="email" class="form-control shadow-none">
                        </div>

                        <div class="mb-2 text-end">
                            <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginmodal" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" name="send-reset"  class="btn btn-success mb-lg-2 shadow-none me-3">SEND LINK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

