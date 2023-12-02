<?php 



    $connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        // Fetch the score and ID from the received JSON data
        $number_to_guess = $data['number_to_guess'];
        $id = $data['id'];
        $insert_query = "INSERT INTO game (number_to_guess, id) VALUES ('$number_to_guess', '$id')";
    $result = mysqli_query($connexion, $insert_query);

    if (!$result) {
        printf("Error: %s\n", mysqli_error($connexion));
        exit();
    }
    $inserted_id = mysqli_insert_id($connexion);

    // Store the ID in the session storage
    if (!empty($inserted_id)) {
        echo "Data modified successfully";
        // Start the session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Store the ID in the session storage
        $_SESSION['game_id'] = $inserted_id;
    } else {
        echo "Failed to retrieve the inserted ID";
    }

    // Return a success message
    echo "Data modified successfully";
} else {
    // If the request method is not POST, handle accordingly (optional)
    echo "Invalid request method";
}
?>
