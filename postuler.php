<?php 
require("co.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>postuler</title>
    <style>
        body {
           
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(img/im1.png);
            background-size: cover;
            background-position: center;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .mix {
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 21px;
        margin-left:400px;
        margin-right:200px;
    }

    .mix.success {
        color: green;
        font-size:30px;
    }

    .mix.error {
        color: red;
    }
   
    .mixa {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        margin-left:600px;
        width:400px;
    }

    .mixa:hover {
        background-color: #45a049;
    }
    a{
        text-decoration:none;
        color:black;
        font-size:20px;

    }
    .mixture{
        margin-TOP:-300px;
    }

.mixture{
    list-style: none;
    font-size: 20px;
    margin-bottom: 10px;
}

.mixture::before {
   
    display: inline-block;
    margin-right: 10px;
    color: green;
}

</style>


    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="nomb">Entrez le domaine :</label>
        <input type="text" name="nomb" id="nomb" required><br><br>

        <label for="nomb">Entrez votre pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" required><br><br>
        <input type="submit" name="valider" value="Valider">
    </form>

<div class="mix">
<?php

    require("co.php");

    if (isset($_POST['valider'])) {
        $nomb = $_POST['nomb'];
        $pseudo = $_POST['pseudo'];

        // Vérifier si le domaine existe dans la table benevolats
        $sqlDomaine = "SELECT * FROM benevolats WHERE nomb = ?";
        $stmtDomaine = mysqli_prepare($connexion, $sqlDomaine);
        mysqli_stmt_bind_param($stmtDomaine, "s", $nomb);
        mysqli_stmt_execute($stmtDomaine);
        $resultatDomaine = mysqli_stmt_get_result($stmtDomaine);

        if (!$resultatDomaine) {
            die("Erreur de requête : " . mysqli_error($connexion));
        }

        if (mysqli_num_rows($resultatDomaine) > 0) {
            echo "Bienvenue dans le domaine : " . $nomb . "<br>";
        } else {
            echo "Le domaine n'existe pas dans la table benevolats.<br>";
        }

        if (!empty($pseudo)) {
            // Vérifier si le pseudo existe dans la table inscription
            $sqlPseudo = "SELECT * FROM inscription WHERE pseudo = ?";
            $stmtPseudo = mysqli_prepare($connexion, $sqlPseudo);
            mysqli_stmt_bind_param($stmtPseudo, "s", $pseudo);
            mysqli_stmt_execute($stmtPseudo);
            $resultatPseudo = mysqli_stmt_get_result($stmtPseudo);

            if (!$resultatPseudo) {
                die("Erreur de requête : " . mysqli_error($connexion));
            }

            if (mysqli_num_rows($resultatPseudo) > 0) {
                echo "Pseudo : " . $pseudo . "<br>";

                // Récupérer l'id de l'utilisateur
                $row = mysqli_fetch_assoc($resultatPseudo);
                $idUtilisateur = $row['id'];

                // Vérifier si le domaine existe dans la table benevolats
                $sqlDomaine = "SELECT * FROM benevolats WHERE nomb = ?";
                $stmtDomaine = mysqli_prepare($connexion, $sqlDomaine);
                mysqli_stmt_bind_param($stmtDomaine, "s", $nomb);
                mysqli_stmt_execute($stmtDomaine);
                $resultatDomaine = mysqli_stmt_get_result($stmtDomaine);

                if (mysqli_num_rows($resultatDomaine) > 0) {
                    // Récupérer l'id du domaine
                    $rowDomaine = mysqli_fetch_assoc($resultatDomaine);
                    $idDomaine = $rowDomaine['idb'];

                    // Insérer les données dans la table postulons
                    $sqlInsert = "INSERT INTO postulons (idpos, id, idb) VALUES (null, ?, ?)";
                    $stmtInsert = mysqli_prepare($connexion, $sqlInsert);
                    mysqli_stmt_bind_param($stmtInsert, "ii", $idUtilisateur, $idDomaine);
                    $resultatInsert = mysqli_stmt_execute($stmtInsert);

                    if ($resultatInsert) {
                        echo "";
                    } else {
                        echo "Erreur lors de l'insertion des données dans la table postulons : " . mysqli_error($connexion);
                    }
                } else {
                    echo "Le domaine n'existe pas dans notre base, veuillez inserer un domaine valide.";
                }
            } else {
                echo "Vous n'existez pas dans notre base, merci de mettre votre vrai pseudo .<br>";
            }
        } else {
            echo "Votre pseudo est vide.<br>";
        }
    }

    mysqli_close($connexion);
    ?>
    </div>

<br><br>
<button class="mixa"><a href="bene.php">Ok</a></button>
<h1></h1>
<div class="mixture">
✔️ luttons contre le sida <br><br>
✔️ partage de nourriture <br><br>
✔️ reboisement<br><br>
✔️ ensemble contre la pauvrété<br><br>
✔️ ensembles à l'école<br><br>
✔️ Environement propre<br><br>
✔️  Environement propre<br><br>
✔️ Hopital à tous<br><br>
</div>

</body>
</html>
