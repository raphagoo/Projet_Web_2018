<?php

function displayModificationForm()
{
    if (!empty($_GET['custid']) && !empty($_GET['username']) && !empty($_GET['email']))
    {
        $custid = $_GET['custid'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        echo "<div id='form'><form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
        <div class='form-row'>
            <label for='disableCustid'>Identifiant :</label>
            <input class='form-control' type='text' id='disableCustid' name='disabledCustid' value='$custid' disabled>
            <input class='form-control' type='hidden' name='custid' value='$custid'>
        </div>
        <br/>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='username'>Nom d'utilisateur :</label>
                <input class='form-control' type='text' id='username' name='username' value='$username'>
            </div>
            <div class='form-group col-md-6'>
                <label for='email'>Email :</label>
                <input class='form-control' type='email' id='email' name='email' value='$email'>
            </div>
        </div>
        
        
        <div class='form-row'>   
            <input class='form-control' type='submit' name='subValidate' value='Valider'>      
        </div>
        </form></div>";
    }
}

function modifyUser(&$dbh)
{
    if(!empty($_POST['subValidate']))
    {
        if(!empty($_POST['custid']) && !empty($_POST['username']) && !empty($_POST['email']))
        {
            $custid = $_POST['custid'];
            $username = $_POST['username'];
            $email = $_POST['email'];

            $query = $dbh->prepare("UPDATE customer SET userName = '$username' WHERE customer_id = $custid");
            $query->execute();

            $query = $dbh->prepare("UPDATE details SET email = '$email' WHERE customer_id = $custid");
            $query->execute();

            header("Refresh: 0");
        }
    }
}

function delete(&$dbh)
{
    if(!empty($_GET['deleteid']))
    {
        $idToDelete = $_GET['deleteid'];
        $query = $dbh->prepare("DELETE FROM customer WHERE customer_id = $idToDelete");
        $query->execute();

        header("Refresh: 0, url=adminUsers.php");
    }
}

displayModificationForm();
modifyUser($dbh);
delete($dbh);
?>