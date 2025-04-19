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
        
        $page = 'รายชื่อผู้ลงสมัคร';
        include_once 'side_bar.php';
    ?>

    <div class="scroll"  style="max-height: 88svh !important; padding-top: 1.6rem;">
        <div class="container pb-5 mb-5 " >
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="add_candidate.php" method="get">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" name="std_code">
                            <label for="std_code">เพิ่มผู้ลงสมัคร (กรอกรหัสนักศึกษา)</label>
                            <button type="submit" class="eye-icon p-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row justify-content-center border ">

                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `candidate` ");
                    while($row = mysqli_fetch_array($select)){
                ?>
                    <div class="col-lg-5 col-md-6 col-12 mt-5 ">
                        <div class="candidate-box">
                            <span class="vote-number"><?php echo $row['number'] ?></span>
                            <div class="candidate-img">
                                <img src="../upload/<?php echo $row['std_img'] ?>" alt="">
                            </div>
                            <div class="candidate-detail">
                                <p class="can-num">เบอร์ <?php echo $row['number'] ?></p>
                                <p class="can-name">
                                    <?php echo $row['std_name'] ?><br>
                                    <?php echo $row['std_code'] ?><br>
                                </p>
                                <p class="can-slogan"><?php echo $row['slogan'] ?></p>
                                <a href="edit_candidate.php?std_code=<?php echo $row['std_code'] ?>" class="button px-3 py-1 mt-2">แก้ไข <i class="fa-solid fa-user-pen"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
    
            </div>


        </div>
    </div>

</body>
</html>