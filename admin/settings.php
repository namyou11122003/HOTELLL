<?php
    require('inc/essen.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Setting</title>
    <?php require('inc/link.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <h3 class="mb-4">SETTINGS</h3>
                
                <!-- general setting  section-->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Setting</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#general-s">
                                Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 text-bold">Site Title</h6>
                        <p class="card-text" id="site_title "></p>
                        <h6 class="card-subtitle mb-1 text-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>
                        </div>
                    </div>
                    
                <!-- general setting  modal -->
                    <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="general_s_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">General Setting</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label  class="form-label">Site Title</label>
                                            <input type="text"  name="site_title" id="site_title_inp" class="form-control shadow-none" required >
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">About us</label>
                                            <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                                        </div>
                                    
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn custom-bg  shadow-none">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <!-- general shutdown section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="udp_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            No customers will be allow to book hotel room, when shutdown is turned on.
                        </p>
                    </div>
                </div>

                <!-- contact details section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-center justify-content-between">
                            <h5 class="card-title m-0">Contacts Setting</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contact-s">
                                <i class="bi bi-pencil-sqare"></i>Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address ">Toul sangkae1,Russie Keo,Phnom Penh</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap ">https://maps.app.goo.gl/gk2jLqTGPn1Q54p77</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                    <p class="card-text" id="pn1 ">
                                        <i class="bi bi-telephone-fill">+88511831196</i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text" id="pn2 ">
                                        <i class="bi bi-telephone-fill">+885973637183</i>
                                        <span id="pn2"></span>
                                </div>

                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                    <p class="card-text mb-1" id="email">yurin2t2t2t@gmail.com</p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <a href="www.google.com"><i class="bi bi-facebook me-1">Yu Rinne</i></a>
                                        <p class="card-text mb-1" >
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1" >
                                        <a href="www.google.com"><i class="bi bi-instagram">im_rinne</i></a>
                                        <span id="ig"></span>
                                    </p>
                                    <p class="card-text mb-1 " >
                                        <a href="www.google.com"><i class="bi bi-github">Meanrith-Yurin</i></a>
                                        <span id="gh"></span>
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy" src="https://maps.google.com/maps?q=Phnom%20Penh&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="width: 100%; height: 300px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact details modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Contacts Setting</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3"> 
                                                    <label  class="form-label">Address</label>
                                                    <input type="text"  name="address" id="address_inp" class="form-control shadow-none" required >
                                                </div>
                                                <div class="mb-3"> 
                                                    <label  class="form-label">Google Map Link</label>
                                                    <input type="text"  name="gmap" id="gmap_inp" class="form-control shadow-none" required >
                                                </div>
                                                <div class="mb-3"> 
                                                    <label  class="form-label">Phone Number(with country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" required >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none" required >
                                                    </div>
                                                </div>
                                                <div class="mb-3"> 
                                                    <label  class="form-label">Email</label>
                                                    <input type="email"  name="email" id="email_inp" class="form-control shadow-none" required >
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3"> 
                                                    <label  class="form-label">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook me-1"></i></span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" name="ig" id="ig_inp" class="form-control shadow-none" required >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-github"></i></span>
                                                        <input type="text" name="gh" id="gh_inp" class="form-control shadow-none" required >
                                                    </div>
                                                </div>
                                                <div class="mb-3"> 
                                                    <label  class="form-label">iFrame Src</label>
                                                    <input type="text"  name="iframe" id="iframe_inp" class="form-control shadow-none" required >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp('contacts_data')" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- managerment  team section-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-center justify-content-between">
                            <h5 class="card-title m-0">Managerment Team Setting</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>

                        <div class="row" id="team-data">
                            <div class="col-md-2 mb-3">
                                <div class="card bg-dark text-white">
                                    <img src="../img/1.jpg" class="card-img">
                                    <div class="card-img-overlay">
                                        <button type="button" class="btn btn-danger btn-sm shadow-none">
                                        <i class="bi bi-trash"></i>Delete
                                        </button>
                                    </div>
                                    <p class="card-text text-center px-2">Random Name</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Management team modal -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"> Add Team Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label  class="form-label">Name</label>
                                        <input type="text"  name="member_name" id="member_name_inp" class="form-control shadow-none" required >
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">Picture</label>
                                        <input type="file"  name="member_picture" id="member_picture_inp" accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none" required >
                                    </div>
                                
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_name.value='', member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            <?php echo $_SERVER['DOCUMENT_ROOT'] ?>
            </div>
        </div>
    </div>
    
    <?php require('inc/scripts.php'); ?>
    <script src="scripts/settings.js"></script>
</body>
</html>