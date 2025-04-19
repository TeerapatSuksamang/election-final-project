<?php

    include_once 'db.php';
    session_start();
    if(isset($_POST['submit'])){
        $std_code = $_POST['std_code'];
        $id_card = $_POST['id_card'];

        // echo $std_code.'</br>'.$id_card;

        $select = mysqli_query($conn, "SELECT * FROM `student` WHERE `std_code` = '$std_code'");
        
        if($select -> num_rows > 0){
            $select = mysqli_query($conn, "SELECT * FROM `student` WHERE `std_code` = '$std_code' AND `id_card` = '$id_card' ");

            if($select -> num_rows > 0){
                $row = mysqli_fetch_array($select);
                // echo $row['std_name'];
                $_SESSION['std_id'] = $row['std_id'];
                // echo $_SESSION['std_id'];
                header('location: ../index.php');
            } else {
                alert('เลขบัตรประชาชนไม่ถูกต้อง');
            }
        } else {
            alert('ไม่พบรหัสนักศึกษา');
        }
    }

?>