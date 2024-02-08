<?php
    //backend upload process this data

const SITE_URL = 'http://127.0.0.1/royal_palace/';
const ABOUT_IMG_PATH = SITE_URL . 'images/about/';
const CAROUSEL_IMG_PATH = SITE_URL . 'images/carousel/';
const FACILITIES_IMG_PATH = SITE_URL . 'images/facilities/';
const ROOMS_IMG_PATH = SITE_URL . 'images/rooms/';


    //backend upload process this data

    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/royal_palace/images/');
const ABOUT_FOLDER = 'about/';
const CAROUSEL_FOLDER = 'carousel/';
const FACILITIES_FOLDER = 'facilities/';
const ROOMS_FOLDER = 'rooms/';
const USERS_FOLDER = 'users/';
if (!function_exists('adminLogin')) {
    function adminLogin()
    {
        session_start();
        if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
            echo "<script>
                window.location.href='index.php';
            </script>";
            exit;
        }
        // session_regenerate_id(true);
    }
}
if (!function_exists('redirect')) {
    function redirect($url)
    {
        echo "
            <script>
                window.location.href='$url';
            </script>";
        exit;
    }
}
if (!function_exists('alert')) {
    function alert($type, $msg)
    {
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
        echo <<<alert

            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }
}
if (!function_exists('uploadImage')) {
    function uploadImage($image, $folder)
    {
        $valid_mime = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];

        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; //invalid image mime or format
        } else if (($image['size'] / (1024 * 1024)) > 5) {
            return 'inv_size'; //invalid size greater then 5mb
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
            $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname;
            } else {
                return 'upd_failed';
            }
        }
    }
}
if (!function_exists('deleteImage')) {
    function deleteImage($image, $folder)
    {
        if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
            return true;
        } else {
            return false;
        }

    }
}
if (!function_exists('uploadSVGImage')) {
    function uploadSVGImage($image, $folder)
    {
        $valid_mime = ['image/svg+xml'];
        $img_mime = $image['type'];

        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; //invalid image mime or format
        } else if (($image['size'] / (1024 * 1024)) > 5) {
            return 'inv_size'; //invalid size greater then 5mb
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
            $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname;
            } else {
                return 'upd_failed';
            }
        }
    }
}

//    function uploadUserImage($image)
//    {
//        $valid_mime = ['image/jpeg','image/jpg','image/png','image/webp'];
//        $img_mime = $image['type'];
//
//        if (!in_array($img_mime,$valid_mime)){
//            return 'inv_img'; //invalid image mime or format
//        }
//        else{
//            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
//            $rname = 'IMG_'.random_int(11111,99999).".jpeg";
//
//            $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;
//
//            if ($ext == 'png' || $ext == 'PNG'){
//                $img = imagecreatefrompng($image['tmp_name']);
//            }
//            elseif ($ext == 'webp' || $ext == 'WEBP'){
//                $img = imagecreatefromwebp($image['tmp_name']);
//            }
//            else{
//                $img = imagecreatefromjpeg($image['tmp_name']);
//            }
//
//            if(imagejpeg($img,$img_path,80)){
//                return $rname;
//            }
//            else{
//                return 'upd_failed';
//            }
//        }
//    }


?>