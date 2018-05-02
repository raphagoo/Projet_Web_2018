<?php

function displayModificationForm()
{
    if (!empty($_GET['artist']))
    {
        $artist = $_GET['artist'];
        //$previousName = $artist;

        echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
        
        
        <div class='form-row'>
            <label for='prevArtist'>Identifiant :</label>
            <input type='hidden' name='prevArtist' value='$artist'>
            <input class='form-control' type='text' id='prevArtist' name='artist' value='$artist'>
        </div>
        <br/>
        <div class='form-row'>
            <input class='form-control' type='submit' name='subValidate' value='Valider'>
        </div>
        </form>";
    }
}

function modifyUser(&$dbh)
{
    if(!empty($_POST['subValidate']))
    {
        var_dump("fafa");
        if(!empty($_POST['artist']) && !empty($_POST['prevArtist']))
        {
            var_dump("fafa");
            $artist = $_POST['artist'];
            $prevArtist = $_POST['prevArtist'];

            $query = $dbh->prepare("UPDATE artist SET Artist_name = '$artist' WHERE Artist_name = '$prevArtist'");
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
        $query = $dbh->prepare("DELETE FROM artist WHERE Artist_name = '$idToDelete'");
        $query->execute();

        header("Refresh: 0, url=adminArtists.php");
    }
}

displayModificationForm();
modifyUser($dbh);
delete($dbh);
?>