<?php

$target= 'contactlcda@gmail.com' ;

$copie = 'oui';



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Content</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<div class="container">
    <form id="contact" method="post" action="">
        <h3>Contact Us</h3>
        <fieldset>
            <p><label for="name"><input placeholder="Your name" type="text" id="name" name="name"></label></p>
            <p><label for="email"><input placeholder="Your email" type="text" id="email" name="email"></label></p>
            <p><label for="message"></label><textarea placeholder="Your message" id="message" name="message" cols="80" rows="25"></textarea></p>
        </fieldset>
        <button name="submit" type="submit" id="contact-submit" value="send message!">Send</button>
    </form>
</div>
</body>
</html>