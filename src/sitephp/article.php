<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="Assets/css/ste.css">
    <Title>Le Comptoir des Arts - Qui sommes nous ?</Title>
</head>
<body>
<?php require('includes/header.php'); ?>
<div  id="conteneur">
    <?php require ('Includes/connectToDB.php');
    $article = $dbh->query('SELECT name,description,price,width,height,Artist_name,picturePath FROM product WHERE Product_id = '.$_GET['id']);
    $articlefetch = $article->fetch(PDO::FETCH_NUM);
    echo "<div id='nav'><a href='index.php'>Le comptoir des arts</a>><a href='gallerie.php'>Gallerie</a>>$articlefetch[0]</div>
          <div id='tableauarticle'>
            <img width='100%' height='100%' src='$articlefetch[6]'>
          </div>
          <div id='containerinfos'>
          <div id='titrearticle'>
            $articlefetch[0]
          </div>
          <div id='artistearticle'>
            $articlefetch[5]
          </div>
          <div id='prixarticle'>
            $articlefetch[2] Euros
          </div>
          <div id='taillearticle'>
          Hauteur : $articlefetch[4] cm<br>
          Largeur : $articlefetch[3] cm
          </div>
          <div id='boutonajoutpanier'>
          <button id='button'>Ajouter au panier</button>
          </div>
          </div>
          <div id='description'>
             <br><br><br>
             <p>$articlefetch[1]</p>
          </div><br><br><br><br><br><br><br><br><br>"
    ?>
</div>

<?php require ('includes/footer.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.js"></script>
<script src="angularsite.js"></script>
</body>
</html>
