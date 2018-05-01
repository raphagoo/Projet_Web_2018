<?php
session_start();
    if(isset($_SESSION['userName'])){
        header("Location: membre.php");
    }
    else{
        header("Location: index.php?connexion=0");
    }