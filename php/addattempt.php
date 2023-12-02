<?php 
session_start();
error_log('attempt', 3, 'log_file.log');
    $connexion = mysqli_connect('localhost', 'root', '', 'randomgame');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        // Fetch the score and ID from the received JSON data
        $attempt_num = $data['attempt_num'];
        $value = $data['value'];
        $message = $data['message'];
        $id = $data['id'];
        $insert_query = "INSERT INTO attempt (attempt_num, value,message,id_game) VALUES ('$attempt_num', '$value','$message','$id')";
    $result = mysqli_query($connexion, $insert_query);

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
