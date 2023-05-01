<?php

// Vérifie si le formulaire est soumis
if(isset($_POST['submit'])){
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];

    include ('connexion.php');


        // Prépare et exécute la requête SQL d'insertion
        $sql = "INSERT INTO `apprenantsp04`(`nom`, `prénom`, `date_de_naissance`) VALUES (:nom, :prenom, :date_naissance,)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->execute();

        echo '<p style="color=black;">Les informations ont été enregistrées avec succès.</p>';
        

}
?>