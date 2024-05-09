<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['addres'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Create connection
    $conn = new mysqli("localhost","root","","hotel");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO signup (firstName, lastName, addres, telephone, email, gender, birthday,username,pass) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("sssssssss", $firstName, $lastName, $address, $telephone, $email, $gender, $birthday ,$username, $password);
    
    if ($stmt->execute()) {
        $response = array('success' => true, 'message' => 'Signup successful');
        echo "<script>window.location.href='login.html';</script>";
    } else {
        $response = array('success' => false, 'message' => 'Failed to signup');
    }

    $stmt->close();
    $conn->close();


?>


