<?php
require ('include/connectToDB.inc.php');


?>
<?php require ('include/header.php');
    
if (empty($_SESSION['userName']))
{
    die("Seul les membres peuvent consulter leurs informations. <a href='index.php'>Retour à l'index</a>");
}

if (!empty($_SESSION['userName']) && $_SESSION['rank'] == 0)
{
    $detailsQuery = $dbh->prepare("SELECT * FROM details WHERE customer_id = (SELECT customer_id FROM customer WHERE userName='" . $_SESSION['userName'] ."')");
    $detailsQuery->execute();
    $details = $detailsQuery->fetchAll();
} elseif (!empty($_SESSION['userName']) && $_SESSION['rank'] == 1) {
    $detailsQuery = $dbh->prepare("SELECT * FROM details WHERE Admin_id = (SELECT Admin_id FROM admin WHERE username='" . $_SESSION['userName'] ."')");
    $detailsQuery->execute();
    $details = $detailsQuery->fetchAll();
}

if (!empty($_POST['validateDetailsModifications']) && $_SESSION['rank'] == 0) {
    if (!empty($_POST["email"])
        && !empty($_POST["firstName"])
        && !empty($_POST["lastName"])
        && !empty($_POST["address1"])
        && !empty($_POST["city"])
        && !empty($_POST["zipCode"])) {
        $email = $_POST["email"];
        $firstname = $_POST["firstName"];
        $lastname = $_POST["lastName"];
        $address1 = $_POST["address1"];
        $city = $_POST["city"];
        $zipcode = $_POST["zipCode"];

        if (empty($_POST["address2"])) {
            $address2 = null;
        } else {
            $address2 = $_POST["address2"];
        }

        if (empty($_POST["phone"])) {
            $phone = null;
        } else {
            $phone = $_POST["phone"];
        }
        $modifQuery = $dbh->prepare("UPDATE details SET email='$email', address1='$address1', address2='$address2', city='$city', zipCode='$zipcode', phone='$phone', firstName='$firstname', lastName='$lastname' WHERE customer_id=(SELECT customer_id FROM customer WHERE userName='" . $_SESSION['userName'] ."')");
        $modifQuery->execute();

        header("Refresh: 0");
    }
} elseif (!empty($_POST['validateDetailsModifications']) && $_SESSION['rank'] == 1) {
    if (!empty($_POST["email"])
        && !empty($_POST["firstName"])
        && !empty($_POST["lastName"])
        && !empty($_POST["address1"])
        && !empty($_POST["city"])
        && !empty($_POST["zipCode"])) {
        $email = $_POST["email"];
        $firstname = $_POST["firstName"];
        $lastname = $_POST["lastName"];
        $address1 = $_POST["address1"];
        $city = $_POST["city"];
        $zipcode = $_POST["zipCode"];

        if (empty($_POST["address2"])) {
            $address2 = null;
        } else {
            $address2 = $_POST["address2"];
        }

        if (empty($_POST["phone"])) {
            $phone = null;
        } else {
            $phone = $_POST["phone"];
        }
        $modifQuery = $dbh->prepare("UPDATE details SET email='$email', address1='$address1', address2='$address2', city='$city', zipCode='$zipcode', phone='$phone', firstName='$firstname', lastName='$lastname' WHERE Admin_id = (SELECT Admin_id FROM admin WHERE username='" . $_SESSION['userName'] ."')");
        $modifQuery->execute();

        header("Refresh: 0");
    }
}


