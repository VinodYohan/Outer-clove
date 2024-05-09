<?php
// Establish database connection (Replace with your database credentials)
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

// Check if reservation ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL to delete the reservation
    $sql = "DELETE FROM treservations WHERE id = $id"; // Replace with your table name
    $result = $conn->query($sql);

    if ($result === TRUE) {
        /*echo "Reservation deleted successfully";*/
      echo "<script>alert('Reservation deleted successfully!'); window.location.href = 'admin_View_tableRes.php';</script>";
        // You can redirect or perform any other action after deletion
    } else {
        echo "Error deleting reservation: " . $conn->error;
    }
} else {
    echo "Reservation ID not provided";
}

$conn->close();
?>
