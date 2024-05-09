<?php
// create the database connection

$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel";

//creting the conneection

$conn = new mysqli($servername,$username,$password,$database);


// check connection
if($conn->connect_error){
    die("Connection Failed;".conn->connect_error);
}

//retreive the data from signup table

if($_SERVER ["REQUEST_METHOD"]=="POST"){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["addres"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];
    $username = $_POST["username"];
    $password = $_POST["pass"];


    //sql query to insert data from the table

    $sql = "INSERT INTO signup(firstName, lastName, addres, telephone, email, gender, birthday,username,pass) VALUES ("sssssssss", $firstName, $lastName, $address, $telephone, $email, $gender, $birthday ,$username, $password)";

    if($conn->query($sql)===TRUE){
        echo "New record created succesfully";

    }else{
        echo "Error",$sql."<br>".conn->error;
    }

}

//close connection
$conn->close();

?>