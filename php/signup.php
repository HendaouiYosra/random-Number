<?php if(isset($_POST['userName']) && isset($_POST['password'])&& isset($_POST['email'])) {
 
    require_once 'adduser.php';

    // Récupération des données du formulaire
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // Appel à une fonction de bibli.php pour enregistrer le livre
    try{ $result = signup($username, $email,$password);}catch(Exception $e){echo''.$e->getMessage().'';}
   

    // Vérification du résultat
    if($result) {
        echo "enregistré avec succès !";
    } else {
        echo "Erreur lors de l'enregistrement du livre.";
    }
} else {
    echo "Veuillez soumettre le formulaire.";
}
?>