<?php

function signup($username, $email, $password) {
    $connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

    // Omitting the 'id' field from the INSERT query to allow the database to handle auto-increment
    $query = "INSERT INTO user (username, password, email, score) VALUES ('$username', '$password', '$email', 0)";

    $result = mysqli_query($connexion, $query);

    return $result;
}

?>
