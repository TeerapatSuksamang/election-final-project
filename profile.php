<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body class="login-bg">
    <?php
        include_once 'std_session.php';
        $select = mysqli_query($conn, "SELECT * FROM `student` WHERE `std_id` = '".$_SESSION['std_id']."' ");
        $row = mysqli_fetch_array($select);
    ?>

    <img src="img/logo.png" alt="" class="login-bg-img">
    <div class="overlay-2"></div>

    <a href="index.php" class="position-absolute ms-4 mt-4 text-light">
        <i class="fa-solid fa-arrow-left btn-icon"></i>
    </a>
    <div class="container pt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6 pt-5">
                <div class="text-center text-light"> 
                    <h1>ข้อมูลนักศึกษา</h1>
                </div>

                <center>
                    <form action="" class="form-login w-75">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" id="std_code" value="<?php echo $row['std_name'] ?>" readonly>
                            <label for="std_code">ชื่อนักศึกษา</label>
                        </div>

                        <!-- <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" id="std_code" value="ปวช 3" readonly>
                            <label for="std_code">ระดับชั้น</label>
                        </div> -->

                        <div class="form-floating mb-5">
                            <input type="text"  class="form-control" placeholder="" id="id_card" value="<?php echo $row['std_code'] ?>" readonly>
                            <label for="std_code">รหัสนักศึกษา</label>
                        </div>
                        
                        <a href="logout.php" class="btn-logout">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        
                    </form>
                </center>
            </div>
        </div>
    </div>
    
</body>
</html>