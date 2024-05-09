<?php      
    session_start();
    include('connect.php');
    
    if(isset($_GET['username']) && isset($_GET['pass'])) {
        $username = $_GET['username'];  
        $password = $_GET['pass'];  

        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  

        $sql = "SELECT * from signup where username = '$username' and pass = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count == 1){  
            // Login successful - set session variable
            $_SESSION['login_success'] = true;
            header("Location: userhome.html"); // Redirect to userhome.html
            exit;
        }  
        else{  
            // Login failed - redirect with error message
            $error_message = "Invalid username or password";
            header("Location: login.html?error_message=$error_message"); // Redirect to login.html with error message
            exit;
        }
    } else {
        // Redirect to login page if username or password are not set
        header("Location: login.html");
        exit;
    }
?>
