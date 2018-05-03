<?php
require ("include/connectToDB.inc.php");
require ("include/admin_include/adminAddArtist.inc.php");
require ("include/verifyAdminAccess.inc.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Panneau d'administration - Ajout d'artiste</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>ADMINISTRATION - Ajout d'artiste</h1>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                <div class='form-row'>
                    <div class='form-group col-md-6'>
                        <label for="artistname">Nom :</label>
                        <input class='form-control' type="text" id="artistname" name="Artist_name" required />
                    </div>
                    <div class='form-group col-md-6'>
                        <label for="addArtistSubmit">Validation :</label>
                        <input class='form-control' id="addArtistSubmit" type="submit" name="addArtistSubmit" value="Valider" />
                    </div>
                </div>
            </form>
            <br/><a href="adminHome.php"><button class="btn btn-primary">Retour au panneau d'Administration</button></a>
        </div>
    </body>
</html>
