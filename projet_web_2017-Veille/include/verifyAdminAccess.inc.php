<?php
function verifyAccessAdmin()
{
    session_start();
    if (empty($_SESSION['userName']) || $_SESSION['rank'] != 1)
    {
        header('Location: forbidden.php');
    }
}

verifyAccessAdmin();
?>