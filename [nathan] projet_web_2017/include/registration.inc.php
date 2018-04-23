<?php
 if (isset($_POST["registrationSubmit"]))
 {
     if (!empty($_POST["username"])
         && !empty($_POST["email"])
         && !empty($_POST["password"])
         && !empty($_POST["firstname"])
         && !empty($_POST["lastname"])
         && !empty($_POST["address1"])
         && !empty($_POST["country"])
         && !empty($_POST["city"])
         && !empty($_POST["zipcode"]))
     {
         $username = $_POST["username"];
         $email = $_POST["email"];
         $firstname = $_POST["firstname"];
         $lastname = $_POST["lastname"];
         $address1 = $_POST["address1"];
         $country = $_POST["country"];
         $city = $_POST["city"];
         $zipcode = $_POST["zipcode"];

         $lastCustomer_id = null;

        if (empty($_POST["address2"]))
        {
            $address2 = null;
        }
        else {
            $address2 = $_POST["address2"];
        }

        if (empty($_POST["phone"]))
        {
            $phone = null;
        }
        else {
            $phone = $_POST["phone"];
        }

         $password = $_POST["password"];
         $password = password_hash($password, PASSWORD_ARGON2I);
         var_dump($password);

        $query = $dbh->prepare("INSERT INTO customer (userName, password) VALUES ('" . $username . "', '" . $password . "')");
        $query->execute();

        $query = $dbh->prepare("SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1;");
        $query->execute();
        $lastCustomer_id = intval($query->fetchAll()[0][0]);

        $query = $dbh->prepare("INSERT INTO details (customer_id, email, firstName, lastName, address1, address2, country, city, zipCode, phone) VALUES ($lastCustomer_id,
        '" . $email . "',
        '" . $firstname . "',
        '" . $lastname . "',
        '" . $address1 . "',
        '" . $address2 . "',
        '" . $country . "',
        '" . $city . "',
        $zipcode,
        '" . $phone . "')");
        $query->execute();


         $query = $dbh->prepare("SELECT details_id FROM details ORDER BY details_id DESC LIMIT 1;");
         $query->execute();
         $lastDetails_id = $query->fetchAll()[0][0];

         $query = $dbh->prepare("UPDATE customer SET details_id = $lastDetails_id WHERE customer_id = $lastCustomer_id");
         $query->execute();




     }
     else {
        echo "NON";
     }
 }
?>