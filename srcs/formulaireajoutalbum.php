
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter/Supprimer une musique</title>
</head>
<body>
    <?php
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=projet_dev_2017', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print "Erreur! " . "<br>" . $e->getMessage();
        die();
    }
    ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nom de l'album">
    <input type="text" name="nameartist" placeholder="Nom de l'artiste">
   <input type="date" name="releasedate" placeholder="Date de sortie">
    <!-- On limite le fichier à 100Ko -->
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    Fichier : <input type="file" name="avatar">
    <input type="submit" name='envoi' value="upload">
</form>
<?php

    if (isset($_POST['envoi'])){
    $name = $_POST['name'];
    $nameartist = $_POST['nameartist'];
    $chemin = 'img/';
    $releasedate = $_POST['releasedate'];
        $idartist = $dbh->query('SELECT artist_id FROM artist WHERE name= "'.$nameartist.'"');
        $idartistfetch = $idartist->fetch(PDO::FETCH_NUM);
        $idartistfinal = implode('',$idartistfetch);
    $insert_file=$dbh->prepare('INSERT INTO album(name, releasedate, artist_id, image) VALUES("'.$name.'","'.$releasedate.'","'.$idartistfinal.'","'.$chemin.($_FILES['avatar']['name']).'")');
    $insert_file->execute();
    }

?>
    <?php $dbh = null; ?>
</body>
</html>