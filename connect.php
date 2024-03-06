<?php
session_start();
$bdb = new PDO('mysql:host=localhost;dbname=benevolat;', 'root', '');

if (isset($_POST['envoi'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $bdb->prepare('SELECT * FROM inscription WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));

        if ($recupUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: bene.php');
            exit;
        } else {
            echo "Mot de passe et pseudo incorrect";
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: url(img/im1.jpg);
    }

    form {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 300px;
        margin-left: 500px;
        margin-top: 100px;
        box-shadow: 0 0 60px rgba(8, 7, 7, 0.5);
        border-top: none;
        border-right: none;
    }

    input[type="text"],
    input[type="password"] {
        display: block;
        margin-bottom: 10px;
        padding: 5px;
        width: 100%;
        height: 25px;
        border-top: none;
        border-left: none;
        padding-left: 10px;
        background: transparent;
        border-right: 1px solid black;
        border-bottom: 1px solid black;
        cursor: pointer;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: 1px solid black;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    p{
        padding-left:520px;
        font-size:35px;
        font-family:cursive;
    }
    a{
        text-decoration:none;
        color:blue;
        font-size:16px;
    }
    </style>
</head>
<body>
    <p>Connectez-vous</p>
    <form action="" method="POST">
        <label for="pseudo">Votre pseudo</label> <br><br>
        <input type="text" name="pseudo" autocomplete="off" required>
        <br><br>
        <label for="mdp">Votre mot de passe</label> <br><br>
        <input type="password" name="mdp" autocomplete="off" required><br><br>
        <hr>
        <input type="submit" name="envoi" value="Se connecter">
        <h6><a href="inscription.php">M'inscrire</a></h6>
    </form>
</body>
</html>
