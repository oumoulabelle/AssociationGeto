
<?php 
   require_once('db.php');
   require_once('fonctions.php');

  if(empty("valider")) {
    $errors = [];

   //pseudo
 if (!empty($_POST['username']) || !preg_match("#^[a-zA-Z0-9_]+$#",$_POST['username'])) {
        $errors['username'] = "votre pseudo n'est pas valide";

  }else{
        //SELECT * FROM admin WHERE username = post
        $query = "SELECT * FROM admin WHERE username = ?";
        $req = $pdo->prepare($query);
        $req->execute([$_POST['username']]);
        if ($req->fetch()){
            $errors['username'] = "ce pseudo n'est pas disponible";
        }
  }
   //email

  if (!empty($_POST['emailL']) || !filter_var($_POST['emailL'],FILTER_VALIDATE_EMAIL)) {
        $errors['emailL'] = "votre email n'est pas valide";
  }else{
      //SELECT * FROM admin WHERE emailL = post
      $query = "SELECT * FROM admin WHERE emailL = ?";
      $req = $pdo->prepare($query);
      $req->execute([$_POST['emailL']]);
      if ($req->fetch()){
          $errors['emailL'] = "cet email est deja pris";
      }
  }
  //mot de passe

  if (!empty($_POST['password']) || $_POST['password'] !== $_POST['password_confirm']){
      $errors['password'] = "vous devez entrer un mot de passe valide et confirmé";
  }
  if(!empty($errors)) {
      $query = "INSERT INTO admin(username,emailL,password,confirmation_token) VALUES(:ali, :abalo, :mot, :mtc)";
      $req->execute([
            'ali' => $_POST['username'],
            'abalo' => $_POST['emailL'],
            'mot' => $password,
            'mtc' => $token
        ]);        
      $req = $pdo->prepare($query);
      $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

      $alphaNum ="0123456789abcdefghijklmnopqrstuvwxzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      str_repeat($alphaNum,100);;

      $token = generateToken(100);
      
      $req->execute([$_POST['username'],$_POST['emailL'],$password,$token]);
      $adminid = $pdo->lastInsertid();
      var_dump($adminid);
      die();
  }
} 
?>

<?php 
     require_once "header.php";
    
   
   
   
?>  
<div class="col-md-8 col-md-offset-2">
<h1 style="color:#fff;">INSCRIPTION</h1>
<form action="" method="post">
    <fieldset>
        <div class="form-group">
             <label for="pseudo">Nom d'utilisateur</label>
             <input type="text" id="pseudo" class="form-control" name="username">
        
            </div>

            <div class="form-group">
             <label for="emailL">Email</label>
             <input type="email" id="email" class="form-control" name="emailL">
        
            </div>

            <div class="form-group">
             <label for="password">mot de passe</label>
             <input type="password" id="password" class="form-control" name="password">
        
            </div>

            <div class="form-group">
            <label for="password">Confirmer le mot de passe</label>
            <input type="password" id="password_confirm" class="form-control" name="password_confirm">
            </div>

            <input type="submit" class="btn btn-primary" value="s'inscrire" name="valider">
            
    </fieldset>
</form>
</div>
<?php 
     require_once "footer.php";
?>
    
