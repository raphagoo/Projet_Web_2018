<?php require ('Includes/connectToDB.php'); ?>
<?php
function avoirinfos($name)
{
    $afficherantableau = $dbh->query('SELECT * FROM product WHERE name = "$name"');
}
?>