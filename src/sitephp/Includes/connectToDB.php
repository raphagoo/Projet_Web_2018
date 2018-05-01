<?php
$dsn = 'mysql:dbname=projet_web_2017;host=localhost';
$DBuser = 'root';
$DBpassword = '';

try {
    $dbh = new PDO($dsn, $DBuser, $DBpassword);
} catch (PDOException $e){
    echo 'FAIL : ' . $e->getMessage();
}
