<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel-OUR ROOMS</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/link.php'); ?>
   
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">OUR ROOMS</h2>
        
        <div class="h-line bg-dark">

        </div>
        <p class="text-center mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Cupiditate fugit, voluptate distinctio vel magni  <br> esse reprehenderit voluptatem sed sit 
            voluptatum enim error similique cumque repellat ea nisi, eligendi corporis earum.
        </p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-item-center mt-3" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none mb-3">
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">FACILITIES</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-chech-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Facilities one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-chech-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Facilities two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-chech-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Facilities three</label>
                                </div>
                                
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">

                <?php
                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed=`? LIMIT 3 ORDER BY `id` dsc",[1,0],'ii');
                    while($room_data = mysqli_fetch_assoc($room_res))
                    {
                        // get features of room
                        $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f
                        INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                        WHERE rfea.room_id = '$room_data[id]'");

                        $features_data = "";
                        while($fea_row = mysqli_fetch_assoc($fea_q)){
                            $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap'>
                            
                            </span> $fea_row[name]";
                            
                        }
                        //get facilities of room
                        $fea_q = mysqli_query($con,"SELECT f.name FROM `facilities` f
                        INNER JOIN `room_facilities` rfea ON f.id = rfea.facilities_id 
                        WHERE rfea.room_id = '$room_data[id]'");

                        $facilities_data = "";
                        while($fec_row = mysqli_fetch_assoc($fea_q)){
                            $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap'>
                            
                            </span> $fac_row[name]";
                            
                        }
                        //get thumbnail of image
                        $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                        $thumb_q = mysqli_query($con,"SELECT * FROM `room_image`
                        WHERE `room_id`='$room_data[id]'
                        AND `thumb`='1'");

                        if(mysqli_num_rows($thumb_q)>0){
                            $thumb_res= mysqli_fetch_assoc($thumb_q);
                            $room_thumb = ROOMS_IMG_PATH.$thumb_res['imgage'];

                        }

                        // print room card
                        echo <<<data
                            <div class="card mb-4 broder-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                        <img src="img/1.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="mb-3">$room_data</h5>
                                            <div class="features mb-3">
                                                <h6 class="mb-1">Features</h6>
                                                $features_data
                                            </div>
                                            <div class="facilities mb-3">
                                                <h6 class="mb-1">Facilities</h6>
                                                $facilities_data
                                            </div>
                                            <div class="guests"</h6>
                                                <h6 class="mb-1">Guests</h6>
                                                <span class="badge rounded-pill bg-light text-dakr text-wrap">
                                                    $room_data[adult]Adults
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dakr text-wrap">
                                                    $room_data[children]Children
                                                </span>
                                            </div>
                                    </div>
                                    <div class="col-md-2 text-align-center">
                                        <h6 class="mb-4">$room_data[price]</h6>
                                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                        <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                                    </div>
                                </div>
                            </div>
                        data;  
                    }
                ?>
            
        </div>
        </div>
    </div>
    
    <?php require('inc/footer.php'); ?>
    <?php require('inc/loginon.php'); ?>


</body>
</html>