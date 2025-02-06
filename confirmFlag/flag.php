<?php
include_once("./utils.php");

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: page1.php");
    exit();
}

$flag = $_POST['flag'];
$username = $_POST['name'];

if (mb_strtolower($flag) == "pekin daxing") {
    $servername = "localhost";
    $user = "root";
    $password = "root";
    $dbname = "EscapeGame";

    // Database connection
    $db = mysqli_connect($servername, $user, $password, $dbname);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE tblUsers SET ChallengeComplete = 1, HeureFin = NOW() WHERE participant = '$username';";
	if (!$db->query($query)) fail($db);

    $query = "SELECT * FROM tblUsers WHERE participant LIKE '$username';";
    $result = $db->query($query);
    $numRows = $result->num_rows;

    while ($row = $result->fetch_assoc()) {
        $date_debut = new DateTime($row['time']);
        $date_fin = new DateTime($row['HeureFin']);
        $interval = $date_fin->diff($date_debut);
        $sec = ($interval->days * 86400) + ($interval->h * 3600) + ($interval->i * 60) + $interval->s;
        session_destroy();
    }

    $query = "UPDATE tblUsers SET secondes = '$sec' WHERE participant = '$username';";
	if (!$db->query($query)) fail($db);

	$query = "SELECT * FROM tblUsers ORDER BY secondes ASC;";
	$result = $db->query($query);
	$numRows = $result->num_rows;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Participants</title>
</head>
<body>


<div class="confetti-container"></div>
<h1>Liste des Participants</h1>

<style> 
    body {
    color:white;
    font-family: Popins, sans-serif;
    margin: 0;
    padding: 0;
    overflow: hidden; /* Empêche le défilement */
    background-color: #000000; /* Couleur de fond */
    overflow-y: auto;
    
    }

    .confetti-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* backdrop-filter: blur(3px); */
    pointer-events: none; /* Empêche les interactions avec les confettis */
    }

    .confetti {
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: red; /* Couleur par défaut */
    opacity: 0.7;
    border-radius: 50%; /* Forme ronde */
    }

    @keyframes fall {
    to {
        transform: translateY(100vh) rotate(360deg);
        opacity: 0; /* Les confettis disparaissent progressivement */
    }
    }

    h1 {
            text-align: center;
            font-size: 48px; /* Taille du titre */
        }
</style>


<script> 

const confettiContainer = document.querySelector('.confetti-container');

// Fonction pour créer un confetti
function createConfetti() {
    const confetti = document.createElement('div');
    confetti.classList.add('confetti');

    // Position aléatoire
    confetti.style.left = Math.random() * window.innerWidth + 'px';
    confetti.style.top = '-10px';

    // Couleur aléatoire
    const colors = ['#FFC107', '#FF5722', '#4CAF50', '#2196F3', '#9C27B0'];
    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

    // Taille aléatoire
    const size = Math.random() * (15 - 5) + 5; // Entre 5px et 15px
    confetti.style.width = size + 'px';
    confetti.style.height = size + 'px';

    // Animation
    const duration = Math.random() * (5 - 2) + 2; // Entre 2s et 5s
    confetti.style.animation = `fall ${duration}s linear`;

    // Ajout au conteneur
    confettiContainer.appendChild(confetti);

    // Suppression après l'animation
    setTimeout(() => {
        confetti.remove();
    }, duration * 1000);
}

// Générer des confettis à intervalles réguliers
setInterval(createConfetti, 2); // Un nouveau confetti toutes les 50ms
</script>

    <style>
        .tableau {
            margin: 0;
            display: flex;
            justify-content: center; /* Centre horizontal */
            align-items: center; /* Centre vertical */
            /* backdrop-filter: blur(3px); */
        }

        .message {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            backdrop-filter: blur(4px);
        }
        
        th, td {
            /* border: 3px solid black;  */
            font-size: 24px; /* Augmenter la taille du texte */
            padding: 10px; /* Ajouter un peu d'espace entre les cellules et le texte */
        }
        
        .message {
            text-align: bottom;
            font-size: 20px; /* Taille du message final */
        }
    </style>

<div style="height: 700px; overflow-y: auto;">
<div class="tableau">
<table style="">
  <thead>
      <tr>
          <th>Rang</th>
          <th>Groupe</th>
          <th>Temps</th>
      </tr>
  </thead>
  <tbody>

<?php

$increment = 0;
while ($row = $result->fetch_assoc()) {
	echo "<tr>";
    $increment = $increment + 1;
    if ($increment == 1 ){ echo "<td>" . $increment . "🏆</td>";}
    else if ($increment == 2 ){echo "<td>" . $increment . "🥈</td>";}
    else if ($increment == 3 ){echo "<td>" . $increment . "🥉</td>";}

    else {
        echo "<td>" . $increment . "</td>";
    }
	echo "<td>" . htmlspecialchars($row['participant']) . "</td>";
	// echo "<td>" . htmlspecialchars($row['time']) . "</td>";
    $date_debut = new DateTime($row['time']);
    $date_fin = new DateTime($row['HeureFin']);
    $interval = $date_fin->diff($date_debut);
    echo "<td>" . $interval->format('%i minute(s) %s seconde(s)') . "</td>";
	echo "</tr>\n";
}

$result->close();
$db->close();

?>

  </tbody>  
</table>
</div>
</div>
<p class="message">Bravo vous avez réussi à retrouver la trace d'Antoine ! Maintenant évacuez !!! </p>




</body>

<?php

} else {
	header("Location: flag_form.php?error=Flag incorrect !");
}
?>
<?php

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             if ($username == $row['participant']) {
//                 
//             }
//         }
//     } else {
//         echo "Aucun résultat trouvé.";
//     }

// } else {
//     

?>