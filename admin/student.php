<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อนักเรียน</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="vote-bg" style="overflow: hidden;">

    <?php
        
        $page = 'รายชื่อนักเรียน';
        include_once 'side_bar.php';
    ?>

    <div class="scroll"  style="max-height: 88svh !important; padding-top: 1.6rem;">
        <div class="container pb-5 mb-5 " >
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="system/manage_std.php" method="post" enctype="multipart/form-data"> 
                        <label>เพิ่มนักเรียน (นามสกุลไฟล์ .xls หรือ .xlsx เท่านั้น)</label>
                        <div class="mb-3 d-flex gap-3">
                            <div class="form-control ">
                                <input type="file" accept=".xls,.xlsx" class="form-control" placeholder="" name="std" required>
                            </div>
                            <button type="submit" name="submit" class="btn-submit " style="width: fit-content">เพิ่ม</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- <div class="row justify-content-center border ">

                
    
            </div> -->

            <table class="table table-striped table-hover table-bordered text-center shadow">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อนักศึกษา</th>
                        <th scope="col">รหัสนักศึกษา</th>
                        <th scope="col">รหัสประจำตัว</th>
                        <th scope="col">การลงคะแนน</th>
                        <th scope="col">ประเภท</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    <?php
                        $select = mysqli_query($conn, "SELECT * FROM `student` ");
                        $i=0;
                        while($row = mysqli_fetch_array($select)){
                            $i++;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row['std_name'] ?></td>
                            <td><?php echo $row['std_code'] ?></td>
                            <td><?php echo $row['id_card'] ?></td>
                            <td><?php echo ($row['vote'] == 0 ? '<span class="text-danger">ยังไม่ได้ลงคะแนน</span>' : '<span class="text-success">เบอร์:'.$row['vote'].'</span>' ) ?></td>
                            <td><?php echo ($row['status'] == 0 ? 'นักเรียน' : '<span class="text-primary">ผู้ลงสมัคร</span>') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>

</body>
</html>