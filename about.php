<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel-ABOUT</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/link.php'); ?>
   <style>
        .box{
            border-top-color:aqua;
        }
        .swiper {
      width: 100%;
      height: 100%;
    }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
   </style>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Maxime explicabo enim sunt architecto quos repellendus vitae,
             omnis suscipit saepe debitis? Autem ut voluptas aut!
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md mb-4 order-lg-1 order-md-1 order-2"  >
                <h3 class="mb-3">Lorem ipsum dolor sit</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                     Omnis eligendi modi atque dignissimos quasi molestias culpa cupiditate, 
                     repellat reprehenderit odit qui corporis
                     amet placeat! Nesciunt totam fugiat sit earum ab!
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="img/about.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="img/features/hotel.svg" width="100px">
                    <h4 class="mt-3">100+ ROOMS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="img/features/hotel.svg" width="100px">
                    <h4 class="mt-3">100+ CUSTOMER</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="img/features/hotel.svg" width="100px">
                    <h4 class="mt-3">100+ REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="img/features/hotel.svg" width="100px">
                    <h4 class="mt-3">100+ STAFFS</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5  fw-bold text-center">MANAGEMENT TEAM</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php 
                    $about_r = selectAll('team_details');
                    $path = ABOUT_IMG_PATH;
                    while($row = mysqli_fetch_assoc($about_r)) {
                        echo<<<data
                            <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                                <img src="$path$row[picture]" class="w-100">
                                <h5 class="mt-2">$row[name]</h5>
                            <div/>
                        data;
                    }
                ?>
                <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                    <img src="img/pp1.jpg" class="w-100">
                    <h5 class="mt-2">Random Name</h5>
                </div>
                
                <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                    <img src="img/pp1.jpg" class="w-100">
                    <h5 class="mt-2">Random Name</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                    <img src="img/pp1.jpg" class="w-100">
                    <h5 class="mt-2">Random Name</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                    <img src="img/pp1.jpg" class="w-100">
                    <h5 class="mt-2">Random Name</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                    <img src="img/pp1.jpg" class="w-100">
                    <h5 class="mt-2">Random Name</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded ">
                    <img src="img/pp1.jpg" class="w-100">
                    <h5 class="mt-2">Random Name</h5>
                </div> -->
                
            </div>
            <div class="swiper-pagination"></div>
         </div>
    </div>
    
    <?php require('inc/footer.php'); ?>
    <?php require('inc/loginon.php'); ?>


    


   
    <script>
    var swiper = new Swiper(".mySwiper", {
        // slidePerview:4,
        spaceBetween: 40,
        pagination: {
        el: ".swiper-pagination",
      },
      breakpoints:{
        320:{
            slidePerview: 1,
        },
        640:{
            slidePerview:1,
        },
        768:{
            slidePerview:3,
        },
        1024:{
            slidePerview:4,
        }
      }

    });
  </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>