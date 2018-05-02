<?php
function selectAllProducts(&$dbh)
{
    $query = $dbh->prepare("SELECT p.Product_id, p.name, p.description, p.price, p.theme, p.category, p.color, p.width, p.height, p.qty, p.Artist_name FROM product p");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function displayTable(&$dbh)
{
    $allProducts = selectAllProducts($dbh);

    for ($i = 0; $i < count($allProducts); $i++)
    {
        $urlModif = "adminArticles.php?productid=". $allProducts[$i]['Product_id'] . "&name=" . $allProducts[$i]['name'] . "&qty=" . $allProducts[$i]['qty']
            . "&desc=" . $allProducts[$i]['description'] . "&theme=" . $allProducts[$i]['theme'] . "&category=" . $allProducts[$i]['category']
            . "&color=" . $allProducts[$i]['color'] . "&price=" . $allProducts[$i]['price'] . "&width=" . $allProducts[$i]['width'] . "&height=" . $allProducts[$i]['height']
            . "&artist=" . $allProducts[$i]['Artist_name'];
        $links = "<td><a href='$urlModif'>Modifier</a></td><td><a href='adminArticles.php?deleteid=" . $allProducts[$i]['Product_id'] . "'>Supprimer</a></td>";
        echo "<tr><td>" . $allProducts[$i]['Product_id'] . "</td><td>" . $allProducts[$i]['name'] . "</td><td>" . $allProducts[$i]['qty'] . "</td>
        <td>" . $allProducts[$i]['description'] . "</td><td>" . $allProducts[$i]['theme'] . "</td><td>" . $allProducts[$i]['category'] . "</td>
        <td>" . $allProducts[$i]['color'] . "</td><td>" . $allProducts[$i]['price'] . "</td><td>" . $allProducts[$i]['width'] . "</td>
        <td>" . $allProducts[$i]['height'] . "</td><td>" . $allProducts[$i]['Artist_name'] . "</td>$links</tr>";
    }
}

displayTable($dbh);

?>