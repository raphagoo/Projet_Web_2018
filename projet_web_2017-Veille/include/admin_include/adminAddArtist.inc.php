<?php
function verifyName(&$dbh, $Artist_name)
{
    $verified = true;


    $query = $dbh->prepare('SELECT * FROM artist');
    $query->execute();
    $verifyUniqueName = $query->fetchAll();

    for ($i = 0; $i < count($verifyUniqueName); $i++){
        if($Artist_name == $verifyUniqueName[$i][0]){
            echo "Cet artiste existe déjà.";
            $verified = false;
        }
    }

    return $verified;
}

function addArtist(&$dbh)
{
    if (!empty($_POST['Artist_name']))
    {
        $Artist_name = $_POST['Artist_name'];
        if (verifyName($dbh, $Artist_name))
        {
            $query = $dbh->prepare("INSERT INTO artist VALUE ('$Artist_name')");
            $query->execute();
        }
    }

}


addArtist($dbh);

?>