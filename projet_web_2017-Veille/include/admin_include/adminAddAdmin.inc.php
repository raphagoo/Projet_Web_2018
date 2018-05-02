<?php
function verifyPassword($password)
{
    if (preg_match("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,20}) ", $password) && !preg_match("((?=.*" . $_POST['username'] . "))", $password))
    {
        return true;
    }
    else {
        return false;
    }
}

function verifyName(&$dbh, $username, $password)
{
    $verified = true;

    $query = $dbh->prepare('SELECT username FROM admin');
    $query->execute();
    $verifyUniqueName = $query->fetchAll();

    for ($i = 0; $i < count($verifyUniqueName); $i++){
        if($username == $verifyUniqueName[$i][0]){
            echo "Ce nom d'utilisateur existe déjà.";
            $verified = false;
        }
    }

    $query = $dbh->prepare('SELECT userName FROM customer');
    $query->execute();
    $verifyUniqueName = $query->fetchAll();

    for ($i = 0; $i < count($verifyUniqueName); $i++){
        if($username == $verifyUniqueName[$i][0]){
            echo "Ce nom d'utilisateur existe déjà.";
            $verified = false;
        }
    }

    if ($verified)
    {
        $verified = verifyPassword($password);
    }

    return $verified;
}

function addAdmin(&$dbh)
{
    if (!empty($_POST['addAdminSubmit']))
    {
        $username = $_POST['username'];
        $password = $_POST['adminPassword'];
        if (verifyName($dbh, $username, $password))
        {
            $password = password_hash($password, PASSWORD_ARGON2I);

            $query = $dbh->prepare("INSERT INTO admin (username, password) VALUE ('$username', '$password')");
            $query->execute();

            $query = $dbh->prepare("SELECT Admin_id FROM admin ORDER BY Admin_id DESC LIMIT 1;");
            $query->execute();
            $lastAdmin_id = intval($query->fetchAll()[0][0]);

            $query = $dbh->prepare("INSERT INTO details (Admin_id) VALUES ($lastAdmin_id)");
            $query->execute();

            $query = $dbh->prepare("SELECT details_id FROM details ORDER BY details_id DESC LIMIT 1;");
            $query->execute();
            $lastDetails_id = $query->fetchAll()[0][0];

            $query = $dbh->prepare("UPDATE admin SET details_id = $lastDetails_id WHERE Admin_id = $lastAdmin_id");
            $query->execute();
        }
    }
}


addAdmin($dbh);

?>