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
    <meta charset="utf-8">
    <title>Projet Web</title>
  </head>
  <body>

  <?php

//    $cart->addArticle("01", "table", 50);
//    $cart->addArticle("02", "plante", 12);
//    $cart->addArticle("01", "table", 50);
//    $cart->addArticle("01", "table", 50);
//    $cart->addArticle("01", "table", 50);
//    $cart->addArticle("06", "chaise", 22);

  $cart->emptyCart();

    var_dump($cart->getArticles());

    echo "Total price : " . $cart->getTotalPrice() . "<br/>";
    echo "Number of Articles : " . $cart->getNbArticles();
  ?>

  <a href="beauTableau.php">Beau tableau</a>
  </body>
</html>
