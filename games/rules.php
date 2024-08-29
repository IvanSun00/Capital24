<?php include "include_php.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules</title>
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
            width: 100%;
            max-width: 800px;
            height: 500px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .header {
            width: 100%;
            max-width: 400px;
            display: flex;
            justify-content: center;
            background-color: floralwhite;
            align-items: center;
            border-radius: 30px;
            position: relative;
        }

        .rules-wrap {
            margin-top: 20px;
            display: flex;
            background-color: #161e33;
            width: 950px;
            justify-content: center;
            align-items: center;
            width: 100%;
            border-radius: 20px;
        }

        .rules {
            color: white;
            margin-top: 20px;
            height: 400px;
            width: 100%;
            max-width: 800px;
            border-radius: 20px;
            margin-right: 20px;
            padding-right: 12px;
        }

        .rules h1 {
            margin-left: 15px;
        }

        .rules h3 {
            margin-left: 30px;
            margin-right: 30px;
        }

        .rules-content {
            overflow-y: scroll;
            max-height: 340px;
            height: auto;
        }

        .rules-content::-webkit-scrollbar {
            width: 12px;
            border-radius: 30px;
        }


        .rules-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 30px;
        }


        .rules-content::-webkit-scrollbar-thumb {
            background: #f2dca7;
            border-radius: 30px;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }


        .rules-content::-webkit-scrollbar-thumb:hover {
            background: #e8bf1a;
        }

        @media (max-width: 800px) {
            .wrapper {
                width: 90%;
            }

            .header {
                max-width: 90%;

            }

            .rules {
                max-width: 90%;
                width: 400px;
            }

            .rules-content {
                max-height: 300px;
            }

            .rules-wrap {
                width: 100%;
                padding: 0 10px;
            }
        }
    </style>
</head>

<body>
    <?php include "include.php" ?>
    <div class="container">
        <div class="wrapper">
            <div class="header">
                <div class="header-content">
                    <h1 class="m-0">RULES</h1>
                </div>
            </div>
            <div class="rules-wrap p-1 p-md-2 p-xl-4">
                <div class="rules">
                    <h1><b>Peraturan Simulation Round</b></h1>
                    <div class="rules-content">
                        <br>
                        <h3>
                            <b>Pasal 1: Perlengkapan dan Kelayakan Peserta</b>
                        </h3>
                        <h3>
                            1.1 Setiap peserta wajib menggunakan perlengkapan dan atribut seragam yang lengkap (ATK diwajibkan untuk dibawa setiap peserta)
                        </h3>
                        <h3>
                            1.2 Peserta harus memiliki dan membawa kartu identitas siswa sekolah menengah atas (SMA) yang valid
                        </h3>
                        <h3>
                            1.3 Peserta harus menjaga kebersihan dan ketertiban di lingkungan kuliah selama acara berlangsung dan bertanggung jawab atas segala kerusakan yang disebabkan oleh tindakan mereka.
                        </h3>
                        <br>

                        <h3>
                            <b>Pasal 2: Etika dan Sikap Peserta</b>
                        </h3>
                        <h3>
                            2.1 Peserta harus menjunjung tinggi nilai sportivitas dan menghormati peserta lain, pengunjung, serta fasilitas di lingkungan kuliah.
                        </h3>
                        <h3>
                            2.2 Tidak diperbolehkan menggunakan bahasa kasar, mengganggu ketertiban umum, atau melakukan tindakan yang dapat membahayakan diri sendiri atau orang lain.
                        </h3>
                        <h3>
                            2.3 Peserta yang terlibat dalam tindakan kekerasan, intimidasi, atau perilaku tidak pantas lainnya akan didiskualifikasi secara langsung dari acara.
                        </h3>
                        <br>

                        <h3>
                            <b>Pasal 3: Tata Cara Peserta</b>
                        </h3>
                        <h3>
                            3.1 Peserta harus mengikuti petunjuk dan arahan dari panitia dengan baik selama seluruh acara berlangsung.
                        </h3>
                        <h3>
                            3.2 Peserta harus mematuhi rambu-rambu dan tanda-tanda pengaturan lainnya yang telah ditentukan oleh panitia untuk menjaga keselamatan selama permainan berlangsung.
                        </h3>
                        <h3>
                            3.3 Peserta yang melanggar aturan-aturan yang tercantum dalam pasal ini akan dikenakan sanksi sesuai dengan kebijakan panitia acara, termasuk namun tidak terbatas pada diskualifikasi atau larangan berpartisipasi dalam acara di masa mendatang.
                        </h3>
                        <br>

                        <h3>
                            <b>Pasal 4: Larangan Penggunaan Barang Berbahaya</b>
                        </h3>
                        <h3>
                            4.1 Peserta dilarang membawa maupun menggunakan barang-barang berbahaya seperti senjata tajam, senjata api, atau bahan peledak selama acara berlangsung.
                        </h3>
                        <h3>
                            4.2 Peserta yang melanggar larangan ini akan langsung didiskualifikasi dan dapat dilaporkan kepada pihak berwajib sesuai dengan hukum yang berlaku.
                        </h3>
                        <br>

                        <h3>
                            <b>Pasal 5: Sanksi Terhadap Peserta</b>
                        </h3>
                        <h3>
                            5.1 Peserta akan diberikan hukuman maksimal h+3 setelah rally games jika terdapat melakukan kecurangan selama rally games berlangsung
                        </h3>
                        <h3>
                            5.2 Ayat 5.1 tidak akan berlaku terhadap peserta yang melakukan tindakan atau mengatakan kalimat yang mengandung SARA dan akan didiskualifikasi ditempat
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>