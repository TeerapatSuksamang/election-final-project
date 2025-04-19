<?php

    session_start();
    include_once 'db.php';
    if(!isset($_SESSION['std_id'])){
        alert("กรุณาลงชื่อเข้าใช้งานก่อน", "../login.php");
    }

    if(isset($_GET['vote_number'])){
        $std_id = $_SESSION['std_id'];
        $vote_num = $_GET['vote_number'];
        
        $select_std = mysqli_query($conn, "SELECT * FROM `student` WHERE `std_id` = '$std_id' ");
        $row_std = mysqli_fetch_array($select_std);

        if($row_std['vote'] == 0){
            try {
                // เพิ่มคะแนน
                $update_point = mysqli_query($conn, "UPDATE `candidate` SET `point` = `point` + 1 WHERE `number` = '$vote_num'");
                if (!$update_point) {
                    throw new Exception(mysqli_error($conn));
                }
            
                // อัปเดตการโหวตของนักเรียน
                $update_std = mysqli_query($conn, "UPDATE `student` SET `vote` = '$vote_num' WHERE `std_id` = '$std_id'");
                if (!$update_std) {
                    throw new Exception(mysqli_error($conn));
                }
            
                // Commit
                mysqli_commit($conn);
                alert('โหวตเรียบร้อยย', '../index.php');
            } catch (Exception $e) {
                mysqli_rollback($conn);
                alert('โหวตไม่ได้: ' . $e->getMessage());
            }
            
        } else {
            alert('โหวตได้คนละครั้งนะจ๊ะ');
        }
    }

?>