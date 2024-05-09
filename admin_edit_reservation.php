<?php


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    
    $reservation_id = $_GET['id'];

   
    header("Location: edit_reservation_form.php?id=" . $reservation_id);
    exit();
} else {
  
    echo "Invalid request";
}
?>
