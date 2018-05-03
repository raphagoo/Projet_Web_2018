 <?php require('include/connectToDB.inc.php');
    $article = $dbh->prepare('SELECT * FROM product WHERE Product_id = ' . $_GET['id']);
    $article->execute();
    $articlefetch = $article->fetchAll(); ?>
<?php require('include/header.php'); ?>
<div id="conteneur">
    <?php
    echo "<div id='nav'><a href='index.php'>Le comptoir des arts</a> > <a href='galerie.php'>Galerie</a> > " . $articlefetch[0]['name'] . "</div>
          <div id='tableauarticle'>
            <img width='100%' height='100%' src='" . $articlefetch[0]['picturePath'] . "'>
          </div>
          <div id='containerinfos'>
          <div id='titrearticle'>
            <p>Titre : " . $articlefetch[0]['name'] . "</p>
          </div>
          <div id='artistearticle'>
            <p>Artiste : " . $articlefetch[0]['Artist_name'] . "</p>
          </div>
          <div id='prixarticle'>
            <p>Prix : " . $articlefetch[0]['price'] . " Euros</p>
          </div>
          <div id='taillearticle'>
              <p>Hauteur : " . $articlefetch[0]['height'] . " cm</p>
              <p>Largeur : " . $articlefetch[0]['width'] . " cm</p>
          </div>
          <div id='boutonajoutpanier'>
          <div id=\"article-container\">
    <div>
        <button onclick=\"decreaseArtNumber();\">-</button>
        <button onclick=\"increaseArtNumber();\">+</button>
        <form action=\"myCart.php\" method=\"post\">

            <input type=\"hidden\" name=\"id\" value=\"".$articlefetch[0]['Product_id']."\"/>
            <input type=\"hidden\" name=\"name\" value=\"".$articlefetch[0]['name']."\"/>
            <input type=\"hidden\" name=\"price\" value=\"".$articlefetch[0]['price']."\"/>
            <input type=\"hidden\" name=\"path\" value=\"".$articlefetch[0]['picturePath']."\"/>

            <label for=\"nbArticles\"></label>
            <input type=\"text\" name=\"nbArticles\" id=\"nbArticles\" value=\"1\"/>


            <input id='button' type=\"submit\" name=\"validate_article\" value=\"Ajouter au panier\"/>
        </form>
    </div>
</div>
          
          </div>
          </div>
          <div id='description'>
             <br><br><br>
             <p>Description : <br>" . $articlefetch[0]['description'] . "</p>
          </div><br><br><br><br><br><br><br><br>"
    ?>
</div>
<script type="application/javascript" src="Assets/Scripts/article_cart_script.js"></script>

<?php require('include/footer.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.js"></script>
<script src="angularsite.js"></script>
</body>
</html>
