<?php

    include_once '../../db.php';
    session_start();
    if(isset($_POST['submit'])){ 
        $password = $_POST['password'];

        // echo $std_code.'</br>'.$id_card;

        $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_id` = '1' ");
        $row = mysqli_fetch_array($select);
        
        if(password_verify($password, $row['password'])){
                // echo $row['std_name'];
                $_SESSION['admin_id'] = $row['admin_id'];
                echo $_SESSION['admin_id'];
                header('location: ../index.php');

        } else {
            alert('รหัสผ่านไม่ถูก');
        }
    } 

?>