<?php
// Connect to the database
$connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

if ($_SERVER["REQUEST_METHOD"] == "DELETE" || $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'] == 'DELETE') {
    // Assuming you receive the ID of the record to delete via a DELETE request
    $id = $_GET['id']; // You can adjust this based on your API endpoint

    // Construct the DELETE query
    $delete_query = "DELETE FROM attempt WHERE id_game = '$id'";
    $result = mysqli_query($connexion, $delete_query);

    if (!$result) {
        printf("Error: %s\n", mysqli_error($connexion));
        exit();
    }

  
} else {
    // If the request method is not DELETE, handle accordingly (optional)
    echo "Invalid request method";
}
?>
