<?php
require_once ("Cart.php");
session_start();
require ("include/connectToDB.inc.php");
if(empty($_SESSION['cart']))
{
    $_SESSION['cart'] = new Cart();
    $cart = $_SESSION['cart'];
} else {
    $cart = $_SESSION['cart'];
}
?>

<?php
if(!empty($_POST['delete']))
{
    $id = $_POST['id'];
    $cart->removeArticle($id);
} elseif (!empty($_POST['validateQty']))
{
    $cart->setArticleQty($_POST['id'], $_POST['qty']);
}

if (!empty($_POST['validate_article']))
{
    if(!empty($_POST['nbArticles']) && !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['price']))
    {
        $cart->addArticle($_POST['id'], $_POST['name'], $_POST['price'], $_POST['nbArticles']);
    }
}

if (!empty($_POST['cartSubmit']))
{
    if (!empty($_SESSION['rank']))
    {
        if ($_SESSION['rank'] == 1)
        {
            die("Les administrateurs ne peuvent pas valider leur panier. Vous devez vous connecter en tant que membre. <a href='index.php'>Retour à l'index</a>");
        }
    }

    if (!empty($_POST['id']))
    {
        $arrayCart = $_POST;
        if (isset($arrayCart['id']) && isset($arrayCart['price']) && isset($arrayCart['qty']) && isset($arrayCart['cartSubmit']))
        {
            unset($arrayCart['id']);
            unset($arrayCart['price']);
            unset($arrayCart['qty']);
            unset($arrayCart['cartSubmit']);
        }

        for ($i = 0; $i < count($arrayCart)/2; $i++)
        {
            $cart->setArticleQty($arrayCart['id'.$i], $arrayCart['qty'.$i]);
        }

        $date = date("Y-m-d");

        $query = $dbh->prepare("INSERT INTO orders (date, totalPrice, amount, customer_id) VALUES ('$date', " . $cart->getTotalPrice() . " , " . $cart->getNbArticles() . ", " . $_SESSION['userID'] .")");
        $query->execute();

        $query = $dbh->prepare("SELECT Order_id FROM orders ORDER BY Order_id DESC LIMIT 1");
        $query->execute();
        $lastOrder_id = intval($query->fetchAll()[0][0]);

        for ($i = 0; $i < count($arrayCart)/2; $i++)
        {
            $query = $dbh->prepare("INSERT INTO orderdetails VALUES (" . $arrayCart['qty'.$i] . ", " . $lastOrder_id . ", " . $arrayCart['id'.$i] . ")");
            $query->execute();
        }

        $cart->emptyCart();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Panier</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="Assets/CSS/ste.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <a href="gallerie.php"><img id="logoheader" width="100" height="100" src="Assets/CSS/icons/logonoir.png" alt="logonoir"></a></li>
                <?php
                if(!isset($_SESSION['userName']))
                {
                    echo '<div id="coinsc" onclick="displayPopup();"> Connexion/Inscription</div>';
                }
                else{
                    echo '<div id="deco"><a href="deconnexion.php">Déconnexion</a></div><div id="coinsc"><a href="membre.php">'.$_SESSION['userName'].'</a></div>
                <div id="panier"><a href="myCart.php">Panier</a></div>';
                }
                ?>
            </div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="row">
                    <div class='col-md-8'>
                        <h2>PANIER</h2>
                    <?php

                    for ($i = 0; $i < count($cart->getArticles()); $i++)
                    {
                        echo("
                        <div class='row'>
                            <form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
                            <input type='hidden' name='id' value='" . $cart->getArticles()[$i]['id'] . "' />
                            <input id='artPrice" . $i . "' type='hidden' name='price' value='" . $cart->getArticles()[$i]['price'] . "' />
                                <div class='col-md-8'>
                                    <h3>" . $cart->getArticles()[$i]['name'] . "</h3>
                                    <p><span class='spanArticleDescrition'>IMAGE :  </span></p>
                                    <input name='delete' type='submit' value='Supprimer' />
                                </div>
                                <div class='col-md-4'>
                                    <label for='qty" . $i . "'>Quantite :</label>
                                    <input class='form-control' id='qty" . $i . "' name='qty' type='text' value='" . $cart->getArticles()[$i]['qty'] . "' onkeyup='updatePrice($i);'/>
                                    <p>Prix total : <span class='dispPrice' id='dispPrice" . $i . "'></span></p>
                                </div>
                            </form>
                            <input type='hidden' id='hiddenQTY" . $i . "' value='" . $cart->getArticles()[$i]['qty'] . "' name='qty" . $i . "' />
                            <input type='hidden' name='id" . $i . "' value='" . $cart->getArticles()[$i]['id'] . "' />
                        </div>");
                    }

                    ?>
                    </div>
                    <div class="col-md-4">
                        <h2>INFOS PANIER</h2>
                        <div>
                            <p>prix total : <span id='spanTotalPrice'></span></p>
                            <p>Number of Articles : <span id='spanTotalQty'></span></p>
                        </div>
                        <input type="submit" name="cartSubmit" value="Valider le panier" />
                    </div>
                </div>
            </form>
        </div>
    <script type="application/javascript" src="Assets/Scripts/live_article_price_script.js"></script>
    </body>
</html>