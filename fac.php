<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel-FAC</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/link.php'); ?>
    <style>
        .pop:hover{
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3;
        }
    </style>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">OUR FACILITIES</h2>
        
        <div class="h-line bg-dark">

        </div>
        <p class="text-center mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Cupiditate fugit, voluptate distinctio vel magni  <br> esse reprehenderit voluptatem sed sit 
            voluptatum enim error similique cumque repellat ea nisi, eligendi corporis earum.
        </p>
    </div>
    <div class="container">
        <div class="row">
            <?php
                $res =selectAll('features');
                $path = FEATURES_IMG_PATH;
                while($row = mysqli_fetch_assoc($res))
                {
                    echo <<<data
                    <div class="col-lg-4 col-md-6 mb-5 px-4">
                        <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                            <div class="d-felx align-item-center mb-3">

                            </div>
                            <img src="$path$row[icon]" width="40px" alt="">
                            <h5 class="m-0 mb-3">$row[name]</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                                 suscipit provident molestiae molestias odio quod doloribus odit!</p>
                        </div>
                    </div>
                    data;
                }
            ?>
            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                    <div class="d-felx align-item-center mb-3">

                    </div>
                    <img src="img/features/wifi-logo.svg" width="40px" alt="">
                    <h5 class="m-0 mb-5">Wifi</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                         suscipit provident molestiae molestias odio quod doloribus odit!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                    <div class="d-felx align-item-center mb-3">

                    </div>
                    <img src="img/features/wifi-logo.svg" width="40px" alt="">
                    <h5 class="m-0 mb-5">Wifi</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                         suscipit provident molestiae molestias odio quod doloribus odit!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                    <div class="d-felx align-item-center mb-3">

                    </div>
                    <img src="img/features/wifi-logo.svg" width="40px" alt="">
                    <h5 class="m-0 mb-5">Wifi</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                         suscipit provident molestiae molestias odio quod doloribus odit!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                    <div class="d-felx align-item-center mb-3">

                    </div>
                    <img src="img/features/wifi-logo.svg" width="40px" alt="">
                    <h5 class="m-0 mb-5">Wifi</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                         suscipit provident molestiae molestias odio quod doloribus odit!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                    <div class="d-felx align-item-center mb-3">

                    </div>
                    <img src="img/features/wifi-logo.svg" width="40px" alt="">
                    <h5 class="m-0 mb-5">Wifi</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                         suscipit provident molestiae molestias odio quod doloribus odit!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4 border-top border-4 border-dark  pop">
                    <div class="d-felx align-item-center mb-3">

                    </div>
                    <img src="img/features/wifi-logo.svg" width="40px" alt="">
                    <h5 class="m-0 mb-5">Wifi</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Animi amet consequuntur iusto ipsum tempore, quo eveniet perferendis veniam nisi labore! Non consequuntur
                         suscipit provident molestiae molestias odio quod doloribus odit!</p>
                </div>
            </div> -->
        </div>
    </div>
    
    <?php require('inc/footer.php'); ?>
    <?php require('inc/loginon.php'); ?>


    



    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
  </script> -->
</body>
</html>