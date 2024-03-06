<?php
  require("co.php");

// Vérifier si la connexion a réussi
if (!$connexion) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$id = $_GET['idpos'];

$req = mysqli_query($connexion, "DELETE FROM postulons WHERE idpos = $id");

header("Location: liste2.php");

// Fermer la connexion lorsque vous avez terminé
mysqli_close($connexion);
?>
