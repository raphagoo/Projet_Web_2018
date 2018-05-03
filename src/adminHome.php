<?php
require ("include/verifyAdminAccess.inc.php");
require ("include/connectToDB.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panneau d'administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>ADMINISTRATION DU SITE</h1>
        <a href="index.php"><img id="logoheader" width="100" height="100" src="Assets/CSS/icons/logonoir.png" alt="logonoir"></a>

        <div class="list-group">
            <h2>GESTION</h2>
            <a href="adminArticles.php" class="list-group-item">Gestion des articles</a>
            <a href="adminArtists.php" class="list-group-item">Gestion des Artistes</a>
            <a href="adminOrders.php" class="list-group-item">Gestion des commmandes</a>
            <a href="adminUsers.php" class="list-group-item">Gestion des Utilisateurs</a>
        </div>

        <div class="list-group">
            <h2>AJOUTS</h2>
            <a href="adminAddAdmin.php" class="list-group-item">Ajout d'administrateurs</a>
            <a href="adminAddArtist.php" class="list-group-item">Ajout d'Artistes</a>
            <a href="adminAddArticle.php" class="list-group-item">Ajout d'Articles</a>
        </div>

        <?php
        function nbProducts(&$dbh)
        {
            $query = $dbh->prepare("SELECT SUM(qty) FROM product");
            $query->execute();
            $res = $query->fetchAll();

            echo $res[0][0];
        }
        ?>

        <p><span class="label label-info">Nombre d'articles : <?php nbProducts($dbh)?></span></p>
    </div>
</body>
</html>
