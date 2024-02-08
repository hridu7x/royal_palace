<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if (isset($_POST['booking_analytics']))
    {
        $frm_data = filter($_POST);

        $condition = "";

        if ($frm_data['period']==1){
            $condition="WHERE date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
        }
        else if ($frm_data['period']==2){
            $condition="WHERE date BETWEEN NOW() - INTERVAL 60 DAY AND NOW()";
        }
        else if ($frm_data['period']==3){
            $condition="WHERE date BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
        }

        $result = mysqli_fetch_assoc(mysqli_query($con,"SELECT
        COUNT(id) AS `total_booking`,
        SUM(price) AS `total_price`,
        
        COUNT(CASE WHEN status='succeeded' THEN 1 END) AS `active_bookings`,
        SUM(CASE WHEN status='succeeded' THEN `price` END) AS `active_price`
        FROM `payment` $condition"));

        $output  = json_encode($result);

        echo $output;
    }


    if (isset($_POST['user_analytics'])) {
        $frm_data = filter($_POST);

        $condition = "";

        if ($frm_data['period'] == 1) {
            $condition = "WHERE datetime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
        } else if ($frm_data['period'] == 2) {
            $condition = "WHERE datetime BETWEEN NOW() - INTERVAL 60 DAY AND NOW()";
        } else if ($frm_data['period'] == 3) {
            $condition = "WHERE datetime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
        }

        $total_queries = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count` FROM `user_queries`  $condition"));

        $total_new_reg = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `count` FROM `user_cred`  $condition"));

        $output = ['total_queries'=>$total_queries['count'],
          'total_new_reg'=>$total_new_reg['count']
        ];

        $output = json_encode($output);

        echo $output;
    }
?>