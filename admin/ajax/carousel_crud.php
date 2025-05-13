<?php
session_start();
?>

<?php 
    require('../inc/db_config.php');
    require('../inc/essen.php');
    adminLogin();

    if(isset($_POST['add_image'])){
        
        $img_r = uploadImage($_FILES['picture'],[CAROUSEL_FOLDER]);

        if($img_r == 'inv_img'){
            echo $img_r;
        }
        else if($img_r == 'inv_size'){
            echo $img_r;
        }
        else if($img_r == 'udp_failed'){
            echo $img_r;
        }
        else{
            $q = "INSERT INTO `carousel`(`img`) VALUES (?)";
            $values = [$img_r];
            $res = insert($q,$values,'s');
            
                echo $res;
            
            
        }
    }

    if(isset($_POST['get_carousel'])){
        $res = selectAll('carousel');;

        while($row = mysqli_fetch_assoc($res))
        {
            $path = CAROUSEL_FOLDER;
            echo <<<DATA
            <div class="col-md-4 mb-3">
                <div class = "card bg-dark text-white">
                    <img src="$path$row[image]" class="card-img">
                    <div class="card-img-overlay">
                        <button type="button" onclick="rem_image($row[sr_np])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-trash"></i>Delete
                        </button>
                    </div>
                </div>
            </div>
            DATA;
        }
    }

    if(isset($_POST['rem_image'])){
        $frm_data = filteration($_POST);
        $pre_q = "SELECT * FROM `carousel` WHERE `sr_no` = ?";
        $values = [$frm_data['rem_image']];
        $res = select($pre_q,$values,'s');
        $img = mysqli_fetch_assoc($res);
        
        if(deleteImage($img['image'],CAROUSEL_FOLDER)){
            $q = "DELETE FROM `carousel` WHERE `sr_no` = ?";
            $res = delete($q,$values,'i');
            echo $res;
        }
        else{
            echo 0;
        }
        
    }
?>