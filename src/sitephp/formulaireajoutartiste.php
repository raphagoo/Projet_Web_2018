<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter/Supprimer un artiste</title>
</head>
<body>
<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=projet_web_2017', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $dbh->prepare('SELECT * FROM artist');
    $sth->execute();
    $data = $sth->fetchAll();
}
catch (PDOException $e) {
    print "Erreur! " . "<br>" . $e->getMessage();
    die();
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="nom" placeholder="Nom de l'artiste">
    <input type="submit" name='envoi' value="upload">
</form>
<?php
if (isset($_POST['envoi'])){
    $nom = $_POST['nom'];
    $insert_file=$dbh->prepare('INSERT INTO artist(Artist_name) VALUES("'.$nom.'")');
    $insert_file->bindParam(':nom', $nom);
    $insert_file->execute();
}
?>
<?php $dbh = null; ?>
</body>
</html>