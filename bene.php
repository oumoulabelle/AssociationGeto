<?php
       session_start();
       $pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '';
       $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
 
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bene.css">
</head>
<body>
    
<div class="soul"> 
         <ul>
            <li class="maison"><a href="Benevola en afrique.html">Accueil</a></li>
           
            
            <li><a href="type.html">Type de bénévolat</a></li>
        </ul> 
        <hr>
      </div>
            <form action="deconnexion.php" method="POST">
                <input type="submit" name="deconnexion" value="Déconnexion">
            </form>
  <div class="php">
          <p>Bienvenue, <?php echo $pseudo; ?></p>

    <p style="color:green;">Vous etes passionnez par le benevolat ? </p><br>
    <p>Nous vous présentons des domaines qui on fortement besoin d'aide.</p>
    <p style="color:green;">Faite votre choix et postuler</p>







<section class="categorie">
        <div class="categorie_boite">
            <div class="categorie_unique">
                <h1></h1>
                <img src="img/p8.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                        <P>Nom : luttons contre le sida</P>
                        <p style="font: size 14px;">senssibilisation des jeunes contre le SIDA lors d'une campagne.
                        </p>
                        
                        <button class="btn"><a href="postuler.php"> postuler</a></button>
                    </div>
                </div>
            </div>
 

            <div class="categorie_unique">
                <h1></h1>
                <img src="img/p3.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                    <P>Nom : partage de nourriture</P>
                        <p>Une délégation sera mise sur place pour offrire de la nourriture aux personnes demunies.
                        </p>
                        
                        
                        <button class="btn"><a href="postuler.php">postuler</a></button>
                    </div>
                </div>
            </div>


            <div class="categorie_unique">
                <h1></h1>
                <img src="img/im1.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                        <p>Nom : reboisement</p>
                        <p>une délégation va s'occuper de la plantation des arbres.
                        </p>
                      
                        <button class="btn"><a href="postuler.php">postuler</a></button>
                    </div>
                </div>
            </div>
            

        </div>


        <div class="categorie_boite">
            <div class="categorie_unique">
                <h1></h1>
                <img src="img/im5.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                    <P>Nom : ensemble contre la pauvrété</P>
                        <p style="font: size 14px;">Une délégation sera mise sur place pour offrire de la nourriture aux personnes demunies, des habits et biens d'autres.
                        </p>
                        
                        <button class="btn"><a href="postuler.php"> postuler</a></button>
                    </div>
                </div>
            </div>
 

            <div class="categorie_unique">
                <h1></h1>
                <img src="img/p4.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                        <p>Nom : ensembles à l'école</p>
                        <p>une délégation sera mise sur place pour s'occuper de l'éduction des enfants
                        </p>
                       
                        <button class="btn"><a href="postuler.php">postuler</a></button>
                    </div>
                </div>
            </div>


            <div class="categorie_unique">
                <h1></h1>
                <img src="img/p6.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                        <p>Nom : Environement propre</p>
                        <p>une délégation mettra au propre une quartier choisi.
                        </p>
                      
                        <button class="btn"><a href="postuler.php">postuler</a></button>
                    </div>
                </div>
            </div>
            

        </div>


        <div class="categorie_boite">
            <div class="categorie_unique">
                <h1></h1>
                <img src="img/im7.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                    <P>Nom : Environement propre</P>
                        <p style="font: size 14px;">Une association de personnes sera chargé de rendre propre un quartier.
                        </p>
                        
                        <button class="btn"><a href="postuler.php"> postuler</a></button>
                    </div>
                </div>
            </div>
 

            <div class="categorie_unique">
                <h1></h1>
                <img src="img/im11.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                        <p>Nom : Hopital à tous</p>
                        <p>une association sera chargée de soutenir les malades, de les enssibiliser les jeunes pour une meuilleur santé.
                        </p>
                       
                        <button class="btn"><a href="postuler.php">postuler</a></button>
                    </div>
                </div>
            </div>


            <div class="categorie_unique">
                <h1></h1>
                <img src="img/p2.jpg" alt="">
                <div class="onyto">
                    <div class="description">
                        <p>Nom : Génération enfants</p>
                        <p>une délégation partagera les fournitures scolaire au enfants demunies dans les écoles.
                        </p>
                      
                        <button class="btn"><a href="postuler.php">postuler</a></button>
                    </div>
                </div>
            </div>
            

        </div>
  
</body>
</html>

        