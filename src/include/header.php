 <?php session_start(); ?>
 <?php require ('connectToDB.inc.php') ?>
 <?php require ("connexionPopup.inc.php") ?>
 <?php require ('scriptConnexionPopup.inc.php') ?>
 <?php require("connexion.inc.php"); ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf8">
     <link rel="stylesheet" href="Assets/CSS/ste.css">
     <Title><?php echo $articlefetch[0]['name'] ." by " . $articlefetch[0]['Artist_name']?> </Title>
 </head>
 <body ng-app="myApp">
    <div class="container">
         <a href="index.php"><img id="logoheader" width="100" height="100" src="Assets/CSS/icons/logonoir.png" alt="logonoir"></a>
            <div id="titre">
            Le Comptoir des Arts
            </div>
        <?php
            if(!isset($_SESSION['userName']))
            {
                echo '<div id="coinsc" onclick="displayPopup();"> Connexion/Inscription</div>';
            }
            else{
                echo '<div id="deco"><a href="deconnexion.php">Déconnexion</a></div><div id="coinsc"><a href="membre.php">'.$_SESSION['userName'].'</a></div>
                <div id="panier"><a href="myCart.php">Panier</a></div>';
            }
            ?>
            <nav>
                <a class="menu" href="galerie.php">Galerie</a>
                <a class="menu" href="qsn.php">Qui Sommes-Nous ?</a>
                <a class="menu" href="contact.php">Contact</a>
                <?php
                    if (!empty($_SESSION['rank']))
                    {
                        if ($_SESSION['rank'] == 1)
                        {
                            echo "<a class='menu' href='adminHome.php'>Administration</a>";
                        }
                    }
                ?>
            </nav>
    </div>
