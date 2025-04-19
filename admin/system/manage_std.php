<?php

    include_once '../../db.php';
    session_start();

    require '../../vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['std'])) {
        
        $file = $_FILES['std']['tmp_name'];
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        foreach ($data as $index => $row) {
            if ($index == 0) continue; // ข้ามแถวหัวตาราง
            $col1 = $conn->real_escape_string($row[0]);
            $col2 = $conn->real_escape_string($row[1]);
            $col3 = $conn->real_escape_string($row[2]);
            
            $sql = "INSERT INTO `student` (`std_name`, `std_code`, `id_card`) VALUES ('$col1', '$col2', '$col3')";
            $conn->query($sql);
        }

        if($sql){
            alert('เพิ่มรายชื่อนักเรียนสำเร็จ');
        } else {
            alert('ขออภัย เกิดข้อผิดพลาด กรุณาลองอีกครั้งในภายหลัง');
        }
    }

?>