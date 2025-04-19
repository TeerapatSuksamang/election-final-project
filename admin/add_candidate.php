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

    <div class="sticky-top" style="border-bottom: 4px solid #A0BFDC;">
        <div class="container py-3 vote-head">
            <div class="" style="display: flex; align-items: center;">
                <a href="candidate.php" class="text-dark position-absolute ms-1">
                    <i class="fa-solid fa-arrow-left btn-icon"></i>
                </a>
                <span class="text-center w-100"><h2 class="d-inline">เพิ่มผู้ลงสมัคร</h2></span>
            </div>
        </div>
    </div>


    <div class="scroll"  style="max-height: 88svh !important; padding-top: 1.6rem;">
        <?php
            include_once 'session.php';
            if(!isset($_GET['std_code'])){
                back();
            }
            $std_code = $_GET['std_code'];
            $select = mysqli_query($conn, "SELECT * FROM `student` WHERE `std_code` = '$std_code' ");
            $row = mysqli_fetch_array($select);
            if($select -> num_rows == 0){
                echo "<h1 class='text-center blockquote-footer'>ไม่พบนักศึกษา</h1>";
            } else if($row['status'] == 1){
                echo "<h1 class='text-center blockquote-footer'>ไม่สามารถเพิ่มผู้ลงสมัครซ้ำได้</h1>";
            } else {
        ?>

            <div class="container mb-5" >
                <div class="row justify-content-center">
                    <form action="system/manage_candidate.php" class="col-md-5 " method="post" enctype="multipart/form-data">
                        <h5 class="text-center">
                            ชื่อนักศึกษา: <?php echo $row['std_name'] ?><br>
                            รหัสนักศึกษา: <?php echo $row['std_code'] ?>
                        </h5>
                        <input type="hidden" name="std_code" value="<?php echo $std_code ?>">
                        <input type="hidden" name="std_name" value="<?php echo $row['std_name'] ?>">
                        <center>
                            <div style="width: 10rem; height: 12rem; ">
                                <img src="" class="h-100" id="preview" alt="เพิ่มรูปภาพ">
                            </div>
                            <input type="file" name="img" id="img_upload" class="form-control btn btn-outline-primary my-3" required>
                            <!-- <label for="img_upload" class="btn btn-outline-primary my-3">เพิ่มรูปภาพ <i class="fa-solid fa-file-import"></i></label> -->
                        </center>
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" placeholder="" name="number" required>
                            <label for="std_code">เบอร์</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" name="slogan" required>
                            <label for="std_code">คำขวัญ/คำอธิบาย</label>
                        </div>
                        <input type="submit" class="btn-submit text-center w-100" name="add_can" value="เพิ่ม">
                    </form>        
                </div>
            </div>

        <?php } ?>

    </div>
    

    <script>
        img_upload.onchange = function(e){
            const file = e.target.files[0];
            if(file){
                preview.src = URL.createObjectURL(file); 
                // สร้าง URL ชั่วคราวจากไฟล์ที่ถูกเลือก แล้วมากำหนดที่ src ของ <img id="preview"> (มั้ง)
            }
        }
    </script>


</body>
</html>
