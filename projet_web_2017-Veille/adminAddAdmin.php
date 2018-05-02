<?php
require ("include/connectToDB.inc.php");
require ("include/admin_include/adminAddAdmin.inc.php");
require ("include/verifyAdminAccess.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panneau d'administration - Ajout d'admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>ADMINISTRATION - Ajout d'admin</h1>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="username">Nom d'utilisateur :</label>
                <input class='form-control' type="text" id="username" name="username" required />
            </div>
            <div class='form-group col-md-6'>
                <label for="adminPassword">Mot de passe :</label>
                <input class='form-control' type="password" id="adminPassword" name="adminPassword" required />
            </div>
        </div>
        <input class='form-control' id="addAdminSubmit" type="submit" name="addAdminSubmit" value="Valider" />
    </form>
    <br/><a href="adminHome.php"><button class="btn btn-primary">Retour au panneau d'Administration</button></a>
</div>
</body>
</html>
