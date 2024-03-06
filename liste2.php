<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrits</title>
    <link rel="stylesheet" href="liste1.css">
</head>
<body>
<br><br><br>
    <button><a href="Benevola en afrique.html">Déconnexion</a></button>
    <button><a href="liste1.php">Inscrits</a></button>

<?php
require("co.php");
$sql = "SELECT p.idpos, i.pseudo, b.nomb FROM postulons p 
        INNER JOIN inscription i ON p.id = i.id
        INNER JOIN benevolats b ON p.idb = b.idb";
$result = $connexion->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table class="table" style="font-size: 19px">
        <thead>
        <tr>
            <th>id</th>
            <th>pseudo</th>
            <th>Domaine</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <hr>
        <?php
        while ($row = $result->fetch_assoc()) :
            ?>
            <tr class="res">
                <td><?php echo $row["idpos"]; ?></td>
                <td><?php echo $row["pseudo"]; ?></td>
                <td><?php echo $row["nomb"]; ?></td>
                <td><a href="supprimer2.php?idpos=<?=$row["idpos"]?>"><img src="img/im4.png" style="height:35px;width:35px;"/></a></td>
       
            </tr>
            <?php
        endwhile;
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Aucun inscrit";
}
?>
</body>
</html>
