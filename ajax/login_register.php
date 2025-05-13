<?php
    require('../admin/inc/db_config.php');
    require('../admin/inc/essen.php');
    require("../inc/sendgrid/senfgrid-php.php");

    function sendMail(){

    }
    if(isset($_POST['register'])){
        $data = filteration($_POST);
        // math pw cf pw
        if($dat['pass'] !=$data['cpass']){
            echo 'pass_mismatch';
            exit;
        }
        //check user exists or not
        $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? AND `phonenum`=? LIMIT 1",
        [$data['email'],$data['phonenum']],"ss");

        if(mysqli_num_rows($u_exist) !=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        //upload user image to server
        $img = uploadUserImage($_FILES['profile']);
        if($img == 'inv_img'){
            echo 'inv_img';
            exit;
        }else if($img == 'upd_failed'){
            echo 'udp_failed';
            exit;
        }

    }
?>