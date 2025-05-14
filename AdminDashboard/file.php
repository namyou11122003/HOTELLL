<?php include "./pages/header.php";
include "../config/db.php";
$select = "SELECT * FROM booking ORDER BY b_id desc";
$result = $con->query($select);

?>
<!-- $sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close(); -->
<!-- Main Content -->
<div class="container-fluid py-4 d-flex flex-column align-items-center">
    <?php include "./pages/navbar.php"; ?>
    <style>
        .table {
            margin-left: 15rem;
        }
    </style>
    <table class="container table">
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Room Type</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Guests</th>
        </tr>
        <?php

        if ($result->num_rows > 0) {
            // Loop through all rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['b_id'] . "</td>";
                echo "<td>" . $row['b_email'] . "</td>";
                echo "<td>" . $row['b_room_type'] . "</td>";
                echo "<td>" . $row['b_check_in'] . "</td>";
                echo "<td>" . $row['b_check_out'] . "</td>";
                echo "<td>" . $row['b_guests'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
        <!-- <tr>
            <th>1</th>
            <th>yurin@gmail.com</th>
            <th>Stadard</th>
            <th>5 14 2025</th>
            <th>5 17 2025</th>
            <th>5</th>
        </tr> -->


    </table>

</div>

<?php include "./pages/footer.php"; ?>