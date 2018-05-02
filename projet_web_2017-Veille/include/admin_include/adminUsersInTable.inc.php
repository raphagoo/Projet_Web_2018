<?php
function selectAllUsers(&$dbh)
{
    $query = $dbh->prepare("SELECT c.customer_id, c.userName, d.email FROM customer c, details d WHERE d.customer_id=c.customer_id");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function displayTable(&$dbh)
{
    $allUsers = selectAllUsers($dbh);

    for ($i = 0; $i < count($allUsers); $i++)
    {
        $urlModif = "adminUsers.php?custid=".$allUsers[$i]['customer_id'] . "&username=" . $allUsers[$i]['userName'] . "&email=" . $allUsers[$i]['email'];
        $links = "<td><a href='$urlModif'>Modifier</a></td><td><a href='adminUsers.php?deleteid=" . $allUsers[$i]['customer_id'] . "'>Supprimer</a></td>";
        echo "<tr><td>" . $allUsers[$i]['customer_id'] . "</td><td>" . $allUsers[$i]['userName'] . "</td><td>" . $allUsers[$i]['email'] . "</td>$links</tr>";
    }
}

displayTable($dbh);
?>