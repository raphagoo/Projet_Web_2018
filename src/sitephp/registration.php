<?php require ("Includes/connectToDB.php"); require ("Includes/registration.inc.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Enregistration</title>
    </head>

    <body>
        <h1>S'enregistrer :</h1>

        <!-- Username, password, email, firstname, lastname, address1, *address2, country, city, zipcode, *phone -->

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="username"> Nom d'utilisateur : </label>
            <?php
            if (isset($_POST['connexionPopupUsername']))
            {
                echo '<input id="username" type="text" name="username" value="' . $_POST["connexionPopupUsername"] . '" />';
            } else {
                echo '<input id="username" type="text" name="username"/>';
            }
            ?>


            <br/>

            <label for="email"> Adresse e-mail : </label>
            <?php
            if (isset($_POST['connexionPopupMail']))
            {
                echo '<input id="email" type="email" name="email" value="' . $_POST["connexionPopupMail"] . '"/>';
            } else {
                echo '<input id="email" type="email" name="email" />';
            }
            ?>

            <br/>

            <label for="password"> Mot de passe : </label>
            <input id="password" type="password" name="password" />

            <br/>

            <label for="firstname"> Prénom : </label>
            <input id="firstname" type="text" name="firstname" />

            <br/>

            <label for="lastname"> Nom : </label>
            <input id="lastname" type="text" name="lastname" />

            <br/>

            <label for="address1"> Adresse n°1 : </label>
            <input id="address1" type="text" name="address1" />

            <br/>

            <label for="address2"> Adresse n°2 : </label>
            <input id="address2" type="text" name="address2" />

            <br/>

            <label for="country"> Pays : </label>
            <select id="country" name="country">
                <option value="France">France</option>
                <option value="France">Russie</option>
            </select>

            <br/>

            <label for="city"> Ville : </label>
            <input id="city" type="text" name="city"/>

            <br/>

            <label for="zipcode"> Code postal : </label>
            <input id="zipcode" type="text" name="zipcode" />

            <br/>

            <label for="phone"> Téléphone : </label>
            <input id="phone" type="text" name="phone" />

            <br/>

            <input type="submit" name="registrationSubmit"/>

        </form>
    </body>
</html>
