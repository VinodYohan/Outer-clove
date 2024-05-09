<?php
// Establish a database connection
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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
    $special_requests = mysqli_real_escape_string($conn, $_POST['special_requests']);

    // Insert into database
    $sql = "INSERT INTO orders (name, phone, email, room_number, special_requests) VALUES ('$name', '$phone', '$email', '$room_number', '$special_requests')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to confirmation page
        header("Location: corder.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
