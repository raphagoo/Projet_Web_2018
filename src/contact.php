<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="Assets/CSS/ste.css">
    <Title>Le Comptoir des Arts - Contact </Title>
</head>
<body>
<?php require ('include/header.php') ?>
<div id="titrecontact">
<h1>Contact</h1>
</div>
<div id="formulairecontact">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>
    <legend>Email</legend>
        <input type="text" name="email">
    </fieldset>
    <fieldset>
    <legend>Message</legend>
        <textarea name="message" cols="60" rows="20"></textarea>
    </fieldset><br>
    <input id="boutoncontact" type="submit" value="Envoyer le message">
</form>
</div>
<?php require ('include/footer.php') ?>
