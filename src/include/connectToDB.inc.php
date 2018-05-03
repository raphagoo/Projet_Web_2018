<?php
$dsn = 'mysql:dbname=Le_comptoir_des_arts;host=localhost';
$DBuser = 'root';
$DBpassword = '';

try {
    $dbh = new PDO($dsn, $DBuser, $DBpassword);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    echo 'FAIL : ' . $e->getMessage();
}
