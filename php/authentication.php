<?php
function authenticateUser($username, $password) {
    $connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

    // Query to retrieve user with the given username and password (you should use prepared statements to prevent SQL injection)
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    $result = mysqli_query($connexion, $query);

    // Check if there's a matching user
    if (mysqli_num_rows($result) > 0) {
        header("Location: /TopicListing-1.0.0/gamechoice.html"); 
        return true;
    } else {
        // No matching user found, authentication failed
        return false;
    }
}
?>
