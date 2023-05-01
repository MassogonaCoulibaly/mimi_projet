
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Apprenants P04</title>
</head>
<body>
        <form method="post" action="enregistrement.php">
        <div class="logo"><img src="image/A.P04_logo.png" alt=""></div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
      
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
      
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br><br>
      
        <input type="submit" value="Enregistrer">
      </form>

      <?php
	// Vérifie si le formulaire est soumis
	if(isset($_POST['submit'])){
		// Récupère les données du formulaire
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date_naissance = $_POST['date_naissance'];
		

		include ('connexionbd.php');


			// Prépare et exécute la requête SQL d'insertion
			$sql = "INSERT INTO apprenant (nom, prenom, date_naissance, ) VALUES (:nom, :prenom, :date_naissance, )";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nom', $nom);
			$stmt->bindParam(':prenom', $prenom);
			$stmt->bindParam(':date_naissance', $date_naissance);
			$stmt->execute();

			echo '<p style="color=black;">Les informations ont été enregistrées avec succès.</p>';
			

	}
	?>

    <!-- Connexion et redirection vers la liste des inscrits -->
    <?php
		// Connexion à la base de données
        include('connexion.php');

		// Vérification si le formulaire a été soumis
		if (isset($_CONNECTION['submit'])) {
			// Récupère les données du formulaire
			$nom = $_CONNECTION['nom'];
			$mdp = $_CONNECTION['mdp'];

			$sql = "SELECT * FROM apprenant WHERE nom='$nom' AND mdp='$mdp'";
			$requete = $conn->prepare($sql);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':mdp', $mdp);
            $requete->execute();
			if ($requete->rowCount() == 1) {
                // La requête a retourné une seule ligne de résultat
                $resultat = $requete->fetch(PDO::FETCH_ASSOC);
                echo'<p style="color=black;">Connecter avec succes!</p>';
                header('Location: inscrit.php');
                exit();
            } else {
				// Si les informations de connexion sont incorrectes, afficher un message d'erreur
				echo '<p style="color:red;">Nom ou mot de passe incorrect</p>';
			}
		}
	?>

      
</body>
</html>


