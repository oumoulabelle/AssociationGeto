<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des inscrits</title>
    <link rel="stylesheet" href="liste1.css">
</head>
<body>
    <br><br><br>
    <button><a href="Benevola en afrique.html">Déconnexion</a></button>
    <button><a href="Liste2.php">Postulation</a></button>

    <?php
    $bdb = new PDO('mysql:host=localhost;dbname=benevolat;', 'root', '');
    if (!$bdb) {
        die("Connection failed: " . $bdb->errorInfo()[2]);
    }

    $sql = "SELECT * FROM inscription";
    $result = $bdb->query($sql);

    if ($result->rowCount() > 0) {
        ?>
        <table class="table" style="font-size: 19px">
            <thead>
            <tr>
                <th>id</th>
                <th>pseudo</th>
                <th>mot de passe</th>
                <th>Email</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <hr>
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr class="res">
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["pseudo"]; ?></td>
                    <td><?php echo $row["mdp"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><a href="supprimer.php?id=<?=$row["id"]?>"><img src="img/im4.png" style="height:35px;width:35px;"/></a></td>
                </tr>
                <?php
            }
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
