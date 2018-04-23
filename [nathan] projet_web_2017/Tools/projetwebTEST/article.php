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

<!DOCTYPE html>
<html>
    <head>
        <title>Article</title>
    </head>

    <body>
        <div id="article-container">
            <div>

            </div>

            <div>
                <button onclick="decreaseArtNumber();">-</button>
                <button onclick="increaseArtNumber();">+</button>
                <form action="myCart.php" method="post">

                    <input type="hidden" name="id" value="01"/>
                    <input type="hidden" name="name" value="table"/>
                    <input type="hidden" name="price" value="50"/>

                    <label for="nbArticles"></label>
                    <input type="text" name="nbArticles" id="nbArticles" value="1"/>


                    <input type="submit" name="validate_article" value="Valider" />
                </form>
            </div>
        </div>
    <script type="application/javascript" src="article_cart_script.js"></script>
    </body>
</html>