<?php
// admin_delete_order.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
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

    // Prepare and execute the SQL statement to delete the order
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error in preparing statement: " . $conn->error;
    } else {
        // Bind the ID parameter and execute the query
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Check if deletion was successful
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Order deleted successfully!'); window.location.href = 'admin_view_orders.php';</script>";
        } else {
            echo "No order found with that ID";
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
