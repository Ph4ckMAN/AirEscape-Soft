<!DOCTYPE html>


<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: page1.php"); // Redirection vers la page de connexion si non authentifié
}
if (isset($_SESSION['user_id'])) {
    header("Location: flag_form.php"); // Redirection vers la page de connexion si non authentifié
}


$username = $_POST['nom'];

$servername = "localhost"; // Nom du serveur
$user = "root"; // Nom d'utilisateur
$password = "root"; // Mot de passe
$dbname = "EscapeGame"; // Nom de la base de données

// Créer une connexion
$db = mysqli_connect($servername, $user, $password, $dbname);
	// DB insert
	$query = "INSERT INTO tblUsers (id, participant, time, ChallengeComplete, HeureFin) VALUES (NULL, '$username', NOW(), 0, NULL);";
	$success = $db->query($query);

	if (!$success) logout($db);	
	
	$lastInsertedId = $db->insert_id;

	$_SESSION['user_id']=$username;
	header("Location: flag_form.php");

?>
