<?php
// admin_delete_reservation.php

// Check if the request method is GET and ID is set in the URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the reservation ID from the URL parameter
    $id = $_GET['id'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to delete the reservation
    $sql = "DELETE FROM reservations WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error in preparing statement: " . $conn->error;
    } else {
        // Bind the ID parameter and execute the query
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Check if deletion was successful
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Reservation deleted successfully!'); window.location.href = 'adminres.php';</script>";
        } else {
            echo "No reservation found with that ID";
        }
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
