<?php 
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id']; // Get the user ID from the URL query parameter

    // Fetch all attempts for the specified user ID
    $select_query = "SELECT * FROM attempt WHERE id_game= '$id'";
    $result = mysqli_query($connexion, $select_query);

    if ($result) {
        $attempts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            // Append fetched attempts to the array
            $attempts[] = $row;
        }

        // Convert the attempts array to JSON and output it
        header('Content-Type: application/json');
        echo json_encode($attempts);
    } else {
        echo "Error fetching attempts: " . mysqli_error($connexion);
    }
} else {
    // If the request method is not GET, handle accordingly (optional)
    echo "Invalid request method";
}
?>
