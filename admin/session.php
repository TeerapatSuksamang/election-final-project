<?php

    include_once '../db.php';
    session_start();
    if(!$_SESSION['admin_id']){
        header('location: login.php');
    }

?>