?>
<link rel="stylesheet" href="Assets/CSS/ste.css">
<div id="membreinfo">
<h2>Mes Informations</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Nom d'utilisateur : <?php echo $_SESSION['userName'] ?><br>
    <label for="password">Mot de passe actuel :</label>
    <input id="password" type="password" name="password"><br>

    <label for="newPassword">Nouveau mot de passe :</label>
    <input id="newPassword" type="password" name="newPassword"><br>

    <div id="newPassword_strength">
        <?php



        function verifyPassword($password)
        {
            if (preg_match("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,20}) ", $password))
            {
                return true;
            }
            else {
                return false;
            }
        }

        if (!empty($_POST['confirmation']))
        {
            if (isset($_POST['newPassword']) && $_SESSION['rank'] == 0) {
                $password = $_POST['password'];
                $newPassword = $_POST['newPassword'];
                $query = $dbh->prepare('SELECT password FROM customer WHERE userName ="' . $_SESSION['userName'] . '"');
                $query->execute();
                $tab = $query->fetchAll();
                if (!empty($tab[0][0])) {
                    $hash = $tab[0][0];

                    if (verifyPassword($newPassword))
                    {
                        if (password_verify($password, $hash)) {
                            $newPassword = password_hash($newPassword, PASSWORD_ARGON2I);

                            $query = $dbh->prepare('UPDATE customer SET password ="' . $newPassword . '" WHERE userName ="' . $_SESSION['userName'] . '"');
                            $query->execute();
                            echo "Le mot de passe a été changé";
                        } else {
                            echo "Le mot de passe actuel entré ne correspond pas.";
                        }
                    } else {
                        echo "<div><p>Le mot de passe doit contenir au moins 8 caractères avec une majuscule, une minuscule, un chiffre, un caractère spécial, pas d'espace.</p></div>";
                    }
                }
            }
            elseif (isset($_POST['newPassword']) && $_SESSION['rank'] == 1){
                $password = $_POST['password'];
                $newPassword = $_POST['newPassword'];
                $query = $dbh->prepare('SELECT password FROM admin WHERE username ="' . $_SESSION['userName'] . '"');
                $query->execute();
                $tab = $query->fetchAll();
                if (!empty($tab[0][0])) {
                    $hash = $tab[0][0];
                    print_r($newPassword);
                    if (verifyPassword($newPassword))
                    {
                        if (password_verify($password, $hash)) {
                            $newPassword = password_hash($newPassword, PASSWORD_ARGON2I);

                            $query = $dbh->prepare('UPDATE admin SET password ="' . $newPassword . '" WHERE username ="' . $_SESSION['userName'] . '"');
                            $query->execute();
                            echo "Le mot de passe a été changé";
                        } else {
                            echo "Le mot de passe actuel entré ne correspond pas.";
                        }
                    } else {
                        echo "<div><p>Le mot de passe doit contenir au moins 8 caractères avec une majuscule, une minuscule, un chiffre, un caractère spécial, pas d'espace.</p></div>";
                    }
                }
            }
        }


        ?>
    </div>

    <label for="confirmPassword">Confirmer le mot de passe :</label>
    <input id="confirmPassword" type="password" name="confirmPassword"><br>
<input type="submit" name="confirmation" value="Confirmation">
</form>
    <br>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <br>
        <label for="lastName">Nom* :</label>
        <input id="lastName" type="text" name="lastName" value="<?php echo $details[0]['lastName'] ?>">
        <br/>
        <label for="firstName">Prénom* :</label>
        <input id="firstName" type="text" name="firstName" value="<?php echo $details[0]['firstName'] ?>">
        <br/>
        <label for="email">Email* :</label>
        <input id="email" type="text" name="email" value="<?php echo $details[0]['email'] ?>">
        <br/>
        <label for="address1">Adresse 1* :</label>
        <input id="address1" type="text" name="address1" value="<?php echo $details[0]['address1'] ?>">
        <br/>
        <label for="address2">Adresse 2 :</label>
        <input id="address2" type="text" name="address2" value="<?php echo $details[0]['address2'] ?>">
        <br/>
        <label for="city">Ville* :</label>
        <input id="city" type="text" name="city" value="<?php echo $details[0]['city'] ?>">
        <br/>
        <label for="zipCode">Code postal* :</label>
        <input id="zipCode" type="text" name="zipCode" value="<?php echo $details[0]['zipCode'] ?>">
        <br/>
        <label for="phone">Téléphone :</label>
        <input id="phone" type="text" name="phone" value="<?php echo $details[0]['phone'] ?>">
        <br/>
        <input type="submit" name="validateDetailsModifications" value="Valider les modifications" />

    </form>
</div>
<hr class="vrmembre">
<div id="membrecommande">
<h2>Mes Commandes</h2>
    <div id="adminUsersDivTable">
        <table border="1">
            <thead>
            <tr>
                <th>N°</th>
                <th>Date</th>
                <th>Prix total</th>
                <th>Nb Articles</th>
                <th>ID Commande</th>
            </tr>
            </thead>

            <tfoot>

            </tfoot>

            <tbody>
            <?php require ("include/userOrdersInTables.inc.php"); ?>
            </tbody>
        </table>
    </div>
</div>
<?php require ('include/footer.php') ?>
</body>
</html>
