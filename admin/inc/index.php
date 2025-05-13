
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Top Navbar -->
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0">HB WEBSITE</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="col-lg-2 bg-dark border-top border-3 border-secondary vh-100" id="dashboard-menu">
            <nav class="navbar navbar-expand-lg navbar-dark flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">ADMIN PANEL</h4>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="adminDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="rooms.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="carousel.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="settings.php">Settings</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="col-lg-10 p-4">
            <h1 class="text-center">Welcome to the Admin Panel</h1>
            <p class="text-center">Manage your website from here.</p>
            <!-- Add your main content here -->
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Statistics</h2>
                        <!-- Add statistics or charts here -->
                    </div>
                    <div class="col-md-6">
                        <h2>Recent Activities</h2>
                        <!-- Add recent activities or logs here -->
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h2>Quick Actions</h2>
                        <!-- Add quick action buttons or links here -->
                    </div>
            </div>
    </div>
</body>
</html>