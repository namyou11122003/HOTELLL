<?php

    define('SITE_URL','http://localhost/hospital_management/HOTEL/');
    define('ABOUT_IMG_PATH',SITE_URL.'img/about/');
    define('CAROUSEL_IMG_PATH',SITE_URL.'img/carousel/');
    define('FACILITIES_IMG_PATH',SITE_URL.'img/facilities/');
    define('ROOMS_IMG_PATH',SITE_URL.'rooms/');
    


    define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hospital_management/HOTEL/img/');
    define('ABOUT_FOLDER', 'about/');
    define('CAROUSEL_FOLDER', 'carousel/');
    define('FACILITIES_FOLDER', 'facilities/');
    define('ROOMS_FOLDER', 'rooms/');
    define('USERS_FOLDER','users/');
    
    function adminLogin(){
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true)){
            echo "
                <script>
                window.location.href='index.php';
            </script>";
            exit;
        }
    }

    function redirect($url){
        echo "
            <script>
                window.location.href='$url';
            </script>";
        exit;
    }

    function alert($type,$msg){
        $bs_class = ($type == 'success') ? "alert-success" : "alert-danger";
        $msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
        echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
    }

    function uploadImage($image,$folder){
        $valid_mine = ['image/jpeg','image/png','image/webp'];
        $img_mine = $image['type'];

        if(!in_array($img_mine, $valid_mine)){
            return 'inv_img';
        }
        else if($image['size']/(1024*1024)>2){
            return 'inv_size';
        }
        else{
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".$ext";

            $upload_dir = UPLOAD_IMAGE_PATH . $folder . '/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $img_path = $upload_dir . $rname;

           if(move_uploaded_file($image['tmp_name'],$img_path)){
               return $rname;
           }
           else{
               return'upload_failed';
           }
        }
    }

    function deleteImage($img_name,$folder){
        $img_path = UPLOAD_IMAGE_PATH . $folder . '/' . $img_name;

        if(file_exists($img_path)){
             if(unlink($img_path)){
                return true;
            }
            else{
                return false;
            }
        } else {
             return false;
        }
    }

    function uploadSVGImage($image,$folder){
        $valid_mine = ['image/svg+xml'];
        $img_mine = $image['type'];

        if(!in_array($img_mine, $valid_mine)){
            return 'inv_img';
        }
        else if($image['size']/(1024*1024)>1){
            return 'inv_size';
        }
        else{
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".$ext";

            $upload_dir = UPLOAD_IMAGE_PATH . $folder . '/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $img_path = $upload_dir . $rname;

           if(move_uploaded_file($image['tmp_name'],$img_path)){
               return $rname;
           }
           else{
               return'upload_failed';
           }
        }
    }

    function uploadUserImage($image){
        $valid_mine = ['image/jpeg','image/png','image/webp'];
        $img_mine = $image['type'];

        if(!in_array($img_mine, $valid_mine)){
            return 'inv_img';
        }
        else{
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".$ext";

            $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;
            if($ext == 'png' ||  $ext =='PNG'){
                $img = imagecreatefrompng($image['tmp_name']);
            }else if($ext =='WEB' || $ext == 'WEBP'){
                $img = imagecreatefromwebp($image['tmp_name']);
            }
            else{
                $img = imagecreatefromjpeg($image['tmp_name']);
            }

           if(imagejpeg($img,$img_path,75)){
               return $rname;
           }
           else{
               return'upload_failed';
           }
        }
    }
?>