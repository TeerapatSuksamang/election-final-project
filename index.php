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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="home-bg" >
    <?php
        include_once 'db.php';
        $select = mysqli_query($conn, "SELECT * FROM `admin` ORDER BY `admin_id` ASC LIMIT 1  ");
        $row = mysqli_fetch_array($select);
    ?>

    <div class="container p-4 pt-2" style="height: 100svh !important; min-height: 100svh !important; max-height: 100svh !important;">
        <div class="candidate-content" >
            <div>
                <!-- <a href="" class="button px-4" disabled>ยังไม่เปิดให้ลงคะแนน</a> -->
                <a href="vote.php" class="button px-4 " id="vote_btn_status" disabled>กำลังโหลด...</a>
                <a href="profile.php" class="button"><i class="fa-regular fa-user"></i></a>
            </div>
            <!-- <p class="mt-1 text-light text-center m-0" style="font-size: .8rem;">อันดับที่ 1 ปัจจุบัน เบอร์ 9 คะแนน 256</p> -->
            <p class="mt-1 text-light text-center m-0" style="font-size: .8rem;" id="vote_info">
                <!-- จะเปิดให้ลงคะแนน <span class="date">วันที่ </span><br> 
                เวลา <span class="time_start"></span> ถึง <span class="time_end"></span> -->
                <!-- <div id="status">กำลังโหลด...</div> -->
            </p>

            <div class="candidate" >
                <div class="number">
                    <!-- <h1>เบอร์ </h1>
                    <h1>เบอร์ </h1>
                    <h1>เบอร์ </h1> -->
                </div>
                <div class="img-box" style="margin: 0 !important;">
                    <img src="" alt="" id="candidate-img">
                    <!-- <img src="img/pmint.png" alt=""> -->
                    <!-- <img src="img/pfiew.png" alt=""> -->
                    <!-- <img src="img/pfresh.png" alt=""> -->
                    <!-- <img src="img/fam.png" alt=""> -->
                    <div id="candidate-name"></div>
                    <div class="description">
                        <h5 class="text-light text-center" id="candidate-slogan">กำลังโหลด..</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay"></div>
    
    <div class="score-details text-white" id="scoreDetails">
        <div class="handle p-3" >
            <h4>ลำดับคะแนน <span class="float-end arrow"><i class="fa-solid fa-chevron-up"></i></span></h4>
        </div>
        
        <div class="scroll">
            <ul class="list-group " id="candidate-list">

                
                
            </ul>
        </div>
    </div>

    <script src="function.js"></script>
    
</body>
</html>