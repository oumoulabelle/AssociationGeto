<?php 
session_start();
  $bdb = new PDO('mysql:host=localhost;dbname=benevolat;','root','');
   if(isset($_POST['envoi'])){
      if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['email'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $email = htmlspecialchars($_POST['email']);
        $insertUser = $bdb->prepare('INSERT INTO inscription(pseudo, mdp, email) VALUES(?, ?, ?)');
        $insertUser->execute(array($pseudo, $mdp, $email));

        $recupUser = $bdb->prepare('SELECT * FROM inscription WHERE pseudo = ? AND mdp = ? AND email = ?');
        $recupUser->execute(array($pseudo, $mdp, $email ));
        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            
        }



        echo $_SESSION['id'] ;
        header('location: bene.php');


        
      }else{
        echo 'donné incorcte';
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="ins.css">
</head>
<body>

    <p> Inscrivez-vous sur notre plateforme</p>

<form action="" method="POST" align="center">
  <label for="">Entrer votre pseudonyme :</label><br><br>
     <input type="text" name="pseudo" required>
     <br><br>
     <label for="">Entrer votre mot de passe :</label><br><br>
     <input type="password" name=mdp required><br><br>

<label for="">Entrer votre email :</label><br><br>
     <input type="email" name=email required><br><br>

     <input type="submit" name="envoi">
</form>
    
</body>
</html>