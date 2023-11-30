<?php
// Établir une connexion à la base de données
$servername = "localhost"; // Ou l'adresse de votre serveur
$username = "root"; // Votre nom d'utilisateur MySQL
$password = ""; // Votre mot de passe MySQL
$dbname = "randomgame"; // Le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $password = $_POST['pwd'];

    // Requête pour vérifier l'existence des identifiants
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Identifiants valides, connectez l'utilisateur
        echo "Connexion réussie";
        // Vous pouvez rediriger l'utilisateur vers une autre page ici
    } else {
        // Identifiants invalides, affichez un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
