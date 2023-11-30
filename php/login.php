<?php
if (isset($_POST['userName']) && isset($_POST['password'])) {
    require_once 'authentication.php'; // Include file containing login authentication logic
    
    // Get input values from the form
    $username = $_POST['userName'];
    $password = $_POST['password'];
    
    // Call a function to authenticate login credentials
    try {
        $isAuthenticated = authenticateUser($username, $password); // Replace with your authentication logic
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

    // Check the authentication result
    if ($isAuthenticated) {
        header("Location: /TopicListing-1.0.0/gamechoice.html"); // Replace 'dashboard.php' with the desired destination
        exit();
        
    } else {
        echo "Incorrect username or password.";
    }
} else {
    echo "Please submit the login form.";
}
?>
