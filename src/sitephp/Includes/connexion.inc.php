<?php
if (!empty($_POST['subConnection']))
{
    if(!empty($_POST['emailUsername']) && !empty($_POST['password']))
    {
        $username = $_POST['emailUsername'];
        $password = $_POST['password'];

        $sth = $dbh->prepare('SELECT password FROM customer WHERE userName="'.$username.'"');
        $sth->execute();
        //$passwordFromTable = $sth->fetchAll()[0][0];
        $tab = $sth->fetchAll();

        if(!empty($tab[0][0]))
        {
            $hash = $tab[0][0];

            if (password_verify($password, $hash)) {
                $_SESSION['userName'] = $username;
                header('refresh:0');
            } else {
                echo "<script type='application/javascript'>displayPopup(); swapToLoginForm(); wrongAuth();</script>";
            }
        } else {
            echo "<script type='application/javascript'>displayPopup(); swapToLoginForm(); wrongAuth();</script>";
        }
    }
}

?>