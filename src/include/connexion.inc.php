<?php

function connectUser(&$dbh, $username, $password)
{
    $sth = $dbh->prepare('SELECT password FROM customer WHERE userName="'.$username.'"');
    $sth->execute();
    //$passwordFromTable = $sth->fetchAll()[0][0];
    $tab = $sth->fetchAll();

    if(!empty($tab[0][0]))
    {
        $hash = $tab[0][0];

        if (password_verify($password, $hash)) {

            $sth = $dbh->prepare('SELECT customer_id FROM customer WHERE userName="'.$username.'"');
            $sth->execute();
            //$passwordFromTable = $sth->fetchAll()[0][0];
            $id = $sth->fetchAll();


            $_SESSION['userName'] = $username;
            $_SESSION['rank']=0;
            $_SESSION['userID']= $id[0]['customer_id'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

function connectAdmin(&$dbh, $username, $password)
{
    $sth = $dbh->prepare('SELECT password FROM admin WHERE username="'.$username.'"');
    $sth->execute();
    //$passwordFromTable = $sth->fetchAll()[0][0];
    $tab = $sth->fetchAll();
    if(!empty($tab[0][0]))
    {
        $hash = $tab[0][0];

        if (password_verify($password, $hash)) {

            $sth = $dbh->prepare('SELECT Admin_id FROM admin WHERE username="'.$username.'"');
            $sth->execute();
            //$passwordFromTable = $sth->fetchAll()[0][0];
            $id = $sth->fetchAll();

            $_SESSION['userName'] = $username;
            $_SESSION['rank']=1;
            $_SESSION['userID']= $id[0]['Admin_id'];
            return true;
        } else {

            return false;
        }
    } else {
        return false;
    }
}

if (!empty($_POST['subConnection']))
{
    if(!empty($_POST['emailUsername']) && !empty($_POST['password']))
    {
        $username = $_POST['emailUsername'];
        $password = $_POST['password'];

        if (!connectUser($dbh, $username, $password) && !connectAdmin($dbh, $username, $password))
        {
            echo "<script type='application/javascript'>displayPopup(); swapToLoginForm(); wrongPasswordStyle();</script>";
        }
        else {
            echo "<script type='application/javascript'>displayPopup(); swapToLoginForm(); wrongEmailStyle();</script>";
        }
    }
}

?>