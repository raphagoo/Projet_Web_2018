<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter/Supprimer un tableau</title>
</head>
<body>
<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=projet_web_2017', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print "Erreur! " . "<br>" . $e->getMessage();
    die();
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nom du tableau"><br>
    <input type="text" name="nameartist" placeholder="Nom de l'artiste"><br>
    <input type="text" name="width" placeholder="Largeur du tableau"><br>
    <input type="text" name="height" placeholder="Hauteur du tableau"><br>
    <input type="text" name="price" placeholder="Prix du tableau"><br>
    <input type="text" name="theme" placeholder="Thème du tableau"><br>
    <input type="text" name="category" placeholder="Catégorie du tableau"><br>
    <input type="text" name="color" placeholder="Couleur du tableau"><br>
    <input type="text" name="description" placeholder="Description du tableau"><br>
    <!-- On limite le fichier à 10Mo -->
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    Fichier : <input type="file" name="fichiertableau">
    <input type="submit" name='envoi' value="Upload">
</form>
<?php
if(isset($_POST['name'])) {
    $chemin = 'Assets/IMG/';
    $nametableau = $_POST['name'];
    $nameartist = $_POST['nameartist'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $price = $_POST['price'];
    $theme = $_POST['theme'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    $fichiertableau = $_POST['fichiertableau'];
    $insert_file=$dbh->prepare('INSERT INTO product(name, Artist_name, width, height, price, Theme, Category, color, description, picturePath) VALUES("'.$nametableau.'","'.$nameartist.'","'.$width.'","'.$height.'","'.$price.'","'.$theme.'","'.$category.'","'.$color.'","'.$description.'","'.$chemin.($_FILES['fichiertableau']['name']).'")');
    $insert_file->execute();
}
?>
<?php $dbh = null; ?>
</body>
</html>