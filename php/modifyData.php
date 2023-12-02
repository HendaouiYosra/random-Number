<?php
$connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    // Fetch the score and ID from the received JSON data
    $newValue = $data['score'];
    $id = $data['id'];

    // Update the 'score' column for the specified 'id'
    $sql = "UPDATE user SET score = '$newValue' WHERE id = $id";

    // Execute the SQL query
    $result = mysqli_query($connexion, $sql);

    // Check if the query executed successfully
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connexion));
        exit();
    }

    // Return a success message
    echo "Data modified successfully";
} else {
    // If the request method is not POST, handle accordingly (optional)
    echo "Invalid request method";
}
?>
