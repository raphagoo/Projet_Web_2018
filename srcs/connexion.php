<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <body>

    <form action="connexion.php" method="post">
      <label for="pseudo">Pseudo: </label>
      <input type="text" name="pseudo" value="" />

      <label for="mot_de_passe">Mot de passe:</label> 
      <input type="password" name="mot_de_passe" value="" />

      <input type="submit" name="connexion" value="Connexion" />
    </form>


    <?php
    session_start();
    if(isset($_POST['connexion'])) {
        if(empty($_POST['pseudo'])) {
            echo "Vous n'avez pas rentré de pseudo";
        } else {

            if(empty($_POST['mot_de_passe'])) {
                echo "Vous n'avez pas rentré de mot de passe";
            } else {

                $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1");
                $MotDePasse = htmlentities($_POST['mot_de_passe'], ENT_QUOTES, "ISO-8859-1");

                $mysqli = mysqli_connect("localhost", "root", "", "projet_web_2017");

                if(!$mysqli){
                    echo "Erreur de connexion à la base de données.";
                } else {

                    $Requete = mysqli_query($mysqli,"SELECT * FROM user WHERE username = '".$Pseudo."' AND user_password = '".$MotDePasse."'");
                    if(mysqli_num_rows($Requete) == 0) {
                        echo "Le pseudo ou le mot de passe est incorrect";
                    } else {

                        $_SESSION['pseudo'] = $Pseudo;
                        echo "Vous êtes à présent connecté !";
                    }
                }
            }
        }
    }
    ?>
  </body>
</html>
