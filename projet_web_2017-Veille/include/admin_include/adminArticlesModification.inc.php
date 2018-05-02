<?php

function displayModificationForm(&$dbh)
{
    if (!empty($_GET['productid']))
    {
        $productid = $_GET['productid'];
        $name = $_GET['name'];
        $qty = $_GET['qty'];
        $desc = $_GET['desc'];
        $theme = $_GET['theme'];
        $category = $_GET['category'];
        $color = $_GET['color'];
        $price = $_GET['price'];
        $width = $_GET['width'];
        $height = $_GET['height'];

        echo "<div id='form'><form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
               
        <div class='form-row'>
                <label for='productid'>Identifiant :</label>
                <input class='form-control' id='productid' type='text' name='productid' value='$productid' disabled>
                <input type='hidden' name='productid' value='$productid'>             
        </div>
        
        <br/>
        
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='name'>Nom de l'article :</label>   
                <input class='form-control' type='text' id='name' name='name' value='$name'>
            </div>
            <div class='form-group col-md-6'>
                <label for='qty'>Quantité :</label>
                <input class='form-control' id='qty' type='number' name='qty' value='$qty'>
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='desc'>Description :</label>
                <input class='form-control' type='text' id='desc' name='desc' value='$desc'>
            </div>
            <div class='form-group col-md-6'>
                <label for='theme'>Thème :</label>
                <input class='form-control' type='text' id='theme' name='theme' value='$theme'>
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='category'>Catégorie :</label>
                <input class='form-control' type='text' id='category' name='category' value='$category'>
            </div>
            <div class='form-group col-md-6'>
                <label for='color'>Couleur :</label>
                <input class='form-control' type='text' id='color' name='color' value='$color'>
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='width'>Largeur :</label>
                <input class='form-control' type='number' id='width' name='width' value='$width'>
            </div>
            <div class='form-group col-md-6'>
                <label for='height'>Hauteur :</label>
                <input class='form-control' type='number' id='height' name='height' value='$height'>
            </div>
        </div>
        
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='price'>Prix :</label>
                <input class='form-control' type='number' id='price' name='price' value='$price'>
            </div>
            <div class='form-group col-md-6'>
                <label for='artist'>Artiste :</label>
                <select class='custom-select' id='artist' name='artist'>";

                $query = $dbh->prepare("SELECT * FROM artist");
                $query->execute();
                $res = $query->fetchAll();

                for ($i = 0; $i < count($res); $i++)
                {
                    echo "<option>" . $res[$i]['Artist_name'] . "</option>";
                }


                echo "</select>
            </div>
        </div>
        <div class='form-row'>   
            <input class='form-control' type='submit' name='subValidate' value='Valider'>      
        </div>
        </form>
        </div>";
    }
}

function modifyUser(&$dbh)
{
    if(!empty($_POST['subValidate']))
    {
        if(!empty($_POST['productid']) && !empty($_POST['name']) && !empty($_POST['qty'])
            && !empty($_POST['desc']) && !empty($_POST['theme']) && !empty($_POST['category'])
            && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['width'])
            && !empty($_POST['height']) && !empty($_POST['artist']))
        {
            $productid = $_POST['productid'];
            $name = $_POST['name'];
            $qty = $_POST['qty'];
            $desc = $_POST['desc'];
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $width = $_POST['width'];
            $height = $_POST['height'];
            $artist = $_POST['artist'];

            $query = $dbh->prepare("UPDATE product SET name = '$name',
              description = '$desc',
              price = '$price',
              Theme = '$theme',
              Category = '$category',
              color = '$color',
              width = '$width',
              height = '$height',
              Artist_name = '$artist',
              qty = '$qty' WHERE Product_id = $productid");
            $query->execute();


            header("Refresh: 0");
        }
    }
}

function delete(&$dbh)
{
    if(!empty($_GET['deleteid']))
    {
        $idToDelete = $_GET['deleteid'];
        $query = $dbh->prepare("DELETE FROM product WHERE product_id = $idToDelete");
        $query->execute();

        header("Refresh: 0, url=adminArticles.php");
    }
}

displayModificationForm($dbh);
modifyUser($dbh);
delete($dbh);
?>