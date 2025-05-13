
    let feature_s_form = document.getElementById('features_s_form');
    let facility_s_form = document.getElementById('facility_s_form');

    feature_s_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_feature();
        
    });
    facility_s_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_facility();
        
    });
        
    function add_features(){
        let data = new FormData();
        data.append('name',features_s_form.elements['features_name'].value);
        data.append('add_feature','');
        
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_fac.php",true);
        xhr.onload = function(){
            // console.log(this.responseText);
            var myModel = document.getElementById('featere-s');
            var modal = bootstrap.Model.getInstance(myModal);
            modal.hide();
            var myModel = document.getElementById('feature-s');
            var modal = bootstrap.Model.getInstance(myModal);
            modal.hide();

            if(this.responseText == 1 ){
                alert('success','Feature added successfully!');
                features_s_form.elements['features_name'].value='';
                get_features();
                
            }else{
                alert('error','Something went wrong!');
            }
        }
            xhr.send(data);
}

    function get_features(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_fac.php",true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            // console.log(this.responseText);
            document.getElementById('features-data').innerHTML = this.responseText;
        }
            xhr.send('get_features');
    }
    window.onload = function(){
        get_features();
    }

    function rem_feature(id){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_fac.php",true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            // console.log(this.responseText);
            if(this.responseText == 1 ){
                alert('success','Feature deleted successfully!');
                get_features();
                
            }else if(this.responseText == 'room_added'){
                alert('error','Feature is added in room!');
            }else{
                alert('error','Something went wrong!');
            }
        }
            xhr.send('rem_feature='+val);
    }


    function add_facility(){
        let data = new FormData();
        data.append('name',facility_s_form.elements['facility_name'].value);
        data.append('icon',facility_s_form.elements['facility_icon'].files[0]);
        data.append('dsc',facility_s_form.elements['facility_dsc'].value);
        data.append('add_facility','');
        
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_fac.php",true);
        xhr.onload = function(){
            // console.log(this.responseText);
           
            var myModel = document.getElementById('facility-s');
            var modal = bootstrap.Model.getInstance(myModal);
            modal.hide();

            if(this.responseText == 'inv_img' ){
                alert('error','Invalid image type, Only SVG images are allowed!');
                
            }else if(this.responseText == 'inv_size'){
                alert('error','Image size is too large, max size is 1MB!');
                
            }else if(this.responseText == 'upload_failed'){
                alert('error','Image upload failed!');
            }else{
                alert('success','Facility added successfully!');
                facility_s_form.reset();
                get_facility();
            }
            xhr.send(data);
        }
    }

    function get_facility(){
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_fac.php",true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            // console.log(this.responseText);
            document.getElementById('facility-data').innerHTML = this.responseText;
        }
            xhr.send('get_facility');
    }

    
     function rem_facility(id){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_fac.php",true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            // console.log(this.responseText);
            if(this.responseText == 1 ){
                alert('success','Feature deleted successfully!');
                get_facility();
                
            }else if(this.responseText == 'room_added'){
                alert('error','Feature is added in room!');
            }else{
                alert('error','Something went wrong!');
            }
        }
            xhr.send('rem_facility='+val);
    }
    window.onload = function(){
        get_facility();
    }
