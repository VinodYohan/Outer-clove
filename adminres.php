<!DOCTYPE html>
<html>
<head>
  <title>Admin - View Reservations</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="adminres.css">
</head>
<body>

<header>
     
     <nav>
         <img src="logo.png" alt="Travelo" class="logo">
         <ul>
 
         <li>
                <a href="adminhome.html">Home</a>
            </li>
            <li>
                <a href="adminres.php">Room Reservation</a>
            </li>
            <li>
                <a href="admin_View_tableRes.php">Dining Appointment</a>
            </li>
            <li>
                <a href="admin_view_orders.php">Food Order</a>
            </li>

             <div class="search">
                 <form class="search-form">
                     <input type="text" placeholder="Search...">
                     <button type="submit" class="search-button">
                         <i class="fa-solid fa-magnifying-glass"></i>
                     </button>
                 </form>
             </div>
             <li class="hambeger">
                 <a href="logout.php">
                 <i class="fa-solid fa-briefcase"></i>
                     <div class="bar"></div>
                     <span id="loggedInUserName" style="display: none;"></span>
                 </a>
             </li>
             </li>
             
             <li class="hambeger">
                 <a href="#">
                     <i class="fa-solid fa-user"></i>
                  <div class="bar"></div>
                 </a>
              <li class="hambeger">
                     <a href="#">
                         <i class="fa-solid fa-gears"></i>
                      <div class="bar"></div>
                 </a>
                 
             </li>
         </ul>
     </nav>
 
   </header>
  <h1>Reservations</h1>
  <form action="adminres.php" method="get"> <!-- Form should enclose the table -->
    <table>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Membership Number</th>
        <th>Reservation Date</th>
        <th>Reservation Time</th>
        <th>Check Out Time</th>
        <th>Destination</th>
        <th>Num Attendees</th>
        <th>Room Type</th>
        <th>Credit Card Details</th>
        <th>Special Requests</th>
        <th>Room Number</th>
        <th>Edit</th>
        <th>Delete</th>
        <!-- Add other relevant columns here -->
      </tr>

      <?php
      // Your PHP code to fetch data from the database goes here
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hotel";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Fetch reservations data from the database
      $sql = "SELECT id, customer_name, address, contact_number, email, aaa_membership_number, reservation_date, reservation_time, check_out_time, destination, num_attendees, room_type, credit_card_details, special_requests, room_number FROM reservations";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          // Output other columns in a similar manner
          // Remember to sanitize and format data as needed
          echo "<td>" . $row['customer_name'] . "</td>";
          echo "<td>" . $row["address"] . "</td>";
          echo "<td>" . $row["contact_number"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["aaa_membership_number"] . "</td>";
          echo "<td>" . $row["reservation_date"] . "</td>";
          echo "<td>" . $row["reservation_time"] . "</td>";
          echo "<td>" . $row["check_out_time"] . "</td>";
          echo "<td>" . $row["destination"] . "</td>";
          echo "<td>" . $row["num_attendees"] . "</td>";
          echo "<td>" . $row["room_type"] . "</td>";
          echo "<td>" . $row["credit_card_details"] . "</td>";
          echo "<td>" . $row["special_requests"] . "</td>";
          echo "<td>" . (isset($row["room_number"]) ? $row["room_number"] : "") . "</td>";
        

          // Edit and Delete links
          echo "<td><a href='admin_edit_reservation.php?id=" . $row['id'] . "'>Edit</a></td>";
          echo "<td><a href='admin_delete_reservation.php?id=" . $row['id'] . "'>Delete</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='16'>No reservations found</td></tr>"; // Adjust colspan based on the number of columns
      }
      $conn->close();
      ?>
    </table>
  </form>
</body>
</html>
