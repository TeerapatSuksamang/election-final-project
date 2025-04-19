<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="vote-bg" style="overflow: hidden;">

    <?php
         
        $page = 'กำหนดเวลาโหวต';
        include_once 'side_bar.php';
        $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_id` = '".$_SESSION['admin_id']."' ");
        $row = mysqli_fetch_array($select);
    ?>

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 " style="border: 1px solid red1;">
                <form action="system/manage_candidate.php" method="post" class="shadow px-3 py-4" style="border-radius: 8px;">
                    <label for="date">วันที่เปิดโหวต</label>
                    <input type="date" class="form-control mb-3" id="date" name="date" value="<?php echo $row['date'] ?>">

                    <div class="d-flex gap-1 mb-4">
                        <span class="w-100">
                            <label for="start">เวลาเริ่มต้น</label>
                            <input type="time" class="form-control" id="start" name="time_start" value="<?php echo $row['time_start'] ?>">
                        </span>
                        <span class="w-100">
                            <label for="end">เวลาสิ้นสุด</label>
                            <input type="time" class="form-control" id="end" name="time_end" value="<?php echo $row['time_end'] ?>">
                        </span>
                    </div>

                    <button type="submit" class="btn-submit text-center" name="time_set">บันทึก</button>
                </form> 
            </div>
        </div>
    </div>
    

</body>
</html>