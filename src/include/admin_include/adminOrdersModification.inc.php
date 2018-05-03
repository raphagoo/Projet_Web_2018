<?php

function displayModificationForm()
{
    if (!empty($_GET['orderid']))
    {
        $orderid = $_GET['orderid'];
        $date = $_GET['date'];
        $amount = $_GET['amount'];
        $totalprice = $_GET['totalprice'];
        $customerid = $_GET['customerid'];

        echo "<div id='formOrders'><form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
        <div class='form-row'>
            <label for='disableCustid'>Identifiant :</label>
            <input class='form-control' type='text' id='disabledCustid' name='disabledCustid' value='$orderid' disabled>
            <input type='hidden' name='orderid' value='$orderid'>
        </div>
        <br/>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='date'>Date :</label>
                <input class='form-control' type='text' id='date' name='date' value='$date'>
            </div>
            <div class='form-group col-md-6'>
                <label for='amount'>Quantite :</label>
                <input class='form-control' type='text' id='amount' name='amount' value='$amount'>
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='totalprice'>Prix total :</label>
                <input class='form-control' type='text' id='totalprice' name='totalprice' value='$totalprice'>
            </div>
            <div class='form-group col-md-6'>
                <label for='customerid'>Identifiant client :</label>
                <input class='form-control' type='text' id='customerid' name='customerid' value='$customerid'>
            </div>
        </div>
        <div class='form-row'>   
            <input class='form-control' type='submit' name='subValidate' value='Valider'>     
        </div>
        </form></div>";
    }
}

function modifyOrder(&$dbh)
{
    if(!empty($_POST['subValidate']))
    {
        var_dump('bbb');
        if(!empty($_POST['orderid']) && !empty($_POST['date']) && !empty($_POST['totalprice']) && !empty($_POST['amount']) && !empty($_POST['customerid']))
        {
            var_dump('bbb');
            $orderid = $_POST['orderid'];
            $date = $_POST['date'];
            $amount = $_POST['amount'];
            $totalprice = $_POST['totalprice'];
            $customerid = $_POST['customerid'];

            $query = $dbh->prepare("UPDATE orders SET date = '$date',
              totalPrice = $totalprice,
              amount = $amount,
              customer_id = $customerid WHERE Order_id = $orderid");
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
        $query = $dbh->prepare("DELETE FROM orders WHERE order_id = $idToDelete");
        $query->execute();

        header("Refresh: 0, url=adminOrders.php");
    }
}

displayModificationForm();
modifyOrder($dbh);
delete($dbh);
?>