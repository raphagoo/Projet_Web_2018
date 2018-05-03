<?php
function selectAllOrders(&$dbh)
{
    $query = $dbh->prepare("SELECT * FROM orders");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function displayTable(&$dbh)
{
    $allOrders = selectAllOrders($dbh);

    for ($i = 0; $i < count($allOrders); $i++)
    {
        $urlModif = "adminOrders.php?orderid=".$allOrders[$i]['Order_id'] . "&date=" . $allOrders[$i]['date'] . "&totalprice=" . $allOrders[$i]['totalPrice'] . "&amount=" . $allOrders[$i]['amount'] . "&customerid=" . $allOrders[$i]['customer_id'];
        $links = "<td><a href='$urlModif'>Modifier</a></td><td><a href='adminOrders.php?deleteid=" . $allOrders[$i]['Order_id'] ."'>Supprimer</a></td>";
        echo "<tr><td>" . $allOrders[$i]['Order_id'] . "</td><td>" . $allOrders[$i]['date'] . "</td><td>" . $allOrders[$i]['totalPrice'] . "</td>
        <td>" . $allOrders[$i]['amount'] . "</td><td>" . $allOrders[$i]['customer_id'] . "</td>$links</tr>";
    }
}

displayTable($dbh);
?>