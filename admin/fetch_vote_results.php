<?php
include_once '../db.php';

// ดึงข้อมูลผู้สมัครทั้งหมดจากฐานข้อมูล
// $result = mysqli_query($conn, "SELECT * FROM `student` ");

$query = "SELECT * FROM candidate ORDER BY point DESC";
$result = mysqli_query($conn, $query);

$candidates = [];
while ($row = mysqli_fetch_assoc($result)) {
    $candidates[] = [
        'number' => $row['number'],
        'name' => $row['std_name'],
        'img' => $row['std_img'],
        'slogan' => $row['slogan'],
        'point' => (int) $row['point']
    ];
}

// ดึงจำนวนคนที่ไม่ประสงค์ลงคะแนน
$query_no_vote = "SELECT COUNT(*) AS no_vote FROM student WHERE vote = (-1 AND 0)";
$result_no_vote = mysqli_query($conn, $query_no_vote);
$row_no_vote = mysqli_fetch_assoc($result_no_vote);

$candidates[] = [
    'number' => null,
    'name' => 'ไม่ประสงค์ลงคะแนน',
    'img' => '../img/none.png',
    'slogan' => null,
    'point' => (int) $row_no_vote['no_vote']
];

// ส่งผลลัพธ์เป็น JSON
// header('Content-Type: application/json');
echo json_encode($candidates);

?>