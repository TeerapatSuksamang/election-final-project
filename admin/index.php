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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* *{
            border: .5px solid red;
        } */
    </style>
</head>
<body class="vote-bg" style="overflow: hidden;">

    <?php
        
        $page = 'ผลโหวตปัจจุบัน';
        include_once 'side_bar.php';
    ?>


    <div class="scroll" style="max-height: 88svh !important; padding-top: 1.6rem;">
        <div class="container" id="vote-results">
            <!-- ผลลัพธ์การโหวตจะถูกเพิ่มที่นี่ -->
        </div>
    </div>


    <script>
        function fetchVoteResults() {
            $.ajax({
                url: "fetch_vote_results.php",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    const resultsContainer = $("#vote-results");
                    resultsContainer.empty();

                    let totalVotes = 0;
                    response.forEach(candidate => {
                        totalVotes += candidate.point;
                    });

                    response.forEach(candidate => {
                        const percentage = totalVotes > 0 ? ((candidate.point / totalVotes) * 100).toFixed(1) : 0;

                        const candidateHTML = `
                            <div class="vote-result">
                                <span class="vote-point" style="width: ${percentage}%;"></span>
                                <span>
                                    <span class="candidate-profile">
                                        <img src="../upload/${candidate.img}" class="img" >
                                    </span>
                                    <span class="ms-2">${candidate.name}</span>
                                </span>
                                <span class="me-2">${candidate.point} คะแนน</span>
                            </div>
                        `;

                        resultsContainer.append(candidateHTML);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("เกิดข้อผิดพลาดในการดึงข้อมูล: ", error);
                }
            });
        }

        // เรียกใช้ฟังก์ชันทุก 5 วินาที
        setInterval(fetchVoteResults, 1000);
        fetchVoteResults(); // เรียกครั้งแรกทันที


    </script>

</body>
</html>