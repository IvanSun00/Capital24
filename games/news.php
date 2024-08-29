<?php include "include_php.php" ?>

<?php
date_default_timezone_set("Asia/Jakarta");
$news1 = $data["news_1"];
$news2 = $data["news_2"];
$news3 = $data["news_3"];
$news4 = $data["news_4"];
$news5 = $data["news_5"];

//cari selisih dari waktu phase_end dengan waktu saat ini 
$sql = "SELECT * from game_phase limit 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();

$phase = $data['phase'];
$end_time = strtotime($data['phase_end']);
$now_time = time();
$diff_minutes = 45 - round(($end_time - $now_time) / 60, 2);

// Keterangan: Aku ga ngecek phase e, Penpos harus ngatur cuma bisa beli news di phase tersebut ga bisa di phase setelah e
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPITAL 2024 | SIMULATION ROUND</title>

    <link rel="stylesheet" href="../assets/css/main.css">
    <?php include "../assets/link/link.html"; ?>

    <style>
        .section {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 20px;
            color: white;
        }

        @media screen and (max-width: 768px) {
            body {
                overflow-y: hidden;
            }

            .section {
                height: 90vh;
            }
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #161e33;
            padding: 20px;
            border-radius: 20px;
            max-width: 70%;
        }

        .news {
            overflow-y: scroll;
            height: 300px;
            scrollbar-width: thin;
            scrollbar-color: white transparent;
        }

        .news::-webkit-scrollbar-button {
            display: none !important;
            background-color: red !important;
        }

        .locked-news {
            max-width: 70%;
            text-align: left;
            cursor: pointer;
        }

        .news-img {
            width: 300px;
            height: 180px;
            border-radius: 7px;
        }

        .news-img2 {
            width: 30%;
            border-radius: 7px;
            object-fit: cover;
        }

        .flex-col .locked-news {
            max-width: 80%;
            text-align: left;
        }

        .news-month {
            color: lightgray;
        }

        .bg-birutua {
            color: white;
            background-color: #161e33;
        }

        @media (max-width: 767px) {
            .news {
                overflow-y: scroll;
                height: 350px;
            }

            .content {
                max-width: 90%;
            }

            .locked-news {
                text-align: center;
                max-width: 80%;
            }

            .flex-col .locked-news {
                text-align: center;
                max-width: 80%;
            }

            .modal .news-img {
                width: 100%;
            }

            .modal-dialog {
                max-height: calc(100vh - 225px);
            }
        }

        @media (max-width: 500px) {
            .news-img {
                width: 250px;
            }

            .news-img2 {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <?php include "include.php" ?>
    <div class="section">
        <div class="content">
            <h1 class="header1 text-shadow mb-0 border-secondary pb-2 border-bottom w-100">News Update</h1>
            <div class="news justify-content-center">
                <!-- NEWS PHASE 1 -->
                <?php include "news1.php" ?>
                <?php include "news2.php" ?>
                <?php include "news3.php" ?>
                <?php include "news4.php" ?>
                <?php include "news5.php" ?>


            </div>
        </div>
    </div>


</body>

</html>