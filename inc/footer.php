<div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="fw-bold fs-3 mb-2">TJ HOTEL</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat 
                    exercitationem doloremque autem ducimus, inventore asperiores eligendi 
                    qui pariatur nisi veritatis nihil eius, 
                    consequatur repudiandae neque modi nulla voluptate sapiente quidem?
                </p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
                <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
                <a href="fac.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
                <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact US</a> <br>
                <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a> <br>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Follow Us</h5>
                <?php
                    if($contact_r['fb'] != '') {
                        echo<<<data
                            <a href="$contact_r[fb]" class="d-inline-block text-dark  text-decoration-none mb-2">
                                <i class="bi bi-facebook me-1"></i>Facebook
                            </a> <br>
                        data;
                    }
                ?>
                <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block text-dark  text-decoration-none mb-2">
                    <i class="bi bi-instagram me-1"></i>Instagram    
                </a> <br>
                <a href="<?php echo $contact_r['gh'] ?>" class="d-inline-block text-dark  text-decoration-none mb-2">
                    <i class="bi bi-github me-1"></i>Github   
                </a> <br>
            </div>
        </div>
    </div>
    
    <h6 class="text-center bg-dark text-white p-3 mb-3">Designed and Developed by TJ HOTEL</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function setActive()
    {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length; i++)
        {
           let file = a_tags[i].href.split('/').pop();
           let file_name = file.split('.')[0];

           if(document.location.href.indexOf(file_name) >=0){
                a_tags[i].classList.add('active');
           }
           
        }
    }


    let add_form = document.getElementById('add_room_form');

    add_room_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_room();
    });

    function add_room(){
        let data = new Formdata();

        data.append('add_room','');
        data.append('name',add_room_form.elements['name'].value);
        data.append('area',add_room_form.elements['area'].value)
        data.append('area',add_room_form.elements['area'].value)
        data.append('price',add_room_form.elements['price'].value)
        data.append('quantity',add_room_form.elements['quantity'].value)
        data.append('adult',add_room_form.elements['adult'].value)
        data.append('children',add_room_form.elements['children'].value)
        data.append('dsc',add_room_form.elements['dsc'].value)

        let features = [];
        add_room_form.elements['features'].foreach(el =>{
            if(el.checked){
                features.push(el.value);
            }
        });
    }

    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new Formdata();
        
        data.append('name',register_form.elements['name'].value);
        data.append('email',register_form.elements['email'].value);
        data.append('phnomenum',register_form.elements['phonenum'].value);
        data.append('address',register_form.elements['address'].value);
        data.append('pincode',register_form.elements['[pincode'].value);
        data.append('dob',register_form.elements['dob'].value);
        data.append('pass',register_form.elements['pass'].value);
        data.append('cpass',register_form.elements['cpass'].value);
        data.append('profile',register_form.elements['profile'].file[0]);
        data.append('register',''); 

        var myModal = document.getElementById('registerModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open('POST','ajax/login_register.php',true);

        xhr.onload = function(){
            
        }
        xhr.send(data);
    });

    
       
        // let features = [];
        // add_room_form.elements['features'].foreach(el =>{
        //     if(el.checked){
        //         features.push(el.value);
        //     }
        // });
    


    setActive();
</script>