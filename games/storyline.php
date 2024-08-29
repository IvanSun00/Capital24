<?php
include "include_php.php"
?>

<style>
    .storyline {
        display: flex;
        flex-direction: column;
        position: fixed;
        text-align: justify;
        padding: 30px 30px 0 30px;
        color: white;
        background: #161e33;
        width: 55%;
        border-radius: 30px;
        height: 470px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 13px 12px 20px rgba(0, 0, 0, 0.3);
    }

    .storyline::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: linear-gradient(to right, #2c3652, #161e33);
        z-index: -1;
        border-radius: 30px;
    }

    .title {
        background: #fffaf0;
        text-align: center;
        align-items: center;
        justify-content: center;
        margin: 0 5%;
        border-radius: 30px;
        color: black;
        margin-bottom: 20px;
    }

    .portfolio-table {
        height: 80%;
    }

    #carouselExampleIndicators.carousel.slide {
        max-height: 97%;
    }

    p {
        font-size: 18px;
        margin: 20px;
        max-height: 65%;
        overflow-y: auto;
        margin: 0 40px 20px 40px;
    }

    button.carousel-control-next {
        padding-left: 5%;
        position: fixed;
    }

    button.carousel-control-prev {
        padding-right: 5%;
        position: fixed;
    }

    h1,
    h2,
    h4 {
        text-align: center;
    }

    svg.w-6.h-6.text-gray-800.dark\:text-white {
        width: 25%;
        margin-left: 37.5%;
        margin-top: 1.25%
    }

    .shake-once {
        animation: shake 2s;
        /* animation-iteration-count: 1; */
    }

    @keyframes shake {
        0% {
            transform: translate(1px, 1px) rotate(0deg);
        }

        10% {
            transform: translate(-1px, -2px) rotate(-1deg);
        }

        20% {
            transform: translate(-3px, 0px) rotate(1deg);
        }

        30% {
            transform: translate(3px, 2px) rotate(0deg);
        }

        40% {
            transform: translate(1px, -1px) rotate(1deg);
        }

        50% {
            transform: translate(-1px, 2px) rotate(-1deg);
        }

        60% {
            transform: translate(-3px, 1px) rotate(0deg);
        }

        70% {
            transform: translate(3px, 1px) rotate(-1deg);
        }

        80% {
            transform: translate(-1px, -1px) rotate(1deg);
        }

        90% {
            transform: translate(1px, 2px) rotate(0deg);
        }

        100% {
            transform: translate(1px, -2px) rotate(-1deg);
        }
    }

    .carousel-item {
        width: 40%;
        max-height: 100%;
        overflow-y: auto;
    }

    .carousel-item.active {
        height: 100%;
    }

    .carousel-control-prev-icon {
        right: 20%;
    }

    .judul-story {
        font-family: font-utama;
    }

    @media only screen and (max-width: 1024px) {
        .storyline {
            width: 70%;
            height: 425px;
        }

        #carouselExampleIndicators.carousel.slide {
            max-height: 102%;
        }

        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 30%;
            margin-left: 35.5%;
            margin-top: 0;
        }
    }

    @media only screen and (max-width: 900px) {
        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 35%;
            margin-left: 32.5%;
            margin-top: 0;
        }
    }

    @media only screen and (max-width: 650px) {
        .storyline {
            padding: 25px 30px 5px 30px;
        }

        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 50%;
            margin-left: 25%;
            margin-top: 0;
        }

        p {
            max-height: 70%;
            margin: 0 15px;
            font-size: 16px;
            padding-top: 0;
        }

    }

    @media only screen and (max-width: 500px) {
        .storyline {
            height: 420px;
            padding: 20px 20px 5px 20px;
        }

        p {
            max-height: 70%;
            margin: 0 15px;
            font-size: 15px;
            padding-top: 0;
        }

        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 55%;
            margin-left: 22.5%;
            margin-top: 2%;
        }

        #carouselExampleIndicators.carousel.slide {
            max-height: 105%;
        }
    }

    @media only screen and (max-width: 360px) {
        .storyline {
            height: 350px;
            width: 80%;
            padding: 25px 20px 0px 20px;
        }

        p {
            max-height: 65%;
            margin: 0 15px;
            font-size: 12px;
        }

        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 50%;
            margin-left: 25%;
            margin-top: 0;
        }

        #carouselExampleIndicators.carousel.slide {
            max-height: 102%;
        }

        button.carousel-control-next {
            padding-left: 0;
        }

        button.carousel-control-prev {
            padding-right: 0;
        }
    }

    @media only screen and (max-width: 280px) {
        .storyline {
            height: 300px;
        }

        p {
            max-height: 62%;
            font-size: 11px;
        }

        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 55%;
            margin-left: 22.5%;
            margin-top: 0;
        }

        h2 {
            padding-bottom: 0;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STORYLINE | CAPITAL 2024</title>

    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php include "../assets/link/link.html" ?>
</head>

<body>
    <?php include "include.php";
    $query = "SELECT * FROM game_phase";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="storyline">
        <div class="title">
            <h1 class="m-0 judul-story">STORYLINE</h1>
        </div>
        <div class="portfolio-table">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php if ($data['phase'] >= 1) : ?>
                            <h2>PHASE 1 (Sampah rusak ekosistem laut)</h2>
                            <p>
                                Realita saat ini, perusahaan merupakan kontributor sampah plastik terbesar di dunia. Menurut penelitian terbaru dari indeks The Plastic Waste Makers, seratus perusahaan menyumbangkan 90% sampah plastik dunia. Di saat masyarakat berjanji untuk mengurangi penggunaan plastik sekali pakai, perusahaan plastik justru memperluas operasinya. Semakin banyaknya produksi dan penggunaan plastik menjadi pendorong signifikan terhadap krisis iklim. Jika terus menerus seperti ini, diperkirakan pada tahun 2050 produksi plastik dapat menyumbang lima hingga sepuluh persen emisi gas rumah kaca. Tak hanya dari emisi karbon, sampah plastik tersebut kemudian menumpuk di tempat pembuangan sampah, di jalanan, dan di sungai yang membawa sejumlah besar sampah ke laut. Terdapat 14 juta ton plastik yang berakhir di laut setiap tahunnya. Polusi plastik di laut memiliki dampak ekonomi dan sosial yang besar. Hal ini terjadi karena, polusi plastik dapat mengurangi peluang ekonomi bagi industri seperti pariwisata, perikanan, serta masyarakat yang hidup bergantung pada laut untuk mencari mata pencaharian. Tidak hanya itu, polusi plastik dapat berpengaruh bagi kesehatan manusia. Pasalnya, kontaminasi mikroplastik dapat menyebabkan inflamasi pada organ ikan. Jika ikan yang terkontaminasi dikonsumsi oleh manusia, maka hal tersebut dapat menyebabkan masalah kesehatan.
                            </p>
                        <?php else : ?>
                            <h2>PHASE 1</h2>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white shake-once" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1v-7c0-.6.4-1 1-1Z" />
                            </svg>
                            <h4>Locked</h4>
                        <?php endif; ?>
                    </div>
                    <div class="carousel-item">
                        <?php if ($data['phase'] >= 2) : ?>
                            <h2>PHASE 2 (Banjir Rob)</h2>
                            <p>
                                Beberapa kota di Indonesia terancam tenggelam beberapa tahun yang akan datang akibat
                                banjir rob. Banjir rob merupakan jenis banjir yang disebabkan oleh naiknya air laut hingga menuju ke daratan sekitarnya. Salah satu penyebabnya adalah subsiden (penurunan permukaan tanah) yang disebabkan oleh pengambilan air tanah yang berlebihan dan pembangunan gedung-gedung bertingkat yang berlebihan. Selain penurunannya permukaan air tanah, naiknya permukaan air laut juga dapat meningkatkan risiko banjir rob. Menurut laporan terbaru dari CDP, 100 perusahaan energi bertanggung jawab atas 71 persen penyumbang emisi karbon penyebab terjadinya perubahan iklim. Perubahan iklim dapat menyebabkan suhu global meningkat dan mengakibatkan es di kutub mencair. Cairnya es di kutub mengakibatkan permukaan air laut mengalami kenaikan. Fenomena-fenomena tersebut menyebabkan beberapa kota yang ada di Indonesia saat ini harus hidup berdampingan dengan banjir.
                            </p>
                        <?php else : ?>
                            <h2>PHASE 2</h2>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white shake-once" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1v-7c0-.6.4-1 1-1Z" />
                            </svg>
                            <h4>Locked</h4>
                        <?php endif; ?>
                    </div>
                    <div class="carousel-item">
                        <?php if ($data['phase'] >= 3) : ?>
                            <h2>PHASE 3 (Pencemaran sungai)</h2>
                            <p>
                                Dua hari berturut-turut, pada bulan Februari 2020, Kementerian Lingkungan Hidup dan Kehutanan memenangkan gugatan perdata dalam kasus pencemaran lingkungan. Hal ini disebabkan terjadinya pencemaran pada salah satu sungai yang ada di Indonesia akibat limbah perusahaan tekstil. Limbah yang dibuang oleh perusahaan tersebut berupa, limbah padat seperti serat tekstil sisa, kain bekas, sampah kertas, dan limbah non-biologis lainnya. Selain limbah yang dihasilkan langsung dari proses produksi, perusahaan tekstil juga menggunakan dan membuang produk kimia berbahaya seperti bahan pengencang, pembersih, zat pemutih, atau bahan kimia lainnya. Kondisi dari sungai tersebut terus bertambah buruk, padahal peran dari sungai tersebut sangatlah penting, karena menjadi sumber 80% kebutuhan air minum penduduk. Sungai ini juga menjadi penyedia air bagi 420.000 hektar persawahan, yang membuat lahan irigasi menjadi lumbung pangan warga sejak zaman dahulu. Tidak hanya warga yang terdampak akan hal ini, sungai yang tercemar juga menjadi sumber penyakit bagi para pekerja perusahaan yang berada di sekitar sungai.</p>
                        <?php else : ?>
                            <h2>PHASE 3</h2>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white shake-once" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1v-7c0-.6.4-1 1-1Z" />
                            </svg>
                            <h4>Locked</h4>
                        <?php endif; ?>
                    </div>
                    <div class="carousel-item">
                        <?php if ($data['phase'] >= 4) : ?>
                            <h2>PHASE 4 (Ekosistem kendaraan listrik)</h2>
                            <p>
                                Setiap hari, ratusan kendaraan berlalu lalang menghasilkan polusi suara dan udara. Dari kendaraan itu pula, berton-ton emisi gas rumah kaca (GRK) dilepaskan dan memenuhi langit Indonesia. Data Kementerian Lingkungan Hidup dan Kehutanan (LHK) 2021 mencatat, kendaraan bermotor berkontribusi sebesar 70 persen terhadap pencemaran di wilayah perkotaan. Selain itu, kendaraan bermotor juga menyumbang sekitar 60 persen dari total polusi udara yang ada di seluruh negeri. Jumlah tersebut merupakan yang terbesar jika dibandingkan sektor lainnya. Polusi udara yang terus meningkat berakibat buruk bagi lingkungan dan kesehatan masyarakat. Pemerintah mengajukan pembangunan ekosistem kendaraan listrik untuk menjadi salah satu solusi untuk mengatasi permasalahan yang ada. Kendaraan ini dinilai dapat menghasilkan polusi udara lebih sedikit jika dibandingkan kendaraan berbahan bakar minyak. Akan tetapi, faktanya kendaraan listrik bukanlah solusi yang tepat karena, sumber untuk menghasilkan listrik tidak ramah lingkungan. </p>
                        <?php else : ?>
                            <h2>PHASE 4</h2>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white shake-once" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1v-7c0-.6.4-1 1-1Z" />
                            </svg>
                            <h4>Locked</h4>
                        <?php endif; ?>
                    </div>
                    <div class="carousel-item">
                        <?php if ($data['phase'] >= 5) : ?>
                            <h2>PHASE 5 (Tambang batu bara merusak alam)</h2>
                            <p>
                                Pada tahun 2022 Peneliti Aksi Ekologi dan Emansipasi Rakyat atau yang biasa dikenal dengan perkumpulan (AEER) Indonesia melakukan studi terhadap perusahaan-perusahaan tambang yang paling besar di Kalimantan dan yang paling beresiko tinggi. Pertambangan batu bara merupakan salah satu usaha yang memiliki keuntungan yang besar bagi seorang entrepreneur. Akan tetapi, pengambilan, pengolahan, dan penggunaan batu bara dapat merusak lingkungan dan menimbulkan masalah. Pasalnya, produksi batu bara dilakukan dengan membabat hutan dan menggali tambang. Prosesnya pun mencemari air, tanah, dan udara yang ada di Indonesia. Saat ini, terdapat beberapa kasus pencemaran tanah akibat tambang batu bara di Indonesia. Sebagai contoh, PT Berau Coal di Kalimantan Timur merupakan salah satu perusahaan yang telah menyebabkan pencemaran air dan tanah di sekitar lokasi tambang. Hal ini terjadi karena proses pertambangan yang melibatkan penggunaan bahan kimia berbahaya seperti merkuri, sianida, dan logam berat lainnya tidak dikelola dengan baik sehingga, mencemari air dan tanah di sekitar tambang.</p>
                            <h4>Locked</h4>
                        <?php else : ?>
                            <h2>PHASE 5</h2>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white shake-once" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1v-7c0-.6.4-1 1-1Z" />
                            </svg>
                            <h4>Locked</h4>
                        <?php endif; ?>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

</body>

</html>