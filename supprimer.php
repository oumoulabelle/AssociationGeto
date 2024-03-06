<?php
  require("co.php");

// Vérifier si la connexion a réussi
if (!$connexion) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$id = $_GET['id'];

$req = mysqli_query($connexion, "DELETE FROM inscription WHERE id = $id");

header("Location: liste1.php");

// Fermer la connexion lorsque vous avez terminé
mysqli_close($connexion);
?>
