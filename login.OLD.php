<?php

$conn = mysqli_connect('localhost','root','','hotel');


    $username = $_GET['username'];
    $password = $_GET['pass'];

    $query = "SELECT * FROM signup WHERE username = ? AND pass=?";
    $stm = $conn->prepare($query);
    $stm->bind_param("ss", $username, $password);
    $stm->execute();
    $result = $stm->get_result();
   

    if ($username === $correctUsername && $password === $correctPassword) {
        // Return a success message as JSON response
       // $response = array('success' => true, 'message' => 'Login successful');
        echo '<script>window.location.href = "Home.html";</script>';
    } else {
        // Return an error message as JSON response
        //$response = array('success' => false, 'message' => 'Incorrect username or password');
        echo "Invalide username or password. please try again";
    }
$stmt->close();
$conn->close();

?>