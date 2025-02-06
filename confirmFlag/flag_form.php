<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Timer</title>
    <style>
        body {
            display: flex;
            flex-direction: column; /* Aligne les éléments verticalement */
            justify-content: flex-start; /* Aligne les éléments en haut */
            align-items: center; /* Centre horizontalement */
            height: 100vh; /* Prend toute la hauteur de la fenêtre */
            margin: 0; /* Supprime les marges par défaut */
            font-family: Arial, sans-serif; /* Police de caractère */
            background-color: #f4f4f4;
        }

        #timer {
            font-size: 48px; /* Taille de police du timer */
            background-color: #f0f0f0; /* Couleur de fond */
            margin-top: 20px;
            padding: 20px; /* Espacement intérieur */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Ombre portée */
            margin-bottom: 20px; /* Espacement sous le timer */
        }

        #content {
            display: flex;
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
            height: 70vh; /* Prend toute la hauteur de la fenêtre */
        }
        .auth-container{
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        padding: 50px;
        width: 300px;
        animation: slidein 1s;
        }

        .auth-container h2{
        text-align: center;
        color: #333333;

        }

        .auth-form{
        display: flex;
        flex-direction: column;
        }

        .auth-form input{
        padding: 10px;
        margin-top: 15px;
        margin-bottom: 15px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        }

        .auth-form button{
        padding: 10px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        margin-bottom: 5px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }

        .auth-form button:hover{
        background-color: #0056b3;
        }


        @keyframes slidein {
        from {
            transform:translateY(-10%);
        }

        to {

        }
        }

    </style>
</head>
<body>

<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: page1.php"); // Redirection vers la page de connexion si non authentifié
} else {
    $username = $_SESSION['user_id'];
}

$incorrect_flag = $_GET['error'];

// Stocker l'ID utilisateur actuel dans une variable pour comparaison
if (isset($_SESSION['current_user_id'])) {
    $currentUserId = $_SESSION['current_user_id'];
} else {
    $currentUserId = null;
}

if ($currentUserId !== $username) {
    $_SESSION['current_user_id'] = $username; // Met à jour l'ID utilisateur actuel
    echo "<script>localStorage.removeItem('tempsRestant');</script>"; // Réinitialise le timer
}
?>

<div id="timer">30:00</div>
<div id="content">
    <!-- Wrapper -->
    <div class="auth-container">
        <h2>Flag</h2>
        <?php
        echo "
            <form action='flag.php' method='post' class='auth-form'>
            <p>".$incorrect_flag."</p>
                <label for='flag'>Flag :</label>
                
                <input type='text' name='flag' required/><br><br>
                <input type='hidden' name='name' value='".$username."' />
                <button type='submit' value='OK'>OK</button>
            </form>";
        ?>
    </div>
</div>

<script>
    // Durée initiale en secondes (ex. 30 minutes)
    const dureeInitiale = 1800;

    let tempsRestant = localStorage.getItem('tempsRestant');
    let temps; // Déclaration de la variable temps

    // Vérifier si le temps restant existe
    if (tempsRestant) {
        // Si oui, convertir en entier
        temps = parseInt(tempsRestant);
    } else {
        // Sinon, utiliser la durée initiale
        temps = dureeInitiale;
    }

    const timerElement = document.getElementById("timer");

    const mettreAJourTimer = () => {
        let minutes = Math.floor(temps / 60);
        let secondes = temps % 60;

        // Formater les minutes et secondes
        minutes = minutes < 10 ? "0" + minutes : minutes;
        secondes = secondes < 10 ? "0" + secondes : secondes;

        timerElement.innerText = `${minutes}:${secondes}`;

        if (temps > 0) {
            temps--;
            // Sauvegarder le temps restant dans localStorage
            localStorage.setItem('tempsRestant', temps);
        } else {
            clearInterval(intervalId); // Arrête le timer lorsque le temps est écoulé
            localStorage.removeItem('tempsRestant'); // Supprime l'élément de localStorage
            timerElement.innerText = "Temps écoulé !"; // Affiche un message lorsque le temps est écoulé
        }
    };

    const intervalId = setInterval(mettreAJourTimer, 1000);

    // Mettre à jour immédiatement pour afficher le bon temps au chargement
    mettreAJourTimer();

</script>
</body>
</html>
