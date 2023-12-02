<?php 
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assuming you receive the user ID through the URL query parameter
    $id = $_GET['id'];

    // Fetch game for the specified user ID
    $select_query = "SELECT * FROM game WHERE id = '$id'";
    $result = mysqli_query($connexion, $select_query);

    if ($result) {
        $game = mysqli_fetch_assoc($result);

        // Check if the game exists
        if ($game) {
            // Convert the game details to JSON and output it
            header('Content-Type: application/json');
            echo json_encode($game);
        } else {
            echo "No game found for the given user ID";
        }
    } else {
        echo "Error fetching game: " . mysqli_error($connexion);
    }
} else {
    // If the request method is not GET, handle accordingly (optional)
    echo "Invalid request method";
}
?>
