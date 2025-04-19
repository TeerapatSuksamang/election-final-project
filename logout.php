<?php
    session_start();
    unset($_SESSION['std_id']);
    header('location: login.php');
?>