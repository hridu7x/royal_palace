<?php 
    require('inc/essentials.php');
    adminLogin();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
               <h3 class="mb-4">SETTINGS</h3>

               <!-- Genaral Setting -->

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Genaral Setting</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#genaral-s">
                                <i class="bi bi-pencil-square"></i> EDIT
                            </button>
                        </div>
                        
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>

                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p>
                       
                    </div>
                </div>

                <!-- Genaral Setting model-->

                <div class="modal fade" id="genaral-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="general_s_form">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Setting</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">About Us</label>
                                        <textarea type="text" name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn bg-6 shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn bg-10 text-white shadow-none">Save</button>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Shutdown Setting model-->

                <div class="card  border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown The Royal Palace</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                 </form>
                            </div>
                        </div>
                        
                        <p class="card-text">
                            No Customer will be allowed to book room, When Shutdown mode is turn on.
                        </p>
                       
                    </div>
                </div>

                <!-- Contact Details-->

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Contact Settings</h5>
                                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                    <i class="bi bi-pencil-square"></i> EDIT
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                        <p class="card-text" id="address"></p>

                                    </div>
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                        <p class="card-text" id="gmap"></p>

                                    </div>
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                        <p class="card-text mb-1">
                                            <i class="bi bi-telephone-fill"></i>
                                            <span id="pn-1"></span>
                                        </p>
                                        <p class="card-text">
                                            <i class="bi bi-telephone-fill"></i>
                                            <span id="pn-2"></span>
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                        <p class="card-text" id="email"></p>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">Social Media</h6>
                                        <p class="card-text mb-1">
                                            <i class="bi bi-twitter-x"></i>
                                            <span id="tw"></span>
                                        </p>
                                        <p class="card-text mb-1">
                                            <i class="bi bi-facebook"></i>
                                            <span id="fb"></span>
                                        </p>
                                        <p class="card-text mb-1">
                                            <i class="bi bi-instagram"></i>
                                            <span id="insta"></span>
                                        </p>
                                        <p class="card-text mb-1">
                                            <i class="bi bi-linkedin"></i>
                                            <span id="li"></span>
                                        </p>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                        <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                            
                            
                        
                        </div>
                    </div>


               <!-- Contact Setting model-->

                 <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                   <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                           <form id="contact_s_form">
                               <div class="modal-header">
                                   <h5 class="modal-title">Contact Setting</h5>
                               </div>
                               <div class="modal-body">
                                   <div class="container-fluid p-0">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="mb-3">
                                                   <label class="form-label">Address</label>
                                                   <input type="text" name="address" id="address_inp" class="form-control shadow-none" require>
                                               </div>

                                               <div class="mb-3">
                                                   <label class="form-label">Google Map</label>
                                                   <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" require>
                                               </div>

                                               <div class="mb-3">
                                                   <label class="form-label">Phone Number</label>
                                                   <div class="input-group mb-3">
                                                       <span class="input-group-text" ><i class="bi bi-telephone-fill"></i></span>
                                                       <input type="number" name="pn-1" id="pn-1_inp" class="form-control shadow-none" required>
                                                   </div>
                                                   <div class="input-group mb-3">
                                                       <span class="input-group-text" ><i class="bi bi-telephone-fill"></i></span>
                                                       <input type="number" name="pn-2" id="pn-2_inp" class="form-control shadow-none" required>
                                                   </div>
                                               </div>

                                               <div class="mb-3">
                                                   <label class="form-label">Email</label>
                                                   <input type="email" name="email" id="email_inp" class="form-control shadow-none" require>
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="mb-3">
                                                   <label class="form-label">Social Media</label>
                                                   <div class="input-group mb-3">
                                                       <span class="input-group-text" ><i class="bi bi-twitter-x"></i></i></span>
                                                       <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" required>
                                                   </div>
                                                   <div class="input-group mb-3">
                                                       <span class="input-group-text" ><i class="bi bi-facebook"></i></i></span>
                                                       <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                                                   </div>
                                                   <div class="input-group mb-3">
                                                       <span class="input-group-text" ><i class="bi bi-instagram"></i></i></span>
                                                       <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                                                   </div>
                                                   <div class="input-group mb-3">
                                                       <span class="input-group-text" ><i class="bi bi-linkedin"></i></i></span>
                                                       <input type="text" name="li" id="li_inp" class="form-control shadow-none" required>
                                                   </div>
                                               </div>

                                               <div class="mb-3">
                                                   <label class="form-label">iFrame</label>
                                                   <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" require>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="modal-footer">
                                   <button type="button" onclick="contacts_inp(contacts_data)" class="btn bg-6 shadow-none" data-bs-dismiss="modal">Cancel</button>
                                   <button type="submit" class="btn bg-10 text-white shadow-none">Save</button>
                               </div>

                           </form>
                       </div>
                   </div>
               </div>

               <!-- Management Team -->

               <div class="card border-0 shadow-sm mb-4">
                   <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between mb-3">
                           <h5 class="card-title m-0">Management Team</h5>
                           <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                               <i class="bi bi-plus-square"></i> Add
                           </button>
                       </div>
                       <div class="row" id="team-data">

                       </div>

                   </div>
               </div>

               <!-- Management Team model-->

               <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <form id="team_s_form">
                               <div class="modal-header">
                                   <h5 class="modal-title">Add Team Member</h5>
                               </div>
                               <div class="modal-body">
                                   <div class="mb-3">
                                       <label class="form-label">Name</label>
                                       <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                                   </div>
                                   <div class="mb-3">
                                       <label class="form-label">Picture</label>
                                       <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
                                   </div>
                               </div>
                               <div class="modal-footer">
                                   <button type="button" onclick="member_name.value='',member_picture.value=''" class="btn bg-6 shadow-none" data-bs-dismiss="modal">Cancel</button>
                                   <button type="submit" class="btn bg-10 text-white shadow-none">Save</button>
                               </div>

                           </form>
                       </div>
                   </div>
               </div>


           </div>
        </div>
    </div>



<?php require('inc/scripts.php');?>

<script src="scripts/settings.js"></script>

</body>
</html>