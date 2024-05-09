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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $date = $_POST['date'];
    $partySize = $_POST['party-size'];
    $specialRequests = $_POST['special-requests'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $occasion = $_POST['occasion'];
    $seatingPreference = $_POST['seating-preference'];

    // Prepare SQL insert statement
    $sql = "INSERT INTO treservations (reservation_date, party_size, special_requests, name, phone, email, occasion, seating_preference)
    VALUES ('$date', '$partySize', '$specialRequests', '$name', '$phone', '$email', '$occasion', '$seatingPreference')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to confirmation page
        header("Location: confirmationpage.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
