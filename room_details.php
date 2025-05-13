<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel-ROOM DETRAILS</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/link.php'); ?>
   
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <?php 
        if(!isset($_GET['id'])){
            redirect('rooms.php');
        }
        $data = filteration($_GET);
        $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed=?`",[$data['id'],1,0],'iii');
        if(mysqli_num_rows($room_res)==0){
            redirect('rooms.php');
        }
        $rooms_data = mysqli_fetch_assoc($room_res);
    ?>


        

        </div>
        <!-- <p class="text-center mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Cupiditate fugit, voluptate distinctio vel magni  <br> esse reprehenderit voluptatem sed sit 
            voluptatum enim error similique cumque repellat ea nisi, eligendi corporis earum.
        </p> -->
    </div>
    <div class="container">
        <div class="row">

            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold "><?php echo $room_data['name'] ?></h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none"></a>
                    <span class="text-secondary"></span>
                    <a href="rooms.php" class="text-secondary text-decoration-none"></a> 
                </div>
            </div>
            
            <div class="col-lg-7 col-md-12 px-4">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                        $room_img = ROOMS_IMG_PATH."thumbnail.jpg";
                        $img_q = mysqli_query($con,"SELECT * FROM `room_image`
                        WHERE `room_id`='$room_data[id]'");

                        if(mysqli_num_rows($img_q)>0){
                            $active_class='active';

                            while($img_res= mysqli_fetch_assoc($img_q)){
                                echo"
                                <div class='carousel-item $active_class'>
                                <img src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block w-100'>
                            </div>
                            ";
                            $active_class='';
                            }

                        }else{
                            echo"<div class='carousel-item active'>
                                <img src='$room_img' class='d-block w-100'>
                            </div>";
                        }
                    ?>
                    <!-- <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <?php
                            echo<<<price
                                <h4>$room_data[price]per night</h4>
                            price;
                            echo<<<rating
                                <div class="rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                            rating;

                            $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f
                            INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                            WHERE rfea.room_id = '$room_data[id]'");

                            $features_data = "";
                            while($fea_row = mysqli_fetch_assoc($fea_q)){
                                $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                
                                $fea_row[name]
                                </span> ";
                                
                            }
                            echo<<<features
                                <div class=" mb-3">
                                    <h6 class="mb-1">Features</h6>
                                    $features_data
                                </div>
                            features;

                            $fea_q = mysqli_query($con,"SELECT f.name FROM `facilities` f
                            INNER JOIN `room_facilities` rfea ON f.id = rfea.facilities_id 
                            WHERE rfea.room_id = '$room_data[id]'");

                            $facilities_data = "";
                            while($fec_row = mysqli_fetch_assoc($fea_q)){
                                $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                $fac_row[name]
                                </span> ";
                                
                            }
                            echo<<<facilities
                                    <div class=" mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                    </div>
                                facilities;

                            echo<<<guests
                                <div class="mb-3"</h6>
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dakr text-wrap">
                                        $room_data[adult]Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dakr text-wrap">
                                        $room_data[children]Children
                                    </span>
                                </div>
                            guests;
                        
                            echo<<<area
                                <div class=" mb-3">
                                    <h6 class="mb-1">Area</h6>
                                    <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                        $room_data[area] sq. ft.
                                    </span>
                                </div>
                            area;
                            
                            echo<<<book
                                <a href="#" class="btn w-100 text-white custom-bg shadow-none mb-1">Book Now</a>
                            book;
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 px-4">
                <div class="mb-5">
                    <h5>Description</h5>
                    <p>
                        <?php echo $room_data['description'] ?>
                    </p>
                </div>

                <div class="review-rating">
                    <h5 class="mb-3">Review & Rating</h5>
                    <div>
                        <div class="d-flex align-item-center mb-2">
                            <img src="img/features/star.svg" width="30px">
                            <h6 class="m-0 ms-2">Random User</h6>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa,  
                                Sed laborum aliquid enim voluptates quaerat numquam?
                            </p>
                            <div class="rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
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
            </div> -->

            <div class="col-lg-9 col-md-12 px-4">

                <?php
                    // $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed=?`",[1,0],'ii');
                    // while($room_data = mysqli_fetch_assoc($room_res))
                    // {
                    //     // get features of room
                    //     $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f
                    //     INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                    //     WHERE rfea.room_id = '$room_data[id]'");

                    //     $features_data = "";
                    //     while($fea_row = mysqli_fetch_assoc($fea_q)){
                    //         $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap'>
                            
                    //         </span> $fea_row[name]";
                            
                    //     }
                    //     //get facilities of room
                    //     $fea_q = mysqli_query($con,"SELECT f.name FROM `facilities` f
                    //     INNER JOIN `room_facilities` rfea ON f.id = rfea.facilities_id 
                    //     WHERE rfea.room_id = '$room_data[id]'");

                    //     $facilities_data = "";
                    //     while($fec_row = mysqli_fetch_assoc($fea_q)){
                    //         $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap'>
                            
                    //         </span> $fac_row[name]";
                            
                    //     }
                    //     //get thumbnail of image
                    //     $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                    //     $thumb_q = mysqli_query($con,"SELECT * FROM `room_image`
                    //     WHERE `room_id`='$room_data[id]'
                    //     AND `thumb`='1'");

                    //     if(mysqli_num_rows($thumb_q)>0){
                    //         $thumb_res= mysqli_fetch_assoc($thumb_q);
                    //         $room_thumb = ROOMS_IMG_PATH.$thumb_res['imgage'];

                    //     }

                    //     // print room card
                    //     echo <<<data
                    //         <div class="card mb-4 broder-0 shadow">
                    //             <div class="row g-0 p-3 align-items-center">
                    //                 <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                    //                     <img src="img/1.jpg" class="img-fluid rounded-start" alt="...">
                    //                 </div>
                    //                     <div class="col-md-5 px-lg-3 px-md-3 px-0">
                    //                     <h5 class="mb-3">$room_data</h5>
                    //                         <div class="features mb-3">
                    //                             <h6 class="mb-1">Features</h6>
                    //                             $features_data
                    //                         </div>
                    //                         <div class="facilities mb-3">
                    //                             <h6 class="mb-1">Facilities</h6>
                    //                             $facilities_data
                    
                ?>
            </div>
        </div>
    </div>
    
    <?php require('inc/footer.php'); ?>
    <?php require('inc/loginon.php'); ?>


</body>
</html>