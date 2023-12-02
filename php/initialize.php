<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $data['id'];

    // Fetch game history
    $select_query = "SELECT * FROM attempt WHERE id_game = '$id'";
    $result = mysqli_query($connexion, $select_query);

    if ($result) {
        $history = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $history[] = $row;
        }
    } else {
        echo "Error fetching game history: " . mysqli_error($connexion);
        exit();
    }

    // Fetch number to guess
    $select_query = "SELECT number_to_guess FROM game WHERE id = '$id'";
    $result = mysqli_query($connexion, $select_query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $number_to_guess = $row['number_to_guess'];
    } else {
        echo "Error fetching number to guess: " . mysqli_error($connexion);
        exit();
    }

    // Prepare data to be sent as JSON response
    $response = array(
        "history" => $history,
        "number_to_guess" => $number_to_guess
    );

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo "Invalid request method";
}
?>
