<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand span {
            display: inline-block;
            width: 35px;
            height: 35px;
            background-color: #f8f9fa;
            color: #333;
            border-radius: 50%;
            text-align: center;
            line-height: 35px;
            margin-right: 5px;
            font-weight: bold;
        }

        .hero-section {
            background-image: url('/api/placeholder/1200/500');
            background-size: cover;
            background-position: center;
            height: 500px;
            position: relative;
            color: white;
            text-align: center;
            padding-top: 150px;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-style: italic;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .booking-form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .section-heading {
            text-align: center;
            margin: 40px 0;
            position: relative;
        }

        .section-heading::after {
            content: '';
            display: block;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='20' viewBox='0 0 100 20'%3E%3Cpath d='M0,10 C30,20 70,0 100,10' stroke='%23ddd' fill='none' stroke-width='2'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            height: 20px;
            margin-top: 10px;
        }

        .room-card {
            margin-bottom: 30px;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .room-card:hover {
            transform: translateY(-5px);
        }

        .features-section {
            background-color: #212529;
            color: white;
            padding: 50px 0;
        }

        .features-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .features-tabs button {
            background: none;
            border: none;
            color: white;
            padding: 10px 15px;
            margin: 0 5px;
            cursor: pointer;
        }

        .features-tabs button:hover,
        .features-tabs button.active {
            border-bottom: 2px solid #dc3545;
        }

        .feature-box {
            margin-bottom: 30px;
        }

        .events-section {
            padding: 50px 0;
        }

        .event-card {
            position: relative;
            margin-bottom: 30px;
        }

        .event-date {
            position: absolute;
            left: 0;
            bottom: 0;
            background-color: #dc3545;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .event-date .day {
            font-size: 1.5rem;
            font-weight: bold;
            display: block;
        }

        footer {
            background-color: #212529;
            color: white;
            padding: 50px 0 20px;
        }

        footer h5 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li a {
            color: #adb5bd;
            text-decoration: none;
        }

        footer ul li a:hover {
            color: white;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background-color: #495057;
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            margin-right: 10px;
        }

        .book-now-btn {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .book-now-btn:hover {
            background-color: #c82333;
            color: white;
        }

        .view-all-btn {
            background-color: #dc3545;
            color: white;
            padding: 8px 30px;
            border: none;
            margin: 20px auto;
            display: block;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span>H</span>otel Booking
                </a>
                <div class="d-flex align-items-center">
                    <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-pinterest"></i></a>
                    <a href="#" class="me-2"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <div class="">
                    <button class="btn btn-outline-secondary btn-sm ms-3"><a class="btn text-decoration-none "
                            href="./login.php">Sign In</a></button>
                    <button class="btn btn-outline-secondary btn-sm ms-3"><a class="btn text-decoration-none "
                            href="./register.php">Sign Up</a></button>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
                                data-bs-toggle="dropdown">
                                ABOUT US
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Our Story</a></li>
                                <li><a class="dropdown-item" href="#">Mission & Vision</a></li>
                                <li><a class="dropdown-item" href="#">Team</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="roomsDropdown" role="button"
                                data-bs-toggle="dropdown">
                                ROOMS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Standard Room</a></li>
                                <li><a class="dropdown-item" href="#">Deluxe Room</a></li>
                                <li><a class="dropdown-item" href="#">Suite</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                                data-bs-toggle="dropdown">
                                SERVICES
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Restaurant</a></li>
                                <li><a class="dropdown-item" href="#">Spa</a></li>
                                <li><a class="dropdown-item" href="#">Fitness Center</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                                data-bs-toggle="dropdown">
                                GALLERY
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Rooms</a></li>
                                <li><a class="dropdown-item" href="#">Dining</a></li>
                                <li><a class="dropdown-item" href="#">Facilities</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button"
                                data-bs-toggle="dropdown">
                                BLOG
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Latest News</a></li>
                                <li><a class="dropdown-item" href="#">Travel Tips</a></li>
                                <li><a class="dropdown-item" href="#">Events</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button"
                                data-bs-toggle="dropdown">
                                CONTACT
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Location</a></li>
                                <li><a class="dropdown-item" href="#">Contact Form</a></li>
                                <li><a class="dropdown-item" href="#">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ms-auto">
                        <a href="#" class="btn book-now-btn">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section with Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-section " style="background-image: url('./imagehotel/1.jpg');">
                    <div class="container">
                        <h1>Welcome to Hotely</h1>
                        <p>THE PLACE WHERE YOU LOOKING TO</p>
                        <button class="btn btn-outline-light mt-3">EXPLORE NOW</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('./imagehotel/2.jpg');">
                    <div class="container">
                        <h1>Luxury & Comfort</h1>
                        <p>EXPERIENCE THE BEST HOSPITALITY</p>
                        <button class="btn btn-outline-light mt-3">DISCOVER MORE</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('./imagehotel/3.jpg');">
                    <div class="container">
                        <h1>Luxury & Comfort</h1>
                        <p>EXPERIENCE THE BEST HOSPITALITY</p>
                        <button class="btn btn-outline-light mt-3">DISCOVER MORE</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('./imagehotel/4.jpg');">
                    <div class="container">
                        <h1>Luxury & Comfort</h1>
                        <p>EXPERIENCE THE BEST HOSPITALITY</p>
                        <button class="btn btn-outline-light mt-3">DISCOVER MORE</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Booking Form -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="booking-form">
                    <div class="row align-items-end">
                        <form action="./AdminDashboard/customer/customer_booking.php" method="post" class="d-flex">

                            <div class="col-md-3 mb-3 mb-md-0">
                                <label for="email">E-mail</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Please enter your e-mail" name="email">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div>
                            <div class="col-md-2 mb-3 mb-md-0">
                                <label for="roomType">Room Type</label>
                                <div class="input-group">
                                    <select class="form-select" id="roomType" name="room_type">
                                        <option selected>Select a room</option>
                                        <option value="Standard Room">Standard Room</option>
                                        <option value="Deluxe Room">Deluxe Room</option>
                                        <option value="Suite">Suite</option>
                                    </select>
                                    <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                </div>
                            </div>
                            <div class="col-md-2 mb-3 mb-md-0">
                                <label for="checkIn">Check-in</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="checkIn" placeholder="Check-in" name="check_in">
                                </div>
                            </div>
                            <div class="col-md-2 mb-3 mb-md-0">
                                <label for="checkOut">Check-out</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="checkOut" placeholder="Check-out" name="check_out">
                                </div>
                            </div>
                            <div class="col-md-1 mb-3 mb-md-0">
                                <label for="guests">Guests</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="guests" value="1" min="1" name="guests">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn book-now-btn w-100" type="submit" name="booking_room">BOOK NOW</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <section class="container mt-5">
        <div class="section-heading">
            <h2>WELCOME TO HOTEL</h2>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                    <a href="#" class="text-danger">Read more...</a>
                </p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="room-card">
                    <img src="./imagehotel/10" alt="Room" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="room-card">
                    <img src="./imagehotel/5.png" alt="Room" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="room-card">
                    <img src="./imagehotel/11.png" alt="Room" class="img-fluid">
                </div>
            </div>
        </div>

        <button class="btn view-all-btn">View All</button>
    </section>

    <!-- Features Section -->
    <section class="features-section mt-5">
        <div class="container">
            <div class="section-heading">
                <h2 class="text-white">WHY TO CHOOSE US?</h2>
            </div>

            <div class="features-tabs">
                <button class="active">ALL</button>
                <button>DESERT</button>
                <button>COFFEE</button>
                <button>CATERING</button>
                <button>SERVICES</button>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="./imagehotel/food1.jpg" alt="Feature" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="./imagehotel/food2.jpg" alt="Feature" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="./imagehotel/food2.jpg" alt="Feature" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="./imagehotel/food2.jpg" alt="Feature" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="./imagehotel/swim1.jpg" alt="Feature" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="./imagehotel/food2.jpg" alt="Feature" class="img-fluid">
                    </div>
                </div>
            </div>

            <button class="btn view-all-btn">View All</button>
        </div>
    </section>

    <!-- Events Section -->
    <section class="events-section">
        <div class="container">
            <div class="section-heading">
                <h2>Upcomming</h2>
                <h3>Events</h3>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="event-card">
                        <img src="./imagehotel/event1.jpg" alt="Event" class="img-fluid">
                        <div class="event-date">
                            <span class="day">25</span>
                            <span class="month">APRIL</span>
                        </div>
                        <div class="p-3">
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card">
                        <img src="./imagehotel/even2.jpg" alt="Event" class="img-fluid">
                        <div class="event-date">
                            <span class="day">22</span>
                            <span class="month">JUNE</span>
                        </div>
                        <div class="p-3">
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card">
                        <img src="./imagehotel/even3.jpg" alt="Event" class="img-fluid">
                        <div class="event-date">
                            <span class="day">15</span>
                            <span class="month">JULY</span>
                        </div>
                        <div class="p-3">
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>ADDRESS</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Hyderabad, Jaipur</li>
                        <li><i class="fas fa-phone me-2"></i> 0512345678</li>
                        <li><i class="fas fa-envelope me-2"></i> hotel@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>INFORMATION</h5>
                    <ul>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Site Map</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>MY ACCOUNT</h5>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>NEWSLETTER</h5>
                    <p>Subscribe to our newsletter for latest news, tips, and advice.</p>
                    <div class="input-group mt-3">
                        <input type="email" class="form-control" placeholder="Your Email">
                        <button class="btn book-now-btn">GO</button>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>© 2018 - Hotel. All rights.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>