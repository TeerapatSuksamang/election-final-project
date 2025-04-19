<?php

include_once 'db.php';
session_start();
    if(!isset($_SESSION['std_id'])){
        header("location: login.php");
    }

?>