<?php
// filepath: c:\wamp64\www\rin\HOTELLL\AdminDashboard\customer\customer_booking.php
require "../../config/db.php";


if (isset($_POST['booking_room'])) {
    $email = $_POST['email'];
    $roomtype = $_POST['room_type'];
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];
    $guests = $_POST['guests'];

    // Make sure your table 'booking' has columns: b_email, b_room_type, b_check_in, b_check_out, b_guests 
    $sql = "INSERT INTO `booking` (`b_email`, `b_room_type`, `b_check_in`, `b_check_out`, `b_guests`) 
            VALUES ('$email', '$roomtype', '$checkIn', '$checkOut', '$guests')";

    $result = $con->query($sql);

    header("Location: ../../index.php");
    exit;
}
?>