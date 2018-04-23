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
echo "Total price : " . $cart->getTotalPrice() . "<br/>";
echo "Number of Articles : " . $cart->getNbArticles();
?>

<a href="index.php">Index</a>
</body>
</html>
