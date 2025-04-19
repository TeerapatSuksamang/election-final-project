<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงคะแนน</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="vote-bg" style="overflow: hidden;">
    <div class="sticky-top" style="border-bottom: 4px solid #A0BFDC;">
        <div class="container py-3 vote-head">
            <div class="" style="display: flex; align-items: center;">
                <a href="index.php" class="text-dark position-absolute ms-1">
                    <i class="fa-solid fa-arrow-left btn-icon"></i>
                </a>
                <span class="text-center w-100"><h2 class="d-inline">ลงคะแนนเสียง</h2></span>
            </div>
        </div>
    </div>

    <div class="scroll"  style="max-height: 88svh !important; padding-top: 1.6rem;">

        <div class="container pb-5 mb-5 " >
            <div class="row justify-content-centerr ">
    
            <?php
                include_once 'db.php';
                $select = mysqli_query($conn, "SELECT * FROM `candidate` ");
                while($row = mysqli_fetch_array($select)){
            ?>
                <div class="col-lg-3 col-md-3 col-6 mt-5 ">
                    <a href="" class="vote-box " data-bs-toggle="modal" data-bs-target="#<?php echo $row['number'] ?>">
                        <span class="vote-number"><?php echo $row['number'] ?></span>
                        <div class="vote-img">
                            <img src="upload/<?php echo $row['std_img'] ?>" alt="">
                        </div>
                        <div class="vote-name">
                            <?php echo $row['std_name'] ?>
                        </div>
                    </a>
                </div>

                <div class="modal fade" id="<?php echo $row['number'] ?>">
                    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                        <div class="modal-content">
                            <div class="vote-box ">
                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                <span class="vote-number"><?php echo $row['number'] ?></span>
                                <div class="vote-img">
                                    <img src="upload/<?php echo $row['std_img'] ?>" alt="">
                                </div>
                                <div class="vote-name px-2">
                                    <h4 class="m-0"><?php echo $row['std_name'] ?></h4>
                                    <?php echo $row['slogan'] ?>
                                    <br>
                                    <a href="system/vote_db.php?vote_number=<?php echo $row['number'] ?>" class="button">โหวตเบอร์ <?php echo $row['number'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
    
    
            <div class="col-lg-3 col-md-3 col-6 mt-5 ">
                <a href="#" class="vote-box " data-bs-toggle="modal" data-bs-target="#dont_vote">
                    <!-- <span class="vote-number"><i class="fa-solid fa-user-xmark"></i></span> -->
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="fa-solid fa-user-slash" style="font-size: 4rem;"></i>
                    </div>
                    <div class="vote-name">
                        ไม่ประสงค์ลงคะแนน 
                    </div>
                </a>
            </div>
    
            </div>
        </div>
    </div>

    

    <div class="modal fade" id="dont_vote">
        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
            <div class="modal-content">

                <div class="vote-box " data-bs-toggle="modal" data-bs-target="#dont_vote">
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="fa-solid fa-user-slash" style="font-size: 8rem;"></i>
                    </div>
                    <div class="vote-name">
                        <a href="system/vote_db.php?vote_number=-1" class="button mb-2">ไม่ประสงค์ลงคะแนน</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>