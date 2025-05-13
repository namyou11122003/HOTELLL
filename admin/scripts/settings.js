
    let general_data, contacts_data;
    let general_s_form = document.getElementById('get_s_form');
    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');

    let contacts_s_form = document.getElementById('contacts_s_form');

    let team_s_form = document.getElementById('team_s_form');
    let member_name_inp = document.getElementById("member_name_inp");
    let member_picture_inp = document.getElementById("member_picture_inp");


    function get_general()
    {
        let site_title = document.getElementById("site_title");
        let site_about = document.getElementById("site_about");

        let shutdown_toggle = document.getElementById('shutdown-toggle')

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){
            general_data = JSON.parse(this.responseText);
            // console.log(general_data);
            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;

            site_title_inp.innerText = general_data.site_title_inp;
            site_about_inp.innerText = general_data.site_about_inp;

            if(general_data.shutdown == 0){
                shutdown_toggle.checked = false;
                shutdown_toggle.value =0;
            }else{
                shutdown_toggle.checked = true;
                shutdown_toggle.value =11;
            }
        
        xhr.send('get_general');
    }

    
    general_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            upd_general(site_title_inp.value, site_about_inp.value);
    });


    function udp_general(site_title_val,site_about_val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php",true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){
            var myModel = document.getElementById('general-s');
            var modal = bootstrap.Model.getInstance(myModal);
            modal.hide();

           if(this.responseText == 1){
                // console.log('data updated');
                alert('success','Changes saved!');
            
           }else{
                // console.log("no changes made");
                alert('error','No changes made!');
                
           }
           get_general();
        }
        xhr.send('site_title='+site_title_val,site_about_val + 'site_about=' + site_about_val+'&udp_general');
    }

    function get_general() {
        let site_title_input = document.getElementById("site_title_inp"); // Corrected variable name
        let site_about_input = document.getElementById("site_about_inp"); // Corrected variable name
        let shutdown_toggle = document.getElementById('shutdown-toggle');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            try {
            general_data = JSON.parse(this.responseText);
            // console.log(general_data);

            site_title_input.value = general_data.site_title; // Use .value for input elements
            site_about_input.value = general_data.site_about; // Use .value for input elements

            if (general_data.shutdown == 0) {
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
            } else {
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }
            } catch (error) {
            console.error("Error parsing JSON:", error);
            // Handle the error, e.g., display a message to the user
            alert('error', 'Error retrieving settings. Please check the server response.');
            }
        };
        xhr.send('get_general=1'); // Added a parameter to tell the server what to do
    }

    
    function upd_shutdown(val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){
            if(this.responseText == 1 && general_data.shutdown==0){
                // console.log('data updated');
                alert('success','Site has been shutdown!');
                
            }else{
                // console.log("no changes made");
                alert('error','Shutdown mode off!');
                
            }
            get_general();
        }
        xhr.send('udp_shutdown='+ val);
    }


    function get_contacts()
    {
        let contacts_p_id = ['address','gmap','pn1','pn2','email','fb','ig','gh','iframe'];
        let iframe = document.getElementById('iframe');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){
            contacts_data = JSON.parse(this.responseText);
            // console.log(coatacts_data)
            contacts_data = object.values(conatcts_data);

            for(i=0;i<contacts_p_id.length;i++){
                document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
            }
            iframe.src = conatct_data[9];
            contacts_inp(contacts_data);
        }
        xhr.send('get_contacts');
    }
    

    function contacts_inp(data){
        let conatacts_inp_id = ['address','gmap','pn1','pn2','email','fb','ig','gh','iframe'];

        for(i=0;i<contacts_inp_id.length;i++){
        document.getElementById(contacts_inp_id[i]).value = data[i+1];
        }
    }

    conatacts_s_form.addEventListener('suibmit',function(e){
        e.preventDefault();
        udp.contacts();
    });

    function udp_contacts()
    {
        let index = ['address','gmap','pn1','pn2','email','fb','ig','gh','iframe'];
        let contacts_inp_id = ['address_inp','gmap_inp','pn1_inp','pn2_inp','email_inp','fb_inp','ig_inp','gh_inp','iframe_inp']

        let data_str="";
        for(i=0;i<index.length;i++){
            data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + "&";
        }
        data_str += "udp_contacts";
        // console.log(data_str);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){        
            var myModel = document.getElementById('contacts-s');
            var modal = bootstrap.Model.getInstance(myModal);
            modal.hide();
            if(this.responseText == 1){
                // console.log('data updated');
                alert('success','Changes saved!');
                get_contacts();
                
            }else{
                // console.log("no changes made");
                alert('error','No change made!');
                
            }
            get_general();
        }
        xhr.send(data_str);

    }

    
    team_s_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_member();
    });

    function add_member(){
        let data = new FormData();
        data.append('name',member_name_inp.value);
        data.append('picture',member_picture_inp.files[0]);
        data.append('add_number','');
        
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true);
        xhr.onload = function(){
            // console.log(this.responseText);
        var myModel = document.getElementById('general-s');
        var modal = bootstrap.Model.getInstance(myModal);
        modal.hide();
        var myModel = document.getElementById('team-s');
        var modal = bootstrap.Model.getInstance(myModal);
        modal.hide();

        if(this.responseText == 'inv_img' ){
            alert('error','Invalid image format!');
        }else if(this.responseText == 'inv_size'){
            alert('error','Image should be less than 2MB!');
        }else if(this.responseText == 'udp_failed'){
            alert('error','Failed to upload image!');
        }else{
            alert('success','Member added successfully!');
            member_name_inp.value = '';
            member_picture_inp.value = '';
        }

        if(this.responseText == 1){
            // console.log('data updated');
            alert('success','Changes saved!');
    
        }else{
            // console.log("no changes made");
            alert('error','No changes made!');
            
        }
            get_general();
        }
        xhr.send(data);
    }

    

    function get_members(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){
            document.getElementById('team-data').innerHTML = this.responseText;         
        }
        xhr.send('get_members');
    }


    function rem_member(val){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crus.php",true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );

        xhr.onload = function(){
            if(this.responseText == 1){
                // console.log('data updated');
                alert('success','Member removed!');
                get_members();
        }else{
                // console.log("no changes made");
                alert('error','No changes made!');
                
            }
        }
        xhr.send('rem_member='+val);
    }
    window.onload = function(){
        get_general();
        get_contacts();
        get_members();
    }

}
