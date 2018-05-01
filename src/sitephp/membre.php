<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="Assets/css/ste.css">
    <Title>Le Comptoir des Arts - Membre</Title>
</head>
<body>
<?php require ('Includes/header.php') ?>
<div id="membreinfo">
<h2>Mes Informations</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Nom d'utilisateur : <?php echo $_SESSION['userName'] ?><br>
Mot de passe actuel : <input type="password" name="mdp"><br>
Nouveau mot de passe : <input type="password" name="newmdp"><br>
<input type="submit" value="Confirmation">
</form>
</div>
<hr class="vrmembre">
<div id="membrecommande">
<h2>Mes Commandes</h2>
</div>
<?php require ('Includes/footer.php') ?>

<?php
require ('Includes/connectToDB.php');
require ('Includes/scriptConnexionPopup.inc.php');
if (isset($_POST['newmdp'])) {
    $mdp = $_POST['mdp'];
    $newmdp = $_POST['newmdp'];
    $requetemdp = $dbh->query('SELECT password FROM customer WHERE userName ="' . $_SESSION['userName'] . '"');
    $tab = $requetemdp->fetchAll();
    if (!empty($tab[0][0])) {
        $hash = $tab[0][0];

        if (password_verify($mdp, $hash)) {
            $newmdp = password_hash($newmdp, PASSWORD_ARGON2I);
            $ajoutnvxmdp = $dbh->query('UPDATE customer SET password ="' . $newmdp . '"');
            echo "Le mot de passe a été changé";
        } else {
            echo "<script type='application/javascript'>displayPopup(); swapToLoginForm(); wrongAuth();</script>";
        }
    } else {
        echo "<script type='application/javascript'>displayPopup(); swapToLoginForm(); wrongAuth();</script>";
    }
}
?>
</body>
</html>
