const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("id_card");

if(togglePassword != null){
    togglePassword.addEventListener("click", function () {
        // Toggle the type of the input field
        const type = passwordInput.type === "password" ? "text" : "password";
        passwordInput.type = type;

        // Toggle the icon
        this.innerHTML = type === "password"
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';
    });
}

function showpass() {
    document.querySelectorAll('#pass, #pass1, #pass2').forEach(pass => pass.type = pass.type === 'password' ? 'text' : 'password');
}

// slider toggle 
const scoreDetails = document.getElementById("scoreDetails");
const overlay = document.getElementById("overlay");
const handle = document.querySelector(".handle");
const arrow = document.querySelector(".arrow");
let isOpen = false;

// เมื่อกดแถบ Handle
handle.addEventListener("click", () => {
    toggleScoreDetails();
});

// เมื่อกดพื้นที่ด้านนอก (Overlay)
overlay.addEventListener("click", () => {
    if (isOpen) {
        toggleScoreDetails();
    }
});

// ฟังก์ชันเปิด/ปิดแถบ
function toggleScoreDetails() {
    if (isOpen) {
        scoreDetails.style.bottom = "-52vh"; // ซ่อนแถบ
        overlay.classList.remove("active"); // ซ่อน overlay ด้วยคลาส
        arrow.innerHTML = "<i class='fa-solid fa-chevron-up'></i>"; // แสดงลูกศรขึ้น
    } else {
        scoreDetails.style.bottom = "0"; // แสดงแถบ
        overlay.classList.add("active"); // แสดง overlay ด้วยคลาส
        arrow.innerHTML = "<i class='fa-solid fa-chevron-down'></i>"; // แสดงลูกศรลง
    }
    isOpen = !isOpen;
}


// --------------------------- Time function ---------------------------

// function checkTimeStatus() {
//     $.ajax({
//         url: 'check_time.php',  // URL ของ PHP script
//         method: 'GET',
//         success: function(response) {
//             $('#status').text(response); // อัปเดตข้อความใน div
//         }
//     });
// }

// // เรียกใช้ฟังก์ชัน `checkTimeStatus` ทุกๆ 1000 มิลลิวินาที (1 วินาที)
// setInterval(checkTimeStatus, 1000);
let intervalId;
let candidates = []; // เก็บข้อมูลผู้สมัคร
let currentIndex = 0; // เก็บ index ของผู้สมัครปัจจุบัน
let isAnimating = false; // ป้องกันการเรียก showCandidate() ซ้อนกัน
let isWaiting = false; // เช็คว่าสถานะเป็น wait หรือไม่

