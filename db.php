<?php

    $conn = mysqli_connect("localhost", "root", "", "election");
    
    function back(){
        echo "<script>window.history.back();</script>";
    }
    
    function alert($msg, $lo = null){
        if($lo == null){
            echo "<script>alert('$msg'); window.history.back();</script>";
        } else {
            echo "<script>alert('$msg'); window.location = '$lo';</script>";
        }
    }

?>