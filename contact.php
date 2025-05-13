<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel-CONTACT</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/link.php'); ?>
   
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">CONTACT US</h2>
        
        <div class="h-line bg-dark">

        </div>
        <p class="text-center mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Cupiditate fugit, voluptate distinctio vel magni  <br> esse reprehenderit voluptatem sed sit 
            voluptatum enim error similique cumque repellat ea nisi, eligendi corporis earum.
        </p>
    </div>

    <?php 
        $connect_q = "SELECT * FROM `contact_details` WHERE `id` = 1";
        $values = [1];
        $contact_r = mysqli_fetch_assoc(select($connect_q,$values,'i'));
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">

                <div class="bg-whitye rounded shadow p-4">
                    <iframe class="w-100 rounded" height="320px" src= "<?php echo $contact_r['iframe']?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap']?>" target="_blank" class="d-inline-block mb-2 text-decoration-none text-dark"> 
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address']?>
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone"></i> <?php echo $contact_r['pn1']?>
                    </a>
                    <br>
                    <?php
                        if($contact_r['pn2'] != '') {
                            echo<<<data
                                <a href="tel: +$contact_r[pn2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                                    <i class="bi bi-telephone"></i> <?php echo $contact_r[pn2]?>
                                </a>
                            data;
                        }
                    ?>
                    
                    <br>
                    <a href="email: <?php echo $contact_r['email']?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope"></i> <?php echo $contact_r['email']?>
                    </a>
                    <h5>Follow Us</h5>
                    <?php 
                        if($contact_r['fb'] != '') {
                            echo<<<data
                                <a href="$contact_r[fb]" class="d-inline-block mb-2 text-decoration-none text-dark">
                                    <i class="bi bi-facebook"></i> Facebook
                                </a>
                            data;
                        }
                    ?>
                    <a href="<?php echo $contact_r['ig']?>" class="d-inline-block mb-3">
                        <i class="bi bi-instagram me-1"></i>          
                    </a>
                    <a href="<?php echo $contact_r['gh']?>" class="d-inline-block mb-3">
                        <i class="bi bi-github me-1"></i>        
                    </a>
                    <a href="<?php echo $contact_r['email']?>" class="d-inline-block mb-3">
                        <i class="bi bi-github me-1"></i>        
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-whitye rounded shadow p-4">
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mb-3">
                            <label  class="form-label" style="font-weight:500;">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label" style="font-weight:500;">email</label>
                            <input name="email" required type="email" class="form-control shadow-none" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label" style="font-weight:500;">Subject</label>
                            <input name="subject" required type="text" class="form-control shadow-none" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label" style="font-weight:500;">Message</label>
                            <textarea name="message" required class="form-control shadow-none" rows="7" style="resize: none;"></textarea>
                        </div>
                        <button name="send" required type="submit" class="btn btn-dark shadow-none custom-bg text-white mt-4">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_POST['send'])){
            $frm_data = filteration($_POST);
            $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];
            $res = insert($q,$values,'ssss');
            if($res==1){
                if($res==1){
                    alert('success','Your message has been sent successfully');
                }else{
                    alert('error','Something went wrong');
                }
            }
        }
    ?>
    
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