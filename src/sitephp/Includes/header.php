 <?php session_start(); ?>
 <?php require ('Includes/connectToDB.php') ?>
 <?php require ("Includes/connexionPopup.inc.php") ?>
 <?php require ('scriptConnexionPopup.inc.php') ?>
 <?php require("Includes/connexion.inc.php"); ?>
<header>
    <div class="container">
         <a href="index.php"><img id="logoheader" width="100" height="100" src="Assets/css/icons/logonoir.png" alt="logonoir"></a>
            <div id="titre">
            Le Comptoir des Arts
            </div>
        <?php if(!isset($_SESSION['userName'])){echo '<div id="coinsc" onclick="displayPopup();"> Connexion/Inscription</div>';} else{echo '<div id="deco"><a href="deconnexion.php">Déconnexion</a></div><div id="coinsc"><a href="membre.php">'.$_SESSION['userName'].'  Mon Profil  </a></div>';}?>
            <nav>
                <a class="menu" href="gallerie.php">Gallerie</a>
                <a class="menu" href="qsn.php">Qui Sommes-Nous ?</a>
                <a class="menu" href="contact.php">Contact</a>
            </nav>
    </div>
</header>