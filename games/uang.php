<?php include "include_php.php" ?>


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
            letter-spacing: 0.2vw;
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
            margin-top: 50px;
        }

        .news {
            height: auto;
            width: 600px;
        }

        .bg-birutua {
            color: white;
            background-color: #161e33;
        }

        .modal {
            overflow: hidden;
        }

        .modal-body {
            height: 400px;
        }

        .scrollbar {
            height: 300px;
            overflow-y: auto;
            margin: 25px 0;
        }

        .force-overflow {
            min-height: 300px;
        }

        #wrapper {
            text-align: center;
            width: 500px;
            margin: auto;
        }

        #style-1::-webkit-scrollbar {
            width: 12px;
        }

        #style-1::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 30px;
        }

        #style-1::-webkit-scrollbar-thumb {
            background: #f2dca7;
            border-radius: 30px;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        #style-1::-webkit-scrollbar-thumb:hover {
            background: #e8bf1a;
        }

        .text-cont {
            height: 80px;
        }

        @media (max-width: 1024px) {
            .news {
                width: 50vw;
            }
        }

        @media (max-width: 767px) {
            .news {
                width: 90vw;
            }

            .content {
                max-width: 90%;
                margin-top: 30px;
            }

            .modal-dialog {
                max-height: calc(100vh - 225px);
            }
        }

        @media (max-width: 350px) {
            h3 {
                font-size: 0.9rem;
            }

            .fa-sack-dollar {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>
    <?php include "include.php" ?>
    <div class="section">
        <div class="content">
            <div class="news p-4">
                <div class="p-1 d-flex flex-row justify-content-center align-items-center" style="gap: 5vw; background-color: floralwhite; border-radius: 30px;">
                    <i class="fa-solid fa-sack-dollar fa-2xl" style="color: #c88546;"></i>
                    <h3 class="mt-2" style="font-weight: 700;"><?php echo $uang ?></h3>
                </div>
                <a href="" data-bs-toggle="modal" data-bs-target="#modal" style="text-decoration: none; color: black;">
                    <div class="p-1 mt-5 d-flex flex-row justify-content-center align-items-center" style="cursor: pointer; position: relative; background-color: floralwhite; border-radius: 30px;">
                        <h3 class="mt-2" style="font-weight: 700;">Riwayat Transaksi</h3>
                        <h3 class="mt-2" style="font-weight: 700; position: absolute; right: 30px;">></h3>
                    </div>
                </a>

                <div class="p-1 mt-5 d-flex flex-row justify-content-center align-items-center" style="gap: 5vw; background-color: floralwhite; border-radius: 30px;">
                    <h3 class="mt-2" style="font-weight: 700;">Peminjaman</h3>
                    <?php
                    $pinjaman = number_format($data['sisa_pinjaman'], 0, '.', '.');
                    ?>
                    <h3 class="mt-2" style="font-weight: 700;"><?php echo $pinjaman ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered my-4 mx-md-auto">
            <div class="modal-content bg-birutua p-4" style="border-radius: 20px;">
                <div class="modal-body">
                    <a href="" data-bs-dismiss="modal" aria-label="Close" style="text-decoration: none; color: black;">
                        <div class="p-1 mt-2 d-flex flex-row justify-content-center align-items-center" style="cursor: pointer; position: relative; background-color: floralwhite; border-radius: 30px;">
                            <h3 class="mt-2" style="font-weight: 700; position: absolute; left: 30px;">
                                < </h3>
                                    <h3 class="mt-2" style="font-weight: 700;">Riwayat Transaksi</h3>
                        </div>
                    </a>

                    <?php
                    $sql = "SELECT * FROM `game_transaksi` WHERE id_kelompok = $id_kelompok ORDER BY `timestamp` ASC";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $count = $stmt->rowCount();

                    if ($count == 0) {
                        echo '<h3 class = "mt-4">Kelompok Anda belum mempunyai riwayat transaksi.</h3>';
                    } else {
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                        <div class="row">
                            <div class="col-6 col-lg-5">
                                <div class="wrapper">
                                    <div class="scrollbar" id="style-1">
                                        <div class="force-overflow">
                                            <?php
                                            foreach ($data as $row) {
                                                echo '<div class="text-cont">';
                                                echo '<h3 class="my-2">' . $row["timestamp"] . '</h3>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mx-lg-4">
                                <div class="wrapper">
                                    <div class="scrollbar" id="style-2">
                                        <div class="force-overflow">
                                            <?php
                                            foreach ($data as $row) {
                                                echo '<div class="text-cont">';
                                                echo '<h3 class="my-2">' . $row["tujuan_transaksi"];
                                                if ($row["jenis_mutasi"] == "IN") {
                                                    echo ' + ';
                                                } else {
                                                    echo ' - ';
                                                }
                                                echo number_format($row['nominal'], 0, '.', '.');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <script>
        var part1 = document.getElementById('style-1');
        var part2 = document.getElementById('style-2');

        part1.addEventListener('scroll', function() {
            part2.scrollTop = part1.scrollTop;
        });

        part2.addEventListener('scroll', function() {
            part1.scrollTop = part2.scrollTop;
        });
    </script>

</body>

</html>