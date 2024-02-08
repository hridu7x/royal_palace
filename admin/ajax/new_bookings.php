<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');

    adminLogin();



    if (isset($_POST['get_bookings']))
    {
        $frm_data = filter($_POST);

        $res = selectAll("payment");
        $i=1;
        $table_data = "";

        while ($data = mysqli_fetch_assoc($res))
        {

            $checkin = date("d-m-Y",strtotime($data['checkin']));
            $checkout = date("d-m-Y",strtotime($data['checkout']));
            $table_data .="
               <tr>
                    <td>$i</td>
                    <td>$data[name]</td>
                    <td>$data[phonenum]</td>
                    <td>$data[address]</td>
                    <td>$checkin</td>
                    <td>$checkout</td>
                    <td>$data[price]</td>
                    <td>$data[paymentid]</td>
                    <td>$data[date]</td>
                    <td>
                   
                    <button type='button' onclick='cancel_booking($data[id])' class='mt-2 btn btn-dark btn-sm fw-bold shadow-none' >
                        <i class='bi bi-trash'></i> Cancel Booking
                    </button>
                    </td>
                    
                </tr> 
            ";
            $i++;
        }
    echo $table_data;
    }



    if (isset($_POST['cancel_booking']))
    {
        $frm_data =filter($_POST);

        $res = delete("DELETE FROM `payment` WHERE `id`=?",[$frm_data['id']],'i');


        if ($res){
            echo 1;
        }
        else{
            echo 0;
        }
    }


?>