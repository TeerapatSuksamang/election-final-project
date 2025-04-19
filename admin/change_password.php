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
<body class="login-bg" style="overflow: hidden;">
    <img src="../img/logo.png" alt="" class="login-bg-img">
    <div class="overlay-1"></div>

    <div class="sticky-top text-light" >
        <div class="container py-3 ">
            <div class="" style="display: flex; align-items: center;">
                <a onclick="window.history.back();" type="button" class="text-dark position-absolute ms-1">
                    <i class="fa-solid fa-arrow-left btn-icon text-light"></i>
                </a>
                <span class="text-center w-100"><h2 class="d-inline">เปลี่ยนรหัสผ่าน</h2></span>
            </div>
        </div>
    </div>

    <div class="container mt-5 p-5" >
        <div class="row justify-content-center">
            <form action="system/password.php" method="post" class="col-md-5 ">
                <div class="form-floating mb-4"> 
                    <input type="password" class="form-control" placeholder="" id="pass" name="old_pass" required>
                    <label for="std_code">รหัสผ่านเก่า</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" placeholder="" id="pass1" name="pass1" required>
                    <label for="std_code">รหัสผ่านใหม่</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="password" class="form-control" placeholder="" id="pass2" name="pass2" required>
                    <label for="std_code">ยืนยันรหัสผ่านใหม่</label>
                </div>
                <div class="mb-5 text-light">
                    <input type="checkbox" name="" class="form-check-input" id="show" onclick="showpass();">
                    <label for="show">แสดงรหัสผ่าน</label>
                </div>

                <input type="submit" class="btn-submit text-center w-100 py-3" name="submit" value="ยืนยัน">
            </form>        
        </div>
    </div>

    <script src="../function.js"></script>

</body>
</html>