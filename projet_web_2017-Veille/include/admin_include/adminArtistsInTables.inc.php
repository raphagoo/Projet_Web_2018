<?php
function selectAllArtists(&$dbh)
{
    $query = $dbh->prepare("SELECT Artist_name FROM artist");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function displayTable(&$dbh)
{
    $allArtists = selectAllArtists($dbh);

    for ($i = 0; $i < count($allArtists); $i++)
    {
        $urlModif = "adminArtists.php?artist=". $allArtists[$i]['Artist_name'];
        $links = "<td><a href='$urlModif'>Modifier</a></td><td><a href='adminArtists.php?deleteid=" . $allArtists[$i]['Artist_name'] . "'>Supprimer</a></td>";
        echo "<tr><td>" . $allArtists[$i]['Artist_name'] . "</td>$links</tr>";
    }
}

displayTable($dbh);
?>