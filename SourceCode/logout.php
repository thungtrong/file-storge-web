<?php
    session_start();
    unset($_SESSION['Login']);
    unset($_SESSION['TypeUser']);
    unset($_SESSION['check']);
    header('Location: login.php');
?>