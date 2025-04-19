<?php

    include_once '../../db.php';
    session_start();

    if(isset($_POST['add_can'])){
        $std_code = $_POST['std_code'];
        $std_name = $_POST['std_name'];

        $number = $_POST['number'];
        $slogan = $_POST['slogan'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $file_name = $number . $std_code . '.' . end($temp);
        $file_path = "../../upload/" . $file_name;
        
        $select = mysqli_query($conn, "SELECT * FROM `candidate` WHERE `number` = '$number' ");
        if($select -> num_rows > 0){
            alert('เบอร์ผู้ลงสมัครซ้ำ');
        } else {           
            $sql = mysqli_query($conn, "UPDATE `student` SET `status` = 1 WHERE `std_code` = '$std_code' ");
    
            if($sql){
                if(move_uploaded_file($_FILES['img']['tmp_name'], $file_path)){
                    $sql = mysqli_query($conn, "INSERT INTO `candidate`(`number`, `std_code`, `std_name`, `std_img`, `slogan`)
                    VALUES('$number', '$std_code', '$std_name', '$file_name', '$slogan') ");
    
                    if($sql){
                        alert('เพิ่มผู้ลงสมัครสำเร็จ', '../candidate.php');
                    } else {
                        alert('เกิดข้อผิดพลาด');
                    }
                } else {
                    // alert('อัพโหลดรูปไม่ได้');
                }
            } else {
                alert('เกิดข้อผิดพลาด');
            }
        }
    }

    if(isset($_POST['edit_can'])){
        $std_code = $_POST['std_code']; 

        $number = $_POST['number'];
        $slogan = $_POST['slogan'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $file_name = $number . $std_code . '.' . end($temp);
        $file_path = "../../upload/" . $file_name;

        $select = mysqli_query($conn, "SELECT * FROM `candidate` WHERE `number` = '$number' AND `std_code` != '$std_code'  ");
        if($select -> num_rows > 0){
            alert('เบอร์ผู้ลงสมัครซ้ำ');
        } else {           
            if(move_uploaded_file($_FILES['img']['tmp_name'], $file_path)){
                $sql = mysqli_query($conn, "UPDATE `candidate` SET 
                `std_img` = '$file_name',
                `number` = '$number',
                `slogan` = '$slogan' WHERE `std_code` = '$std_code' ");
            } else {
                $sql = mysqli_query($conn, "UPDATE `candidate` SET 
                `number` = '$number',
                `slogan` = '$slogan' WHERE `std_code` = '$std_code' ");
            }    

            if($sql){
                alert('แก้ไขผู้ลงสมัครสำเร็จ', '../candidate.php');
            } else {
                alert('เกิดข้อผิดพลาดในการแก้ไข');
            } 
        }
    }

    if(isset($_POST['del_can'])){
        $std_code = $_POST['std_code'];
        $sql = mysqli_query($conn, "UPDATE `student` SET `status` = 0 WHERE `std_code` = '$std_code' ");
        
        if($sql){
            $sql = mysqli_query($conn, "DELETE FROM `candidate` WHERE `std_code` = '$std_code' ");
            alert('ลบผู้ลงสมัครสำเร็จ', '../candidate.php');
        } else {
            alert('เกิดข้อผิดพลาด');
        } 
    }

    if(isset($_POST['time_set'])){
        date_default_timezone_set("Asia/Bangkok");
        $date = $_POST['date'];
        
        // $time_start = DateTime::createFromFormat('H:i', $_POST['time_start'])->format('H:i');
        list($hour, $minute) = explode(':', $_POST['time_start']);
        $time_start = "$hour:$minute";

        // $time_end = DateTime::createFromFormat('H:i', $_POST['time_end'])->format('H:i');
        list($hour, $minute) = explode(':', $_POST['time_end']);
        $time_end = "$hour:$minute";

        // echo $date.'</br>';
        // echo $time_start.'</br>';
        // echo $time_end.'</br>';

        $sql = mysqli_query($conn, "UPDATE `admin` SET
        `date` = '$date',
        `time_start` = TIME_FORMAT('$time_start', '%H:%i'),
        `time_end` = TIME_FORMAT('$time_end', '%H:%i') WHERE `admin_id` = '".$_SESSION['admin_id']."' ");

        if($sql){
            alert('แก้ไขเวลาสำเร็จ', '../time_set.php');
        } else {
            alert('เกิดข้อผิดพลาดในการแก้ไข');
        } 
    }

?>