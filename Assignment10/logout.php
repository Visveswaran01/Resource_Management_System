<?php
    session_start();
    echo $_SESSION['pwd'];
    unset($_SESSION);
    session_destroy();
    header('Location: home.html');
?>