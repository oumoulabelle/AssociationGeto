<?php
session_start();
if (isset($_POST['envoyer'])) {
    if (!empty($_POST['emailL']) && !empty($_POST['motpass'])) {
        $email = "oumou@gmail.com";
        $motpass = "tini";

        $email_s = htmlspecialchars($_POST['emailL']);
        $motpass_s = htmlspecialchars($_POST['motpass']);

        if ($email_s == $email && $motpass_s == $motpass) {
            $_SESSION['motpass'] = $motpass_s;
            header('Location: liste1.php');
            exit;
        } else {
            echo "Email et mot de passe incorrects";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">

     <style>
        .form-control{
            width: 300px;
            background: transparent;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        body{
            background-image: url(img/im1.png);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }
        form{
            width: 400px;
            background: transparent;
            border: 1px solid black;
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 40px black;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-left: 500px;
            margin-top: -23px;
            padding-bottom: 20px;
            padding-left: 50px;
            animation: animateBg 5s linear infinite;
        }
        label{
            font-size: 18px;
        }
        .btn{
            width: 300px;
        }
     </style>
</head>
<body>
    <br><br><br>

   <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="emailL">
                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Password :</label>
                        <input type="password" class="form-control" name="motpass">
                    </div>
                    <input type="submit" name="envoyer" class="btn btn-danger" value="Se connecter">
                </form>
            </div>
         </div>
       </div>
   </div>
</body>
</html>
