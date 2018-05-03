  <?php require ('include/connectToDB.inc.php');
    $afficherantableau=$dbh->query("SELECT * FROM product");
    $afficherantableaufetch= $afficherantableau->fetchAll(PDO::FETCH_CLASS);
header('Content-Type: application/json');
echo json_encode($afficherantableaufetch);
?>