<?php
// Établir la connexion à la BDD
$serveur = 'localhost';
$utilisateur = 'root';
$mot_de_passe = '';
$bdd = 'Projet_Web';

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $bdd);

// Vérifier la connexion
if (!$connexion) {
    die('Erreur de connexion à la BDD : ' . mysqli_connect_error());
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$pays = $_POST['pays'];
$categorie = $_POST['options'];
$mess = password_hash($_POST['mess'], PASSWORD_DEFAULT);
$newsletter = isset($_POST['newsletter']) ? 1 : 0;

// Enregistrez $informationChiffree et $iv dans votre base de données ou utilisez-les selon vos besoins



//Préparer et exécuter la requête d'insertion
$sql = "INSERT INTO informations (nom, email, pays, categorie, mess, newsletter) 
VALUES ('$nom', '$email', '$pays', '$categorie', '$mess', '$newsletter')";
if (mysqli_query($connexion, $sql)) {
    header("Location: contact.html"); // Redirection vers le formulaire
    exit();
} else {
    $message = "Erreur lors de l'enregistrement : " . mysqli_error($connexion);
    // Afficher le message d'erreur et revenir au formulaire
    echo '<script>alert("' . $message . '"); window.location.href = "contact.html";</script>';
}
// Fermer la connexion
mysqli_close($connexion);
?>