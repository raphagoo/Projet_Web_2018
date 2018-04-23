<?php require ('include/connectToDB.php');?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription - ProjetDev</title>

  </head>
  <body>
    <h1>Identification :</h1>
    <h2>Inscription :</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="idPseudo">Pseudo : </label>
      <input type="text" name="pseudo" id="idPseudo" />
      <br />
      <label for="idPasswd">Mot de passe : </label>
      <input type="password" name="passwd" id="idPasswd" />
      <br />
      <label for="idLastname">Nom : </label>
      <input type="text" name="lastname" id="idLastname"/>
        <br />
        <label for="idFirstname">Prénom : </label>
        <input type="text" name="firstname" id="idFirstname"/>
      <br />
      <label for="idMail">Adresse email : </label>
      <input type="email" name="mail" id="idMail">
      <br />
      <label for="">Sexe : </label>
      <label for="genderMale">Homme : </label>
      <input type="radio" name="gender" value="male" id="genderMale"/>
      <label for="genderFemale">Femme : </label>
      <input type="radio" name="gender" value="female" id="genderFemale"/>
      <label for="genderOther">Autre : </label>
      <input type="radio" name="gender" value="other" id="genderOther"/>
      <br />
      <label for="idBirthdate">Date de naissance : </label>
      <input type="date" name="birthdate" id="idBirthdate"/>
      <br />
      <input type="submit" name="registration" value="S'inscrire">
    </form>



    <h2>Connexion : </h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="idPseudo">Pseudo : </label>
        <input type="text" name="connectPseudo" id="idPseudo" />
        <br />
        <label for="idPasswd">Mot de passe : </label>
        <input type="password" name="connectPasswd" id="idPasswd" />

        <input type="submit" name="connect" value="Se connecter">
    </form>

    <?php require ('include/registration.php');?>

  </body>
</html>
