 <?php session_start(); ?>
 <?php require ('connectToDB.inc.php') ?>
 <?php require ("connexionPopup.inc.php") ?>
 <?php require ('scriptConnexionPopup.inc.php') ?>
 <?php require("connexion.inc.php"); ?>
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
