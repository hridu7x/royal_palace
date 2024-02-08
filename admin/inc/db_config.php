<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'the_blackstone';



    $con = mysqli_connect($hostname, $username,  $password, $database);


    if(!$con){
        die("cannot connect to database".mysqli_connect_error());
    }


if (!function_exists('filter')) {
    function filter($data) {
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $data[$key] = $value;
        }
        return $data;
    }
}

//    function filter($data){
//
//        foreach($data as $key => $value){
//            $value = trim($value);
//            $value = stripslashes($value);
//            $value = strip_tags($value);
//            $value = htmlspecialchars($value);
//            $data[$key] = $value;
//        }
//        return $data;
//    }

if (!function_exists('selectAll')) {
    function selectAll($table) {
        $con = $GLOBALS['con'];
        $res = mysqli_query($con,"SELECT * FROM $table");
        return $res;
    }
}
//    function selectAll($table)
//    {
//        $con = $GLOBALS['con'];
//        $res = mysqli_query($con,"SELECT * FROM $table");
//        return $res;
//    }
if (!function_exists('select')) {
    function select($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }


        } else {
            die("Query cannot be prepared - Select");
        }

    }
}

if (!function_exists('update')) {
    function update($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }


        } else {
            die("Query cannot be prepared - Update");
        }

    }
}

if (!function_exists('insert')) {
    function insert($sql, $values, $datatypes)
    {

        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Insert");
            }


        } else {
            die("Query cannot be prepared - Insert");
        }

    }
}
if (!function_exists('delete')) {
    function delete($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }


        } else {
            die("Query cannot be prepared - Delete");
        }

    }
}

    if (mysqli_connect_error()){
        echo "<script>
                alert('cannot connect to database');
             </script>";
        exit();
    }

?>