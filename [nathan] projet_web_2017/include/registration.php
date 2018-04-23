<?php

if(isset($_POST['registration'])){

    if (!empty($_POST['pseudo']) && !empty($_POST['passwd']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['birthdate']) && !empty($_POST['mail'])){

        $pseudo = $_POST['pseudo'];
        $mail = $_POST['mail'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = "";
        $city = "";
        $country = "";
        $address1 = "";
        $address2 = "";
        $zipCode = "";
        $birthdate = $_POST['birthdate'];
        $password = $_POST['passwd'];
        $creationDate = date('Y-m-d');




        $sth = $dbh->prepare('SELECT pseudo FROM customer;');
        $sth->execute();
        $verifyUniquePseudo = $sth->fetchAll();

        $sth = $dbh->prepare('SELECT email FROM details;');
        $sth->execute();
        $verifyUniqueMail = $sth->fetchAll();

        //var_dump($verifyUniqueMail);

        for ($i = 0; $i < count($verifyUniqueMail); $i++){
            if($mail == $verifyUniqueMail[$i][0]){
                die("Cette adresse mail existe deja");
            }
        }

        for ($i = 0; $i < count($verifyUniquePseudo); $i++){
            if($pseudo == $verifyUniquePseudo[$i][0]){
                die("Ce pseudo existe deja");
            }
        }



        $sth = $dbh->prepare('INSERT INTO details (email, address1, address2, country, city, zipCode, phone) VALUES ("' . $name . '", "' . $gender . '", "' . $birthdate . '", "' . $mail . '", "' . $creationDate . '");');
        $sth->execute();

        $sth = $dbh->prepare('SELECT userdetails_id FROM userdetails ORDER BY userdetails_id DESC LIMIT 1;');
        $sth->execute();
        $userdetailsID = intval($sth->fetchAll()[0][0]);


        //$options = ['memory_cost'=>1024, 'time_cost'=>12 , 'threads'=>2];
        $password = password_hash($password, PASSWORD_ARGON2I);
        var_dump($password);

        var_dump($userdetailsID);
        $sth = $dbh->prepare('INSERT INTO user(pseudo, passwd, userdetails_id) VALUES ("'. $pseudo .'", "'. $password .'", "'. $userdetailsID .'");');
        $sth->execute();



    }
    else{
        echo "Tous les champs doivent être remplis";
    }
}else if(isset($_POST['connect'])){
    if (!empty($_POST['connectPseudo']) && !empty($_POST['connectPasswd'])){
        $pseudo = $_POST['connectPseudo'];
        $password = $_POST['connectPasswd'];

        $sth = $dbh->prepare('SELECT passwd FROM user WHERE pseudo="'.$pseudo.'"');
        $sth->execute();
        //$passwordFromTable = $sth->fetchAll()[0][0];
        $hash = $sth->fetchAll()[0][0];




        if (password_verify($password, $hash)) {
            session_start();
            $_SESSION['pseudo'] = $_POST['connectPseudo'];
            header('refresh:0');

        }else{
            echo "Mot de passe ou pseudo incorrect...";
        }

    } else {
        echo "Veuillez remplir tous les champs";
    }
}