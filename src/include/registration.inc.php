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
         $password = $_POST["password"];

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

         $sth = $dbh->prepare('SELECT userName FROM customer;');
         $sth->execute();
         $verifyUniquePseudo = $sth->fetchAll();

         $sth = $dbh->prepare('SELECT email FROM details;');
         $sth->execute();
         $verifyUniqueMail = $sth->fetchAll();

         $url = "registration.php";
         $timeout = 2;
         for ($i = 0; $i < count($verifyUniqueMail); $i++){
             if($email == $verifyUniqueMail[$i][0]){

                 header ("refresh: $timeout; url=$url");
                die("Cet e-mail est déja utilisé!");

             }
         }

         for ($i = 0; $i < count($verifyUniquePseudo); $i++){
             if($username == $verifyUniquePseudo[$i][0]){
                 header ("refresh: $timeout; url=$url");
                 die("Ce pseudo existe deja");

             }
         }

         if (!verifyPassword($password))
         {
             header ("refresh: $timeout; url=$url");
             die("Le mot de passe ne respecte pas les critères");

         }


         $password = password_hash($password, PASSWORD_ARGON2I);

        $query = $dbh->prepare("INSERT INTO customer (userName, password) VALUES ('" . $username . "', '" . $password . "')");
        $query->execute();
        

        $query = $dbh->prepare("SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1;");
        $query->execute();
        
        $lastCustomer_id = intval($query->fetchAll()[0][0]);
  

        $query = $dbh->prepare("INSERT INTO details (customer_id, email, firstName, lastName, address1, address2, country, city, zipCode, phone) VALUES (".$lastCustomer_id.",
        '" . $email . "',
        '" . $firstname . "',
        '" . $lastname . "',
        '" . $address1 . "',
        '" . $address2 . "',
        '" . $country . "',
        '" . $city . "',
        '" . $zipcode . "',
        '" . $phone . "');");
       
        $query->execute();
      


         $query = $dbh->prepare("SELECT details_id FROM details ORDER BY details_id DESC LIMIT 1;");
         $query->execute();
         $lastDetails_id = $query->fetchAll()[0][0];

         $query = $dbh->prepare("UPDATE customer SET details_id = $lastDetails_id WHERE customer_id = $lastCustomer_id");
         $query->execute();

         echo "<script>  alert('Compte crée avec succès, vous pouvez dès à present vous connecter.')  </script>";
         $url = "galerie.php";
         header("refresh: 2; url = $url");
     }
     else {

     }

 }
?>