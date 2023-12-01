<?php
session_start();

function authenticateUser($username, $password) {
    $connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

    // Query to retrieve user with the given username and password (you should use prepared statements to prevent SQL injection)
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    $result = mysqli_query($connexion, $query);

    // Check if there's a matching user
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Store username and score in session
        $_SESSION['username'] = $user['username'];
        $_SESSION['score'] = $user['score'];
        
        return true;
    } else {
        // No matching user found, authentication failed
        return false;
    }
}
?>
