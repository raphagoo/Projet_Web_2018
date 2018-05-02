<?php
function selectAllOrders(&$dbh)
{
    $query = $dbh->prepare("SELECT Order_id, date, totalPrice, amount FROM orders WHERE customer_id=(SELECT customer_id FROM customer WHERE userName='" . $_SESSION['userName'] ."')");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function displayTable(&$dbh)
{
    $allOrders = selectAllOrders($dbh);

    for ($i = 0; $i < count($allOrders); $i++)
    {
        echo "<tr><td>" . ($i+1) . "</td><td>" . $allOrders[$i]['date'] . "</td><td>" . $allOrders[$i]['totalPrice'] . "</td><td>" . $allOrders[$i]['amount'] . "</td><td>" . $allOrders[$i]['Order_id'] . "</td></tr>";
    }
}

displayTable($dbh);
?>