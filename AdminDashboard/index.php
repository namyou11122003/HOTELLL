<?php include "./pages/header.php"; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include './pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex gap-5">
            <div class="col-sm-6 col-lg-3">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Users</h5>
                                <h3 class="card-text">1,234</h3>
                            </div>
                            <i class="bi bi-people fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card: Revenue -->
            <div class="col-sm-6 col-lg-3">
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Revenue</h5>
                                <h3 class="card-text">$4,567</h3>
                            </div>
                            <i class="bi bi-currency-dollar fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card: Orders -->
            <div class="col-sm-6 col-lg-3">
                <div class="card bg-warning text-dark mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Orders</h5>
                                <h3 class="card-text">89</h3>
                            </div>
                            <i class="bi bi-cart fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./pages/footer.php"; ?>