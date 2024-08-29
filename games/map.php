<?php include "include_php.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../assets/link/link.html"; ?>
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Map</title>
    <style>
        * {
            margin-top: 0;
            margin-bottom: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            width: 800px;
            background-color: #161e33;
            border-radius: 30px;
            margin-bottom: 50px;
            height: 500px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-content {
            display: flex;
            width: 600px;
            background-color: floralwhite;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
        }

        .content {
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
            height: 400px;
            scrollbar-width: thin;
            scrollbar-color: white transparent;
        }

        .map-picture {
            width: 100%;
            height: 300px;
            object-fit: contain;
        }

        @media screen and (max-width: 768px) {
            .wrapper {
                width: 90%;
                border-radius: 15px;
                margin-top: 100px;
                height: 400px;
            }

            .content {
            height: 300px;
        }

            .map-picture {
                height: 200px;
            }

            .header-content {
                width: 90%;
            }

            body {
                overflow-y: hidden;
            }

            .container {
                height: 90vh;
            }
        }
    </style>
</head>

<body>
    <?php include "include.php" ?>
    <div class="container mb-5 mb-md-0">
        <div class="wrapper p-3 p-xl-4 mb-5 mb-md-0">
            <div class="header m-2 m-md-3">
                <div class="header-content">
                    <h1 class="m-0">MAP</h1>
                </div>
            </div>

            <div class="content m-2 m-md-0 m-xl-3 pb-2">
                <img class="map-picture" src="../assets/img/Denah FIX.png">
                <h3 class="text-white mt-3 mt-md-4 text-center">Durasi Pos</h3>
                <div class="d-flex justify-content-center gap-md-5 flex-column flex-md-row mt-2 mt-md-0 text-center">
                    <div>
                        <h4 class="text-white mt-md-2">Pos 1 (Recycle): 13 menit</h4>
                        <h4 class="text-white mt-md-2">Pos 2 (Repair): 13 menit</h4>
                        <h4 class="text-white mt-md-2">Pos 3 (Campaign): 15 menit</h4>
                        <h4 class="text-white mt-md-2">Pos 4 (Reduce): 12 menit</h4>
                    </div>
                    <div>
                        <h4 class="text-white mt-md-2">Pos 5 (Investment): 15 menit</h4>
                        <h4 class="text-white mt-md-2">Pos 6 (Program): 12 menit</h4>
                        <h4 class="text-white mt-md-2">Pos 7 (Management): 12 menit</h4>
                        <h4 class="text-white mt-md-2">Pos 8 (Innovation): 10 menit</h4>
                    </div>
                </div>
            </div>

        </div>
</body>

</html>