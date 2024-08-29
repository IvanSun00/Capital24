<?php include "include_php.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips</title>
    <?php include "../assets/link/link.html"; ?>
    <link rel="stylesheet" href="../assets/css/main.css">

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        @media screen and (max-width: 768px) {
            body {
                overflow-y: hidden;
            }

            .container {
                height: 90vh;
            }
        }

        .wrapper {
            margin-top: 100px;
            width: 800px;
            background-color: #161e33;
            border-radius: 30px;

        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-content {
            display: flex;
            width: 600px;
            height: 40px;
            background-color: floralwhite;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
            margin-top: 20px
        }

        .content {
            display: flex;
            font-size: 30px;
            margin-left: 110px;
            margin-right: 110px;
            color: white;
            justify-content: center;
            align-items: center;
            overflow-wrap: break-word;
        }

        @media screen and (max-width: 768px) {
            .wrapper {
                width: 90%;
                border-radius: 15px;
                margin-top: 0;
            }

            .header-content {
                width: 90%;
                font-size: 20px;
            }

            .content {
                margin: 10px;
            }

            h3 {
                font-size: 18px;
            }
        }

        @media screen and (max-width: 768px) {
            h3 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <?php include "include.php" ?>
    <div class="container">
        <div class="wrapper p-2 p-md-4">
            <div class="header p-1">
                <div class="header-content">
                    <h1 class="m-0">TIPS</h1>
                </div>
            </div>

            <div class="content mt-3">
                <h3>
                    <ol>
                        <li>Perhatikan Storyline sebelum memilih pos permainan</li>

                        <li>Memperhatikan durasi permainan pada setiap pos</li>

                        <li>Mengatur strategi sebelum mengambil tindakan</li>

                        <li>Memperhatikan pergerakan saham</li>

                        <li>Memperhatikan materi pada permainan untuk membantu dalam Tes Akhir</li>
                    </ol>
                </h3>

            </div>

        </div>
</body>

</html>