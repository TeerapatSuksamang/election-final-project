<?php include_once 'session.php'; ?>
<div class="sticky-top" style="border-bottom: 4px solid #A0BFDC;">
    <div class="container py-3 vote-head">
        <div class="" style="display: flex; align-items: center;">
            <span class="text-center w-100"><h2 class="d-inline"><?php echo $page ?></h2></span>
            
            <a class="text-dark" style="transform: translateX(-10px);" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars btn-icon"></i>
            </a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start vote-bg" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title w-100" id="offcanvasExampleLabel">Admin
            <a class="float-end nav-link" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></a>
        </h5>
    </div>
    <hr class="m-0">
    <div class="offcanvas-body">
        <ul class="list-group">
            <li class="list-group-item <?php echo ($page == 'ผลโหวตปัจจุบัน' ? 'active' : '') ?>">
                <a href="index.php" class="nav-link">
                    <i class="fa-solid fa-square-poll-horizontal me-1"></i>
                    ผลโหวตปัจจุบัน
                </a>
            </li>
            <li class="list-group-item <?php echo ($page == 'กำหนดเวลาโหวต' ? 'active' : '') ?>">
                <a href="time_set.php" class="nav-link">
                    <i class="fa-regular fa-calendar-days me-1"></i>
                    กำหนดเวลาโหวต
                </a>
            </li>
            <li class="list-group-item <?php echo ($page == 'รายชื่อผู้ลงสมัคร' ? 'active' : '') ?>">
                <a href="candidate.php" class="nav-link">
                    <i class="fa-solid fa-user-tie me-1"></i>
                    รายชื่อผู้ลงสมัคร
                </a>
            </li>
            <li class="list-group-item <?php echo ($page == 'รายชื่อนักเรียน' ? 'active' : '') ?>">
                <a href="student.php" class="nav-link">
                <i class="fa-solid fa-graduation-cap"></i>
                    รายชื่อนักเรียน
                </a>
            </li>
            <hr>
            <li class="list-group-item">
                <a href="change_password.php" class="nav-link">
                    <i class="fa-solid fa-key"></i>
                    เปลี่ยนรหัสผ่าน
                </a>
            </li>
        </ul>
    </div>
    <!-- <p class="text-center"></p> -->
    <hr>
    <div class="offcanvas-header">
        <a href="system/logout.php" class="nav-link w-100 text-center">
            ออกจากระบบ
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>
</div>