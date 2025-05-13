<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel-HOME</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/link.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>
    <div class="container-fluid px-lg-4 mt-4">
        
        <!-- Swiper -->
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                    $res = selectALL('carousel');
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $path = CAROUSEL_FOLDER;
                            echo <<<data
                                <div class="swiper-slide">
                                    <img src="$path$row[image]" class="w-100 d-block"  />
                                </div>
                            data;
                        }
                 ?>
            </div>
        </div>
    </div>

    <div class="container availability-form" >
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form>
                    <div class="row align-item-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-2">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select  shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mb-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class=" pt-4 mb-4 text-center fw-bold ">OUR ROOMS</h2>
    <div class="container">
        <div class="row">
            <?php
                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed=`?  ORDER BY `id` dsc LIMIT 3",[1,0],'ii');
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
                             <div class="col-lg-4 col-md-6 my-3">
                                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                                    <img src="$room_thumb" class="card-img-top">
                                    <div class="card-body">
                                        <h5>Simple Room Name</h5>
                                        <h5 class="mb-3">$room_data[price]</h5>
                                        <div class="features mb-3">
                                            <h6 class="mb-1">Features</h6>
                                            $features_data
                                        </div>
                                        <div class="facilities mb-4">
                                            <h6 class="mb-1">Facilities</h6>
                                            $facilities_data
                                        </div>
                                        <div class="guests mb-4"</h6>
                                            <h6 class="mb-1">Guests</h6>
                                            <span class="badge rounded-pill bg-light text-dakr text-wrap">
                                                $room_data[adult]Adults
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dakr text-wrap">
                                                $room_data[children]Children
                                            </span>
                                        </div>
                                        <div class="rating mb-4">
                                            <h6 class="mb-1">Rating</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-evenly mb-2">
                                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                                        </div>
                                            <p class="card-text">Some quick examptext to build on the card title and make up the bulk of the card's content.</p> -->
                                            <a href="room_details.php?id=$room_data[id]" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        data;  
                    }
                ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-blod shadow-none ">More Rooms >>></a>
            </div>
        </div>
    </div>

    <h2 class=" pt-4 mb-4 text-center fw-bold ">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php
                $res = mysqli_query($con, "SELECT * FROM `facilities` LIMIT 5 ORDER BY dcs");
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                    echo<<<data
                        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                            <img src="$path$row[icon]" width="80px">
                            <h5 class="mt-3">$row[name]</h5>
                        </div>
                    data;
                }
            ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-outline-dark rounded-0 fw-bold shadow-none">More facilities</a>
            </div>
        </div>
    </div>

    <h2 class=" pt-4 mb-4 text-center fw-bold ">TESTIMONIALS</h2>
    <div class="container mt-5">
        <div class="swiper swiper-testimonails">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-item-center mb-3">
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
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-item-center mb-3">
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
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-item-center mb-3">
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
            <div class="swiper-pagination"></div>
        </div>
        
    </div>
    
    <?php 
        $connect_q = "SELECT * FROM `contact_details` WHERE 'sr_no' = ?";
        $values = [1];
        $connect_r = mysqli_fetch_assoc(select($connect_q,$values,'i'));
        print_r($connect_r);
    ?>


    <h2 class=" mt-5 pt-4 mb-4 text-center fw-bold ">REACH US</h2>
    <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src= "<?php echo $connect_r['iframe']; ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone"></i> <?php echo $connect_r['pn1']; ?>
                    </a>
                    <br>
                    <?php 
                        if ($connect_r['pn2'] != '') {
                            
                            echo <<<data
                                <a href="tel: +$contact_r[$pn2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                                    <i class="bi bi-telephone"></i> +$contact_r[pn2];
                                </a>
                        data;
                        }
                    ?>

                    
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <?php 
                        if($connect_r['fb'] != ''){
                            echo <<<data
                                <a href="$connect_r[fb]" class="d-inline-block mb-3">
                                    <span class="badge bg-light text-dark fs-6 p-2">
                                        <i class="bi bi-facebook me-1"></i>Facebook;
                                    </span>
                                </a>
                                <br>
                            data;
                        }
                    ?>
                    
                    <br>
                    <a href="#" <?php echo $contact_r['ig'] ?> class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram"></i> Instagram
                        </span>
                        
                    </a>
                    <br>
                    <a href="#" <?php echo $contact_r['gh'] ?> class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-github"></i> Github
                        </span>
                    </a>

                    
                </div>
            </div>
    </div>

    
    <?php require('inc/footer.php'); ?>
    <?php require('inc/loginon.php'); ?>


    <!-- <div class="container-fluid px-lg-4 mt-4">
        <!-- Swiper -->
        <!-- <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="img/IMG_15372.png" class="w-100 d-block"  />
                </div>
                <div class="swiper-slide">
                    <img src="img/IMG_40905.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="img/IMG_55677.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="img/IMG_62045.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="img/IMG_93127.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="img/IMG_99736.png" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div> --> -->



    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop:true,
      autoplay:{
        delay: 3500,
        disableOnInteraction:false,
      }
    });

    var swiper = new Swiper(".wiper-testimonails", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
    
  </script>
</body>
</html>