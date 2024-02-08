<?php

$setting_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [1];
$setting_q = mysqli_fetch_assoc(select($setting_q,$values,'i'));


?>

<section>
        <div class="container-fluid bg-4 mt-5">
            <div class="row">
                <div class="col-lg-4 p-4">
                    <h5 class="me-5 fw-bold fs-3 h-font text-center mb-2" style="color: goldenrod;" ><?php echo$setting_q['site_title']?></h5>
                    <p class="text-light mb-3 text-left mt-4"><?php echo$setting_q['site_about']?> </p>
                </div>
                <div class="col-lg-4 p-4 mt-5">
                    <img class="items-center" src="images/logo/7.jpg" width="300px" height="300px">
                </div>
                <div class="col-lg-4 p-4">
                <div class=" text-light p-4 rounded mb-4">
                        <h4>Royal Palace</h4>
                        <p>31/D Topkhana Road, Dhaka 1000<br>
                            Check in: 3:00 PM | Check out: 12:00 PM
                    </div>

                    <div class=" text-light p-4 rounded mb-4">
                        <h5>Contact Us</h5>
                        <a href="tel: +<?php echo $contact_r['pn-1']?>" class="d-inline-block mb-2 text-light text-decoration-none">
                            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn-1']?>
                        </a>
                        <br>
                        <a href="tel: +<?php echo $contact_r['pn-2']?>" class="d-inline-block text-light mb-2 text-decoration-none">
                            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn-2']?>
                        </a>
                            <br>
                        <a href="mailto: <?php echo $contact_r['email']?>" class="d-inline-block text-light mb-2 text-decoration-none">
                            <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email']?>
                        </a>
                        <br>
                        <a href="<?php echo $contact_r['tw']?>" class="d-inline-block mb-3 me-2">
                            <span class="badge bg-7 text-white fs-6 p-2">
                                <i class="bi bi-twitter-x"></i>
                            </span>
                        </a>

                        <a href="<?php echo $contact_r['fb']?>" class="d-inline-block mb-3 me-2">
                            <span class="badge bg-7 text-white fs-6 p-2">
                                <i class="bi bi-facebook"></i>
                            </span>
                        </a>

                        <a href="<?php echo $contact_r['insta']?>" class="d-inline-block mb-3 me-2">
                            <span class="badge bg-7 text-white fs-6 p-2">
                                <i class="bi bi-instagram"></i>
                            </span>
                        </a>


                        <a href="<?php echo $contact_r['li']?>" class="d-inline-block mb-3 me-2">
                            <span class="badge bg-7 text-white fs-6 p-2">
                                <i class="bi bi-linkedin"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid text-center bg-6 text- m-0 p-3">
        <h6>2023 © All rights reserved</h6>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<script>

    function alert(type,msg,position='body')
    {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show " role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

        if(position=='body'){
            document.body.append(element);
            element.classList.add('custom-alert');
        }
        else {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(remAlert, 4000);
    }

    function remAlert(){
        document.getElementsByClassName('alert')[0].remove();
    }





    function setActive()
    {
        let navbar = document.getElementById('nav_bar');
        let a_tags = navbar.getElementsByTagName('a');

        for (i=0;i<a_tags.length; i++)
        {
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if (document.location.href.indexOf(file_name)>=0){
                a_tags[i].classList.add('active');
            }
        }
    };


    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('name',register_form.elements['name'].value);
        data.append('email',register_form.elements['email'].value);
        data.append('address',register_form.elements['address'].value);
        data.append('phonenum',register_form.elements['phonenum'].value);
        data.append('dob',register_form.elements['dob'].value);
        data.append('pass',register_form.elements['pass'].value);
        data.append('cpass',register_form.elements['cpass'].value);
        data.append('register','');


        var myModal = document.getElementById('registermodal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();


        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/login_register.php",true);


        xhr.onload = function (){
           if (this.responseText == 'pass_mismatch'){
               alert('error', "Password Mismatch");
           }
           else if(this.responseText == 'email_already'){
               alert('error', "Email is already");
           }
           else if(this.responseText == 'phone_already'){
               alert('error', "Phone is already");
           }
           else if(this.responseText == 'ins_failed'){
               alert('error', "Registration failed");
           }
           else {
               alert('success', "Registration successful");
               register_form.reset();
           }
        }

        xhr.send(data);

    })




    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email_mob',login_form.elements['email_mob'].value);
        data.append('pass',login_form.elements['pass'].value);
        data.append('login','');


        var myModal = document.getElementById('loginmodal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();


        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/login_register.php",true);


        xhr.onload = function (){
            if (this.responseText == 'inv_email_mob'){
                alert('error', "Invalid Email or Number");
            }
            else if(this.responseText == 'invalid_pass'){
                alert('error', "Incorrect Password");
            }
            else {
                let fileurl = window.location.href.split('/').pop().split('?').shift();
                if (fileurl=='room_details.php'){
                    window.location.href;
                }
                else {
                    window.location = window.location.pathname;
                }
            }
        }
        xhr.send(data);
    })

    function checkLoginToBook(status,room_id){
        if (status){
           window.location.href='confirm_booking.php?id='+room_id;
        }
        else {
            alert('error', 'Please Login to book room');
        }
    }

    setActive();

</script>