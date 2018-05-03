<?php require ("include/connectToDB.inc.php");
require ("include/admin_include/adminAddArticle.inc.php");
require ("include/verifyAdminAccess.inc.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Ajout d'article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>ADMINISTRATION - Ajout d'article</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="name">Nom :</label>
                <input class='form-control' type="text" id="name" name="name" required>
            </div>
            <div class='form-group col-md-6'>
                <label for="qty">Quantité :</label>
                <input class='form-control' type="number" id="qty" name="qty" value="1" required>
            </div>
        </div>

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="description">Description :</label>
                <input class='form-control' type="text" id="description" name="description" required>
            </div>
            <div class='form-group col-md-6'>
                <label for="theme">Thème du tableau :</label>
                <input class='form-control' type="text" id="theme" name="theme" required>
            </div>
        </div>

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="category">Catégorie :</label>
                <input class='form-control' type="text" id="category" name="category" required>
            </div>
            <div class='form-group col-md-6'>
                <label for="color">Couleur du tableau :</label>
                <input class='form-control' type="text" id="color" name="color" required>
            </div>
        </div>

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="price">Prix :</label>
                <input class='form-control' type="number" id="price" name="price" required>
            </div>
            <div class='form-group col-md-6'>
                <label for="width">Largeur :</label>
                <input class='form-control' type="number" id="width" name="width" placeholder="Largeur du tableau" required>
            </div>
        </div>

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="height">Hauteur :</label>
                <input class='form-control' type="number" id="height" name="height" placeholder="Hauteur du tableau" required>
            </div>
            <div class='form-group col-md-6'>
                <label for="Artist_name">Nom de l'artiste :</label>
                <select class='form-control' id="Artist_name" name="Artist_name">
                    <?php
                    $query = $dbh->prepare("SELECT * FROM artist");
                    $query->execute();
                    $res = $query->fetchAll();

                    for ($i = 0; $i < count($res); $i++)
                    {
                        echo "<option>" . $res[$i]['Artist_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="imageArticle">Image de l'article :</label>
                <input  type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <input class='form-control' id="imageArticle" type="file" name="imageArticle" accept='image/*' required>
            </div>
            <div class='form-group col-md-6'>
                <label for="addArticleSubmit">Validation :</label>
                <input id="addArticleSubmit" class='form-control' type="submit" name='addArticleSubmit' value="Valider">
            </div>
        </div>
    </form>
    <br/><a href="adminHome.php"><button class="btn btn-primary">Retour au panneau d'Administration</button></a>
</div>
</body>
</html>