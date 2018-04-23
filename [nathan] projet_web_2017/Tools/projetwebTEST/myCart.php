<?php
require_once ("Cart.php");
session_start();
if(empty($_SESSION['cart']))
{
    $_SESSION['cart'] = new Cart();
    $cart = $_SESSION['cart'];
} else {
    $cart = $_SESSION['cart'];
}
?>

<?php
if (!empty($_POST['validate_article']))
{
    if(!empty($_POST['nbArticles']) && !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['price']))
    {
        $cart->addArticle($_POST['id'], $_POST['name'], $_POST['price'], $_POST['nbArticles']);
    }
}

if(!empty($_POST['delete']))
{
    echo $_POST['id'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Panier</title>
        <meta charset="utf-8">
    </head>

    <body>
        <div id="container">
            <form action="billing.php" method="post">

                <?php
                    echo "Total price : " . $cart->getTotalPrice() . "<br/>";
                    echo "Number of Articles : " . $cart->getNbArticles();

                    for ($i = 0; $i < count($cart->getArticles()); $i++)
                    {
                        echo "<br/><br/>";
                        echo $cart->getArticles()[$i]['name']
                            . "<br/>Quantite : <input name='" . $i . "' type='text' value='" . $cart->getArticles()[$i]['qty'] . "' />";
                        echo "<input type='hidden' name='id' value='" . $cart->getArticles()[$i]['id'] . "' />"
                            ."<br/><input name='delete' type='submit' value='Supprimer' />";
                    }
                ?>
                <br/>
                <br/>
                <input type="submit" value="Valider le panier" />
            </form>
            <a href="article.php">article</a>
        </div>
    </body>
</html>