
    function get_bookings(search='')
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/new_bookings.php",true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function (){
            document.getElementById('table-data').innerHTML = this.responseText;
        }

        xhr.send('get_bookings&search='+search);
    }


    // let assign_room_form = document.getElementById(' assign_room_form');
    // function assign_room(id){
    //     assign_room_form.elements['id'].value=id;
    // }
    //
    // assign_room_form.addEventListener('submit',function (e){
    //     e.preventDefault();
    //
    //     let data = new FormData();
    //     data.append('id',assign_room_form.elements['id'].value);
    //     data.append('assign_room');
    //
    //     let xhr = new XMLHttpRequest();
    //     xhr.open("POST","ajax/new_bookings.php",true);
    //
    //     xhr.onload = function(){
    //
    //         var myModal = document.getElementById('assign_room_form');
    //         var modal = bootstrap.Modal.getInstance(myModal);
    //         modal.hide();
    //
    //         if (this.responseText==1){
    //             alert('success', 'Booking Finalized!');
    //             assign_room_form.reset();
    //             get_bookings();
    //         }else {
    //             alert('error', 'Server Down!');
    //         }
    //
    //     }
    //
    //     xhr.send(data);
    // });





    function cancel_booking(id)
    {
        if (confirm("Are you sure, you want to Cancel this Booking?"))
        {
            let data = new FormData();
            data.append('id',id);
            data.append('cancel_booking','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/new_bookings.php",true);

            xhr.onload = function()
            {
                if (this.responseText == 1){
                    alert('success','Booking Cancel!');
                    get_bookings();
                }
                else {
                    alert('Error', 'Remove failed!');
                }
            }
            xhr.send(data);
        }
    }








       function search_user(username)
       {
           let xhr = new XMLHttpRequest();
           xhr.open("POST","ajax/users.php",true);
           xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

           xhr.onload = function (){
               document.getElementById('users-data').innerHTML = this.responseText;
           }

           xhr.send('search_user&name='+username);
       }

    window.onload = function (){
        get_bookings();
    }