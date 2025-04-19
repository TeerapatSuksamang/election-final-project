<?php
// เชื่อมต่อกับฐานข้อมูล
include_once 'db.php';

date_default_timezone_set("Asia/Bangkok");

// ดึงข้อมูลเวลาจากฐานข้อมูล
$select = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_id` = 1");
if (!$select || mysqli_num_rows($select) == 0) {
    echo json_encode(['error' => 'ไม่พบข้อมูล']);
    exit;
}

$row = mysqli_fetch_array($select);
$date = $row['date'];
list($hour_start, $minute_start) = explode(':', $row['time_start']);
$time_start = "$hour_start:$minute_start";
list($hour_end, $minute_end) = explode(':', $row['time_end']);
$time_end = "$hour_end:$minute_end";

$current_time = date("H:i");
$current_date = date("Y-m-d");

$response = [
    'date' => $date,
    'time_start' => $time_start,
    'time_end' => $time_end,
];

// ฟังก์ชันสำหรับดึงข้อมูลผู้สมัคร
function select_can($conn) {
    $result = [];

    // ดึงข้อมูลผู้สมัครทั้งหมด
    $select_all = mysqli_query($conn, "SELECT * FROM `candidate` ORDER BY `number` ASC");
    $candidates = [];
    while ($row = mysqli_fetch_assoc($select_all)) {
        $candidates[] = $row;
    }
    $result['candidates'] = $candidates;

    // ดึงข้อมูลผู้สมัครที่มีคะแนนสูงสุด
    $select_can = mysqli_query($conn, "SELECT * FROM `candidate` ORDER BY point DESC LIMIT 1");
    if ($select_can && mysqli_num_rows($select_can) > 0) {
        $row_can = mysqli_fetch_array($select_can);
        $result['candidate'] = [
            'number' => $row_can['number'],
            'std_name' => $row_can['std_name'],
            'std_img' => $row_can['std_img'],
            'slogan' => $row_can['slogan'],
            'point' => $row_can['point'],
        ];
    } else {
        $result['candidate'] = null;
    }

    return $result;
}

// เช็คสถานะ
if ($current_date < $date) {
    $response['status'] = "wait";
    $candidate_data = select_can($conn);
    $response = array_merge($response, $candidate_data);
} elseif ($current_date == $date) {
    if ($current_time < $time_start) {
        $response['status'] = "wait";
        $candidate_data = select_can($conn);
        $response = array_merge($response, $candidate_data);
    } elseif ($current_time >= $time_start && $current_time <= $time_end) {
        $response['status'] = "working";
        $candidate_data = select_can($conn);
        $response = array_merge($response, $candidate_data);
    } else {
        $response['status'] = "end";
        $candidate_data = select_can($conn);
        $response = array_merge($response, $candidate_data);
    }
} else {
    $response['status'] = "end";
    $candidate_data = select_can($conn);
    $response = array_merge($response, $candidate_data);
}

// ส่งผลลัพธ์กลับ
echo json_encode($response);
?>


