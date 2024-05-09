<!DOCTYPE html>
<html>
<head>
  <title>Edit Reservation</title>
  <link rel="stylesheet" type="text/css" href="edit_reservation.css">
</head>
<body>
  <h1>Edit Reservation</h1>

  <?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hotel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

   
    $sql = "SELECT * FROM reservations WHERE id = $reservation_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      ?>
      <form action="uprasavation.php" method="post">
      
        Customer Name: <input type="text" name="customer_name" value="<?php echo $row['customer_name']; ?>"><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
        Contact Number: <input type="text" name="contact_number" value="<?php echo $row['contact_number']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        AAA Membership Number: <input type="text" name="aaa_membership_number" value="<?php echo $row['aaa_membership_number']; ?>"><br>
        Reservation Date: <input type="text" name="reservation_date" value="<?php echo $row['reservation_date']; ?>"><br>
        Reservation Time: <input type="text" name="reservation_time" value="<?php echo $row['reservation_time']; ?>"><br>
        Check Out Time: <input type="text" name="check_out_time" value="<?php echo $row['check_out_time']; ?>"><br>
        Destination: <input type="text" name="destination" value="<?php echo $row['destination']; ?>"><br>
        Number of Attendees: <input type="text" name="num_attendees" value="<?php echo $row['num_attendees']; ?>"><br>
        Room Type: <input type="text" name="room_type" value="<?php echo $row['room_type']; ?>"><br>
        Credit Card Details: <input type="text" name="credit_card_details" value="<?php echo $row['credit_card_details']; ?>"><br>
        Special Requests: <input type="text" name="special_requests" value="<?php echo $row['special_requests']; ?>"><br>
        Room Number: <input type="text" name="room_number" value="<?php echo $row['room_number']; ?>"><br>
        
      
        <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Update Reservation">
        <input type="reset" value="Clear">
        <a href="adminres.php">
            <input type="button"  value="Back">
            </a>
      </form>
      <?php
    } else {
      echo "Reservation not found";
    }
  } else {
    echo "Invalid request";
  }

  $conn->close();
  ?>
</body>
</html>
