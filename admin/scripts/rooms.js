let add_room_form = document.getElementById('add_room_form');
add_room_form.addEventListener('submit',function(e){
    e.preventDefault();
});
let formData = new FormData(this);
    add_rooms();
    

function add_rooms(){  
    let data = new FormData(edit_room_form);
    data.append('add_room','');
    data.append('name',add_room_form.elements['name'].value);
    data.append('area',add_room_form.elements['area'].value);
    data.append('price',add_room_form.elements['price'].value);
    data.append('quantity',add_room_form.elements['quantity'].value);
    data.append('adult',add_room_form.elements['adult'].value);
    data.append('children',add_room_form.elements['children'].value);
    data.append('dsc',add_room_form.elements['dsc'].value);
    
    let features=[];

    add_room_form.elements['features[]'].forEach((el) => {
        if(el.checked){
            features.push(el.value);
        }
    });

    let facilities = [];
    add_room_form.elements['facilities[]'].forEach((el) => {
        if(el.checked){
            facilities.push(el.value);
        }
    });
    
    data.append('features',JSON.stringify(features));
    data.append('facilities',JSON.stringify(facilities));

    let xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/rooms.php',true);

    xhr.onload = function(){
        let myModal = document.getElementById('edit-room');
        let modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(this.response == 1){
            alert('success','Room added successfully');
            add_room_form.reset();
            
        }else{
            alert('error','Something went wrong');
        }
    }
    xhr.send(data);
    
}


function get_all_rooms(){
    let xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/rooms.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('room-data').innerHTML = this.responseText;
    }
    xhr.send(get_all_rooms);
}   

let edit_room_form = document.getElementById('edit_room_form');

function edit_details(id){
    let xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/rooms.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edit_room_form.elements['name'].value = data[0]['name'];
        edit_room_form.elements['area'].value = data[0]['area'];
        edit_room_form.elements['price'].value = data[0]['price'];
        edit_room_form.elements['quantity'].value = data[0]['quantity'];
        edit_room_form.elements['adult'].value = data[0]['adult'];
        edit_room_form.elements['children'].value = data[0]['children'];
        edit_room_form.elements['dsc'].value = data[0]['description'];
        edit_room_form.elements['room_id'].value = id;
        
        // let features = JSON.parse(data[1]);
        // let facilities = JSON.parse(data[2]);
        
        // for(let i=0; i<features.length; i++){
        //     edit_room_form.elements['features[]'][features[i]].checked = true;
        // }
        
        // for(let i=0; i<facilities.length; i++){
        //     edit_room_form.elements['facilities[]'][facilities[i]].checked = true;
        // }

        edit_room_form.elements['facilities[]'].forEach((el) => {
            if(facilities.includes(el.value)){
                facilities.push(el.value);
                el.checked = true;
            }
        });
        edit_room_form.elements['features[]'].forEach((el) => {
            if(features.includes(el.value)){
                features.push(el.value);
                el.checked = true;
            }
        });
        
    }
    xhr.send('get_room='+id);
}


edit_room_form.addEventListener('submit',function(e){
    e.preventDefault();
    submit_edit_rooms();
});


function submit_edit_rooms(){  
    let data = new FormData(edit_room_form);
    data.append('edit_room','');
    data.append('room_id',edit_room_form.elements['room_id'].value);
    data.append('name',edit_room_form.elements['name'].value);
    data.append('area',edit_room_form.elements['area'].value);
    data.append('price',edit_room_form.elements['price'].value);
    data.append('quantity',edit_room_form.elements['quantity'].value);
    data.append('adult',edit_room_form.elements['adult'].value);
    data.append('children',edit_room_form.elements['children'].value);
    data.append('dsc',edit_room_form.elements['dsc'].value);
    
    let features=[];

    edit_room_form.elements['features[]'].forEach((el) => {
        if(el.checked){
            features.push(el.value);
        }
    });

    let facilities = [];
    edit_room_form.elements['facilities[]'].forEach((el) => {
        if(el.checked){
            facilities.push(el.value);
        }
    });
    
    data.append('features',JSON.stringify(features));
    data.append('facilities',JSON.stringify(facilities));

    let xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/rooms.php',true);

    xhr.onload = function(){
        var myModal = document.getElementById('edit-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(this.response == 1){
            alert('success','Room data edited');
            edit_room_form.reset();
            
        }else{
            alert('error','Something went wrong');
        }
    }
    xhr.send(data);
    
}


function toggle_status(id,val){
    let xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/rooms.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        // document.getElementById('room-data').innerHTML = this.responseText;
        if(this.response == 1){
            alert('success','Status changed successfully');
            get_all_rooms();
        }else{
            alert('error','Something went wrong');
        }
    }
    xhr.send('toggle_status='+id+'&value='+val);
}   


let add_image_form = document.getElementById('add_image_form');

add_image_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_image();
});

function add_image(){
    let data = new FormData();
    data.append('image',add_image_form.element['image'].files[0]);
    data.append('room_id',add_image_form.element['room_id'].value);
    data.append('add_image','');
    
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php",true);

    xhr.onload = function(){
        if(this.responseText == 'inv_img' ){
        alert('error','Only jpg, jpeg, png and gif formats are allowed!', 'image-alert'); 
    }else if(this.responseText == 'inv_size'){
        alert('error','Image should be less than 2MB!', 'image-alert');
    }else if(this.responseText == 'udp_failed'){
        alert('error','Failed to upload image!', 'image-alert');
    }else{
        alert('success','New image added!', 'image-alert');
        
        room_images(add_images_form.elements['room_id'],document.querySelector("#room-image .modal-title").innerText);
        add_image_form.reset();
    }
}
xhr.send(data);
}


function room_images(id,rname){
    document.querySelector("#room-image .modal-title").innerText = rname;
    add_image_form.elements['room_id'].value = id;
    add_image_form.element['image'].value = '';

    let xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/rooms.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        // document.getElementById('room-data').innerHTML = this.responseText;
        document.getElementById('room-image-data').innerHTML = this.responseText;
    }
    xhr.send('get_room_images='+id);
}


function rem_image(img_id,room_id){
    let data = new FormData();
    data.append('image_id',img_id);
    data.append('room_id',room_id);
    data.append('add_image','');
    
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php",true);

    xhr.onload = function(){
        if(this.responseText == 1 ){
            alert('success', 'Image Removed!','image-alert'); 
            room_images(room_id,document.querySelector("#room-image .modal-title").innerText);
        }else{
            alert('error','Image remove failed!','image-alert');  
        }
    }
    xhr.send(data);
}

function thumb_image(img_id,room_id){
    let data = new FormData();
    data.append('image_id',img_id);
    data.append('room_id',room_id);
    data.append('thumb_image','');
    
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php",true);

    xhr.onload = function(){
    if(this.responseText == 1 ){
        alert('success', 'Image Thumbanail Changed!','image-alert'); 
        room_images(room_id,document.querySelector("#room-image .modal-title").innerText);
    }else{
        alert('error','Thumbnail update failed!','image-alert');
        
    }
}
xhr.send(data);
}



function remove_image(room_id){
    if(confirm("Are you sure, you want to delete this room?")){
        let data = new FormData();
        data.append('room_id',img_id);
        data.append('remove_image','');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/room_crud.php",true);

        xhr.onload = function(){
        if(this.responseText == 1 ){
            alert('success', 'Room Removed'); 
            get_all_rooms();
        }else{
            alert('error','Room removal failed!');
            
        }
    }
    xhr.send(data);
    }       
}


window.onload = function(){
    get_all_rooms();
}
    