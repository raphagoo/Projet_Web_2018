<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="Assets/CSS/ste.css">
    <Title>Le Comptoir des Arts - Gallerie</Title>
    <script type="text/javascript"></script>
</head>
<body ng-app="myApp">
<?php require('include/header.php'); ?>
<div ng-controller="ContentCtrl">
    <div id="formulairerecherche">
        <form>
            <h3><label for="type">Type</label></h3>
            <input type="checkbox" ng-model="query.dessin" name="type" ng-true-value="'Dessin'" ng-false-value="''" >Dessin<br>
            <input type="checkbox" ng-model="query.photo" name="type" ng-true-value="'Photographie'" ng-false-value="''"  >Photographie<br>
            <input type="checkbox" ng-model="query.peinture" name="type" ng-true-value="'Peinture'" ng-false-value="''" >Peinture<br>
            <input type="checkbox" ng-model="query.edition" name="type" ng-true-value="'Edition'" ng-false-value="''" >Edition<br>
            <h3><label for="prix">Prix</label></h3>
            <div id="demo"></div>
            <input ng-model="query.prix" type="range" min="50" max="1000" id="myRange">
            <h3><label for="theme">Thème</label></h3>
            <input type="checkbox" ng-model="query.abstrait" ng-true-value="'Abstrait'" ng-false-value="''"  name="theme">Abstrait
            <input type="checkbox" ng-model="query.architecture" ng-true-value="'Architecture'" ng-false-value="''"  name="theme" >Architecture<br>
            <input type="checkbox" ng-model="query.animaux" ng-true-value="'Animaux'" ng-false-value="''"  name="theme">Animaux
            <input type="checkbox" ng-model="query.artbrut" ng-true-value="'Artbrut'" ng-false-value="''"  name="theme">Art Brut<br>
            <input type="checkbox" ng-model="query.portrait" ng-true-value="'Portrait'" ng-false-value="''"  name="theme">Portrait
            <input type="checkbox" ng-model="query.paysage" ng-true-value="'Paysage'" ng-false-value="''"  name="theme">Paysage<br>
            <input type="checkbox" ng-model="query.urbain" ng-true-value="'Urbain'" ng-false-value="''"  name="theme">Urbain
            <input type="checkbox" ng-model="query.streetart" ng-true-value="'Streetart'" ng-false-value="''"  name="theme">Street Art<br>
            <input type="checkbox" ng-model="query.minimalisme" ng-true-value="'Minimalisme'" ng-false-value="''"  name="theme">Minimalisme<br>
            <h3><label for="orientation">Orientation</label></h3>
            <input type="checkbox" ng-model="query.oportrait" name="orientation" value="portrait">Portrait<br>
            <input type="checkbox" ng-model="query.opaysage" name="orientation" value="paysageo">Paysage<br>
            <input type="checkbox" ng-model="query.ocarre" name="orientation" value="carre">Carré<br>
            <h3><label for="format">Format</label></h3>
            <input type="checkbox" ng-model="query.petit" ng-true-value="'2500'" ng-false-value="''" name="format">Petit (<50x50cm)<br>
            <input type="checkbox" id="acocher" ng-model="moyen" ng-true-value="'13225'" ng-false-value="''" name="format" ng-checked="true">Moyen (<115x115cm)<br>
            <input type="checkbox" ng-model="query.grand" ng-true-value="'13225'" ng-false-value="''" name="format">Grand (>115x115cm)<br>
            <h3><label for="couleur">Couleur</label></h3>
            <input type="checkbox" ng-model="query.noir" name="couleur" ng-true-value="'noir'" ng-false-value="''">Noir
            <input type="checkbox" ng-model="query.blanc" name="couleur"  ng-true-value="'blanc'" ng-false-value="''">Blanc<br>
            <input type="checkbox" ng-model="query.rouge" name="couleur"  ng-true-value="'rouge'" ng-false-value="''">Rouge
            <input type="checkbox" ng-model="query.bleuciel" name="couleur"   ng-true-value="'bleuciel'" ng-false-value="''">Bleu ciel<br>
            <input type="checkbox" ng-model="query.vert" name="couleur"  ng-true-value="'vert'" ng-false-value="''">Vert
            <input type="checkbox" ng-model="query.gris" name="couleur"  ng-true-value="'gris'" ng-false-value="''">Gris<br>
            <input type="checkbox" ng-model="query.violet" name="couleur" ng-true-value="'violet'" ng-false-value="''">Violet
            <input type="checkbox" ng-model="query.dore" name="couleur" ng-true-value="'dore'" ng-false-value="''">Doré<br>
            <input type="checkbox" ng-model="query.argente" name="couleur" ng-true-value="'argente'" ng-false-value="''">Argenté
            <input type="checkbox" ng-model="query.orange" name="couleur" ng-true-value="'orange'" ng-false-value="''">Orange<br>
            <input type="checkbox" ng-model="query.marron" name="couleur" ng-true-value="'marron'" ng-false-value="''">Marron
            <input type="checkbox" ng-model="query.bordeaux" name="couleur" ng-true-value="'bordeaux'" ng-false-value="''">Bordeaux<br>
            <input type="checkbox" ng-model="query.beige" name="couleur" ng-true-value="'beige'" ng-false-value="''">Beige
            <input type="checkbox" ng-model="query.rose" name="couleur" ng-true-value="'rose'" ng-false-value="''">Rose<br>
            <input type="checkbox" ng-model="query.bleumarine" name="couleur" ng-true-value="'bleumarine'" ng-false-value="''">Bleu marine<br><br>
        </form>
    </div>
    <div id="tableaux">
        <div class="containertableau" ng-repeat="content in contents.data | filter:{Theme:query.urbain} | filter:{Theme:query.portrait} | filter:{Category:query.dessin} | filter:{Category:query.peinture} | filter:{color:query.noir} | filter:{color:query.blanc} | filter:{color:query.bleuciel}
        | filter:{Theme:query.abstrait} | filter:{Theme:query.architecture} | filter:{Theme:query.animaux} | filter:{Theme:query.artbrut} | filter:{Theme:query.portrait} | filter:{Theme:query.paysage} | filter:{Theme:query.streetart} | filter:{Theme:query.minimalisme}
        | filter:{Category:query.dessin} | filter:{Category:query.photo} | filter:{category:query.edition} | filter:{color:query.rouge} | filter:{color:query.vert} | filter:{color:query.gris} | filter:{color:query.violet} | filter:{color:query.dore}
        | filter:{color:query.argente} | filter:{color:query.orange} | filter:{color:query.marron} | filter:{color:query.bordeaux} | filter:{color:query.beige} | filter:{color:query.rose} | filter:{color:query.bleumarine}">
            <div ng-if="content.price < query.prix">
                <div ng-if="content.width*content.height < moyen">
                    <a href="article.php?id={{content.Product_id}}"><div ng-click="infosarticle()" class="imgtableaudiv"><img height="100%" width="100%" class="tableauimg" src="{{content.picturePath}}"></div>
                        <div class="infosimg">
                            {{content.Artist_name}}<br>{{content.name}}<br>{{content.width}}x{{content.height}}
                            <div class="prix">
                                {{content.price}} euros
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php require('include/footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.js"></script>
    <script src="Assets/Scripts/angularsi.js" type="text/javascript"></script>
</body>
</html>
