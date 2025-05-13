<?php
session_start();
?>

<?php 
    require('../inc/db_config.php');
    require('../inc/essen.php');
    adminLogin();

    if(isset($_POST['add_feature'])){
        $frm_data = filteration($_POST);
        $q = "INSERT INTO `features`(`name`) VALUES (?)')";
        $img_r = uploadImage($_FILES['picture'],[ABOUT_FOLDER]);
        $values = [$frm_data['name']];
        $res = insert($q,$values,'s');
        echo $res;
        
    }

    if(isset($_POST['get_feature'])){
        $res = selectAll('features');;

        while($row = mysqli_fetch_assoc($res))
        {
            $path = ABOUT_FOLDER;
            echo <<<data
            <tr>
                <td>$i<td/>
                <td>$row<td/>
                <td>
                    <button type="button" onclick="rem_feature($row[id])" class="btn btn-danger btn-sm shadow-none">
                        <i class="bi bi-trash"></i>Delete
                    </button>
                <td/>
            <tr/>

            data;
            $i++;
        }
    }

    if(isset($_POST['rem_feature']))
    {
        $frm_data = filteration($_POST);
        $values = [$frm_data['rem_feature']];

        $check_q = select('SELECT * FROM `room_features` WHERE `features_id`=?',[$frm_data['rem_feature']],'i');
        if(mysqli_num_rows($check_q)==0){
            $q = "DELETE FROM `features` WHERE `id` = ?";
            $res = delete($q,$values,'i');
            echo $res;


        }else{
            echo 'room_added';
        }
    
       
        
        
    }

    if(isset($_POST['add_facility'])){
        $frm_data = filteration($_POST);
        $img_r = uploadSVGImage($_FILES['icon'],[FEATURES_FOLDER]);

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
            $q = "INSERT INTO `facilities`(`icon`, `name`, `description`) VALUES (?,?,?)";
            $values = [$img_r,$frm_data['name'],$frm_data['dsc']];
            $res = insert($q,$values,'sss');
            echo $res;
        }
    }
    if(isset($_POST['get_facility'])){
        $res = selectAll('facilities');;

        while($row = mysqli_fetch_assoc($res))
        {
            $path = FEATURES_FOLDER;
            echo <<<data
            <tr>
                <td>$i<td/>
                <td><img src="$path$row[icon]" class="img-fluid" style="width: 50px; height: 50px;"></td>
                <td>$row[name]<td/>
                <td>$row[description]<td/>
                <td>
                    <button type="button" onclick="rem_facility($row[id])" class="btn btn-danger btn-sm shadow-none">
                        <i class="bi bi-trash"></i>Delete
                    </button>
                <td/>
            <tr/>

            data;
            $i++;
        }
    }

    if(isset($_POST['rem_facility']))
    {
        $frm_data = filteration($_POST);
        $values = [$frm_data['rem_facility']];

        $check_q = select('SELECT * FROM `room_facilities` WHERE `facilities_id`=?',[$frm_data['rem_facilities']],'i');
        if(mysqli_num_rows($check_q)==0){
            $q = "DELETE FROM `features` WHERE `id` = ?";
            $res = delete($q,$values,'i');
            echo $res;


        }else{
            echo 'room_added';
        }

        $pre_q = "SELECT * FROM `facilities` WHERE `id` = ?";
        $res = select($pre_q,$values,'i');
        $img = mysqli_fetch_assoc($res);
        if(deleteImage($img['icon'],FEATURES_FOLDER)){
            $q = "DELETE FROM `facilities` WHERE `id` = ?";
            $res = delete($q,$values,'i');
            echo $res;
        }
        else{
            echo 0;
        }
       
        
    }
?>