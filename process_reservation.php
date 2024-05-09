<?php
// Establish connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and get form data
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $aaa_membership_number = mysqli_real_escape_string($conn, $_POST['aaa_membership_number']);
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $check_out_time = $_POST['check_out_time'];
    $destination = $_POST['destination'];
    $num_attendees = $_POST['num_attendees'];
    $room_type = $_POST['room_type'];
    $credit_card_details = mysqli_real_escape_string($conn, $_POST['credit_card_details']);
    $special_requests = mysqli_real_escape_string($conn, $_POST['special_requests']);

    // Generate a random room number between 1 and 1000 (as an example)
    $room_number = mt_rand(1, 1000);

    // Insert into the database
    $sql = "INSERT INTO reservations (customer_name, address, contact_number, email, aaa_membership_number, reservation_date, reservation_time, check_out_time, destination, num_attendees, room_type, credit_card_details, special_requests, room_number)
            VALUES ('$customer_name', '$address', '$contact_number', '$email', '$aaa_membership_number', '$reservation_date', '$reservation_time', '$check_out_time', '$destination', '$num_attendees', '$room_type', '$credit_card_details', '$special_requests', '$room_number')";

    if ($conn->query($sql) === TRUE) {
        $conn->close(); // Close the connection
        echo "<script>alert('Reservation successfully added!'); window.location.href = 'userrasavation.html';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the connection
} else {
    echo "<script>alert('Form not submitted'); window.location.href = 'userrasavation.html';</script>";
}
?>
