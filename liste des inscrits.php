<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des inscrit</title>
    <link rel="stylesheet" href="liste.css">
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
  }
  
  table {
    border-collapse: collapse;
    width: 100%;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  table th,
  table td {
    padding: 10px;
    text-align: left;
  }
  
  table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333;
  }
  
  tr.res:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  tr.res:hover {
    background-color: #e1e1e1;
  }
  
  h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
  } 
  
  


    </style>
</head>
<body>

    <p class="res">liste de nos benevoles</p>
<?php
$servername = "localhost";
$username = "root";
$password= "";
$dbname ="benevolat";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("connection failed :" .mysqli_connect_error());
}
$sql = "SELECT * FROM form1_benevole";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) >0 ) {
    ?>
    <table class="table" style="font_size: 19px">
    <thead>
        <tr>
           <th>id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>age</th>
            <th>tel</th>
            <th>email</th>
            <th>date de naissance</th>
            <th>langue</th>
            <th>statut</th>
            <th>nationalité</th>
            <th>ville</th>
        </tr>
    </thead>
    <tbody>
        <hr>
    <?php
       while($row = mysqli_fetch_assoc($result)):
        ?>
           <tr class="res">
           <td><?php echo $row["id"]; ?> </td>
              <td><?php echo $row["nom"]; ?> </td>
              <td><?php echo $row["prenom"]; ?> </td>
              <td><?php echo $row["age"]; ?> </td>
              <td><?php echo $row["tel"]; ?> </td>
              <td><?php echo $row["email"]; ?> </td>
              <td><?php echo $row["date_naiss"]; ?> </td>
              <td><?php echo $row["lange"]; ?> </td>
              <td><?php echo $row["statut"]; ?> </td>
              <td><?php echo $row["nationalite"]; ?> </td>
              <td><?php echo $row["ville"]; ?> </td>
           </tr>

          <style>
               



          </style>


           <?php
          endwhile;
         ?>

     </table>
     <?php
    }
    else{
        echo "aucun inscrit";
    }
   mysqli_close($conn);
      
      
      
      ?>

</body>
</html>