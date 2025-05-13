
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" >
                            <i class="bi bi-person-circle fs-3 me-2"></i>
                            User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" >
                        </div>
                        <div class="mb-4">
                            <label  class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" >
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>








    
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="register-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" >
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>
                            User Register
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID(Asdhaar,passport, driving loicense,etc...)
                            that will be required during check-in.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">

                                    <label  class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>

                                </div>
                                <div class="col-md-6 ps-0">

                                    <label  class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control shadow-none"required >

                                </div>
                                <div class="col-md-6 ps-0 mb-3">

                                    <label  class="form-label">Phone Number</label>
                                    <input name="phonenum" type="number" class="form-control shadow-none" required>

                                </div>
                                <div class="col-md-6 ps-0">

                                    <label  class="form-label">Picture</label>
                                    <input name="profile" type="file"  accept=".jpg, .jprg, .png, .webp"class="form-control shadow-none" required>

                                </div>
                                <div class="col-md-6 ps-0 mb-3">

                                    <label  class="form-label">Address</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">

                                    <label  class="form-label">Pincode</label>
                                    <input name="pincode" type="number" class="form-control shadow-none" required>

                                </div>
                                <div class="col-md-6 ps-0">

                                    <label  class="form-label">Date of birth</label>
                                    <input name="dob" type="date" class="form-control shadow-none" required >

                                </div>
                                <div class="col-md-6 ps-0 mb-3">

                                    <label  class="form-label">Password</label>
                                    <input name="pass" type="password" class="form-control shadow-none" required>

                                </div>
                                <div class="col-md-6 ps-0">

                                    <label  class="form-label">Confirm Password</label>
                                    <input name="cpass" type="password" class="form-control shadow-none"required >

                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none " required>REGISTER</button>
                        </div>
                       <!-- <div class="mb-3">
                           <label  class="form-label ">Email address</label>
                           <input type="email" class="form-control shadow-none" required >
                       </div>
                       <div class="mb-4">
                           <label  class="form-label">Password</label>
                           <input type="password" class="form-control shadow-none" required>
                       </div>
                       <div class="d-flex align-items-center justify-content-between">
                           <button type="submit" class="btn btn-dark shadow-none" required>LOGIN</button>
                           <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
                       </div> -->
                  </div>

                </form>
            </div>
        </div>
    </div>
