<!DOCTYPE html>

<html>
	<!-- Head -->
	<head>
		<!-- CSS files -->
		<!-- <link rel='stylesheet' type='text/css' href='./css/00_reset.css' media='screen' /> -->
		<link rel='stylesheet' type='text/css' href='./css/01_mobile.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/webDesign1.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/web2.css' media='screen' />


		<!-- JS files -->
		<script type='text/javascript' src='./js/jquery-3.5.1.min.js'></script>
		<script type='text/javascript' src='./js/jquery-ui.min.js'></script>
		<script type='text/javascript' src='./js/ajax.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no">

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./design/favicon.png' />

		<!-- Title -->
		<title>Template</title>
	</head>

	<style>

body{
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .auth-container{
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      padding: 20px;
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


<!--
    <form action="authentification.php" class="auth-form" method="POST">

        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="password">Mot de Passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" value="Se connecter">Se connecter</button>
    </form>
      <a href="anonymous_connection.php">Connexion Anonyme</a>

    </div> -->

	<!-- Body -->

  <?php

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: flag_form.php"); // Redirection vers la page de connexion si non authentifié
}

  ?>
	<body>
		<!-- Wrapper -->
		<div class="auth-container">
			<h2>Identification</h2>
				<form action='addUser.php' method='post' class="auth-form">
					<label for="nom">Nom :</label>
					<input type='text' name='nom' required/><br><br>

					<button type='submit' value='OK' >OK</button>
				</form>
		</div>
	</body>
</html>
