<?php
function uploadPicture($uploadPath){
    if (isset($_FILES['imageArticle'])){
        //$uploadPath = "Assets/IMG/";
        $upload = $uploadPath . basename($_FILES['imageArticle']['name']);

        if (move_uploaded_file($_FILES['imageArticle']['tmp_name'], $upload)) {

            return "La photo a été ajouté à la galerie.";
        } else {
            return "Fichier non valide! Code d'erreur : " . $_FILES['imageArticle']['error'];
        }
    }
}

function addArticle(&$dbh)
{
    if (!empty($_POST['addArticleSubmit']))
    {
        if(!empty($_POST['name'])
            && !empty($_POST['qty'])
            && !empty($_POST['description'])
            && !empty($_POST['theme'])
            && !empty($_POST['category'])
            && !empty($_POST['color'])
            && !empty($_POST['price'])
            && !empty($_POST['width'])
            && !empty($_POST['height'])
            && !empty($_POST['Artist_name'])) {

            $path = 'Assets/IMG/';

            $name = $_POST['name'];
            $description = $_POST['description'];
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $imageArticle = $_FILES['imageArticle']['name'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $width = $_POST['width'];
            $height = $_POST['height'];
            $qty = $_POST['qty'];
            $Artist_name = $_POST['Artist_name'];

            uploadPicture($path);

            $query = $dbh->prepare("INSERT INTO product(name, description, price, Theme, Category, picturePath, color, width, height, qty, Artist_name) 
          VALUES('$name', '$description', $price, '$theme', '$category', '" . $path . $imageArticle . "', '$color', $width, $height, $qty,'$Artist_name')");
            $query->execute();
        }
    }
}

addArticle($dbh);
?>