function updateTime() {
    $.ajax({
        url: "check_time.php",
        method: "GET",
        dataType: "json",
        success: function(response) {
            if (response.status === 'wait') {
                $("#vote_info").html(`
                    จะเปิดให้ลงคะแนน วันที่ ${response.date} </br>
                    เวลา: ${response.time_start} ถึง ${response.time_end}
                `);
                
                $("#vote_btn_status").attr("disabled", true).text("ยังไม่เปิดให้ลงคะแนน");

                if (!isWaiting) {
                    isWaiting = true; // ตั้งค่าให้รู้ว่าอยู่ในโหมด wait
                    candidates = response.candidates || [];
                    currentIndex = 0;
                    if (candidates.length > 0) showCandidate();
                }

            } else {
                isWaiting = false; // ออกจากโหมด wait ทำให้ showCandidate() หยุด

                if (response.status === 'working') {
                    $("#vote_btn_status").attr("disabled", false).text("ลงคะแนนเลย !");
                    
                    $("#vote_info").html(`
                        อันดับที่ 1 ปัจจุบัน เบอร์ ${response.candidate.number} คะแนน ${response.candidate.point}
                    `);

                    $(".number").html(`
                        <h1>เบอร์ ${response.candidate.number}</h1>
                        <h1>เบอร์ ${response.candidate.number}</h1>
                        <h1>เบอร์ ${response.candidate.number}</h1>
                    `);

                    $("#candidate-img").attr("src", "upload/" + response.candidate.std_img);
                    $("#candidate-slogan").text(response.candidate.slogan);
                    let name = response.candidate.std_name.replace(/^(นาย|นางสาว)\s*/, '');
                    $("#candidate-name").text(name);

                    let candidatesList = response.candidates.map(candidate => `
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="d-flex gap-1 align-items-center">
                                <span class="candidate-profile">
                                    <img src="upload/${candidate.std_img}" alt="${candidate.std_name}" class="img">
                                </span> 
                                ${candidate.std_name}
                            </span>
                            <span class="d-flex align-items-center">${candidate.point} คะแนน</span>
                        </li>
                    `).join('');
                    
                    $("#candidate-list").html(candidatesList);

                } else if (response.status === 'end') {
                    $("#vote_btn_status").attr("disabled", true).text("สิ้นสุดการลงคะแนน");
                    
                    $("#vote_info").html(`
                        <span>ขอแสดงความยินดี</span></br>
                        อันดับที่ 1 เบอร์ ${response.candidate.number} คะแนน ${response.candidate.point}
                    `);

                    $(".number").html(`
                        <h1>เบอร์ ${response.candidate.number}</h1>
                        <h1>เบอร์ ${response.candidate.number}</h1>
                        <h1>เบอร์ ${response.candidate.number}</h1>
                    `);

                    $("#candidate-img").attr("src", "upload/" + response.candidate.std_img);
                    $("#candidate-slogan").text(response.candidate.slogan);
                    let name = response.candidate.std_name.replace(/^(นาย|นางสาว)\s*/, '');
                    $("#candidate-name").text(name);

                    let candidatesList = response.candidates.map(candidate => `
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="d-flex gap-1 align-items-center">
                                <span class="candidate-profile">
                                    <img src="upload/${candidate.std_img}" alt="${candidate.std_name}" class="img">
                                </span> 
                                ${candidate.std_name}
                            </span>
                            <span class="d-flex align-items-center">${candidate.point} คะแนน</span>
                        </li>
                    `).join('');
                    
                    $("#candidate-list").html(candidatesList);
                    clearInterval(intervalId);
                }
            }
        },
        error: function(xhr, status, error) {
            console.error("ไม่สามารถดึงข้อมูลเวลาได้: " + error);
        }
    });
}

function showCandidate() {
    if (!isWaiting || candidates.length === 0 || isAnimating) return;
    isAnimating = true;

    let candidate = candidates[currentIndex];

    // ใส่ข้อมูลใหม่
    $(".number").html(`
        <h1 class="number-animate">เบอร์ ${candidate.number}</h1>
        <h1 class="number-animate">เบอร์ ${candidate.number}</h1>
        <h1 class="number-animate">เบอร์ ${candidate.number}</h1>`
    ).addClass("animate-text");
    $("#candidate-img").attr("src", "upload/" + candidate.std_img).addClass("animate-img");
    $("#candidate-name").text(candidate.std_name.replace(/^(นาย|นางสาว)\s*/, '')).addClass("animate-text");
    $("#candidate-slogan").text(candidate.slogan);

    // ตั้งเวลาให้หายไปหลัง 3 วินาที
    setTimeout(() => {
        $(".number-animate, #candidate-img, #candidate-name").addClass("fade-out");

        setTimeout(() => {
            // ลบคลาสอนิเมชั่นก่อนเปลี่ยนข้อมูล
            $("#candidate-name").removeClass("animate-img animate-text fade-out");
            $(".number-animate").removeClass("animate-img animate-text fade-out");
            $("#candidate-img").removeClass("animate-img animate-text fade-out");

            currentIndex = (currentIndex + 1) % candidates.length;
            isAnimating = false;

            if (isWaiting) setTimeout(showCandidate);
        }, 500);
    }, 3000);
}



// อยากให้เล่นอนิเมชั่นแบบ 
// ค่อยๆแสดงแล้วเลื่อนตัวเลขขึ้นก่อน
// ถัดมาค่อยๆแสดงรูปภาพจากใหญ่มาเล็ก พร้อมค่อยๆแสดงชื่อ
// ทั้งหมดนี้จะค่อยๆหายไปพร้อมกัน แล้วกลับมาเล่นอนิเมชั่นใหม่โดยเปลี่ยนข้อมูลอันถัดไป

// เรียกฟังก์ชัน updateTime ทุก ๆ 1 วินาที
intervalId = setInterval(updateTime, 1000);
updateTime();
