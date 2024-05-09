<!DOCTYPE html>
<html>
<head>
    <title>Admin - View Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="admin_view_orders.css">

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
    <h1>Orders</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Room Number</th>
            <th>Special Requests</th>
            <th>Delete</th>
        </tr>

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hotel";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT id, name, phone, email, room_number, special_requests FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['room_number'] . "</td>";
                echo "<td>" . $row['special_requests'] . "</td>";

               
                // echo "<td><a href='admin_edit_order.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='admin_delete_order.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No orders found</td></tr>"; 
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
