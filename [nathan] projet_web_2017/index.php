<?php session_start(); require ("include/connectToDB.inc.php");?>
<!Doctype html>
<html>
    <head>
        <title>Page principale</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="Assets/CSS/connexionPopup_style.css"/>

    </head>

    <body>
        <header>
            <h1>PAGE D'ACCUEIL</h1>
        </header>
        <?php require ("include/connexionPopup.inc.php"); if(!empty($_SESSION['userName'])){echo $_SESSION['userName'];} ?>

        <button onclick="displayPopup();">Popup</button>
        <?php require ("include/scriptConnexionPopup.inc.php"); ?>
        <?php require("include/connexion.inc.php"); ?>
    </body>

</html>