<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CAPITAL 2024 | Petra Christian University</title>
    <meta name="description" content="CAPITAL 2024 merupakan lomba berbentuk rally games kepada siswa-siswi SMA/SMK sederajat yang bertemakan “Embarking on Eco-Venture”. Acara ini diselenggarakan oleh Badan Eksekutif Mahasiswa (BEM) Petra Christian University." />

    <!-- CSS -->
    <?php include "../../assets/link/link.html"; ?>
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/home/landing.css" rel="stylesheet">
    <link href="../../assets/css/home/about.css" rel="stylesheet">
    <link href="../../assets/css/home/timeline.css" rel="stylesheet">
    <link href="../../assets/css/home/guide.css" rel="stylesheet">
    <link href="../../assets/css/home/faq.css" rel="stylesheet">
    <link href="../../assets/css/home/contact.css" rel="stylesheet">
    <link href="../../assets/css/loader.css" rel="stylesheet">
    <script src="../../assets/js/gsap.js" defer></script>
    <script src="../../assets/js/loader.js" defer></script>

</head>

<body>
    <?php include "../navbar.php"; ?>

    <div class="loader-container">
        <div class="loader">
            <svg version="1.1" id="loading_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72px" height="90px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                </rect>
            </svg>
        </div>
    </div>

    <section class="landing" id="landing">
        <div class="judul-capital">
            <!-- <h1 class="header gs_reveal gs_reveal_fromRight">CAPITAL</h1>
            <h2 class="headers gs_reveal gs_reveal_fromLeft">2024</h2> -->
            <img src="../../assets/img/logo_capital_tulisan.png" alt="" class="img-capital gs_reveal" id="judul-capital">
            <img src="../../assets/img/2024.png" alt="" class="img-2024 gs_reveal" id="judul-2024">
        </div>


    </section>

    <section class="moni">
        <a href="#faq"><img src="../../assets/img/moni_faq.png" alt="" class="moni-faq"></a>
    </section>

    <section class="aboutUs" id="aboutUs">
        <div class="box-about">
            <div class="left gs_reveal gs_reveal_fromBottomFar">
                <img src="../../assets/img/wudi_moni.png" alt="" class="wudii-about">
            </div>
            <div class="right">
                <h1 class="header1 text-shadow gs_reveal gs_reveal_fromBottomFar">About Us</h1>
                <p class="text1 text-shadow gs_reveal gs_reveal_fromBottomFar" style="text-align: justify; margin-top: 2vh">Career Shaping in Entrepreneurial (CAPITAL) 2024 merupakan lomba berbentuk rally games kepada siswa-siswi SMA/SMK sederajat yang bertemakan <i>“Embarking on Eco-Venture”</i>. Acara ini diselenggarakan oleh Badan Eksekutif Mahasiswa (BEM) Petra Christian University.
                    Kami ingin agar siswa-siswi SMA memiliki pola pikir bisnis tidak hanya fokus kepada keuntungan perusahaan, melainkan juga memberikan kontribusi positif aktif terhadap pelestarian dan pemulihan ekosistem.</p>
            </div>
        </div>
    </section>

    <section class="timeline" id="timeline">
        <div style="text-align: center; padding: 2vh;">
            <h3 class="header1 text-shadow mb-4 gs_reveal" id="judul-timeline">Timeline</h3>
        </div>

        <div class="timeline-container gs_reveal" id="timeline-container">
            <div class="timeline-line">
                <span class="timeline-innerline"></span>
            </div>
            <ul>
                <li>
                    <span class="timeline-point"></span>
                    <span class="date text1 text-shadow">7/2/2024</span>
                    <p class="text1 text-shadow">Registration</p>
                </li>
                <li>
                    <span class="timeline-point"></span>
                    <span class="date text1 text-shadow">4/3/2024</span>
                    <p class="text1 text-shadow">Technical Meeting</p>
                </li>
                <li>
                    <span class="timeline-point"></span>
                    <span class="date text1 text-shadow">9/3/2024</span>
                    <p class="text1 text-shadow">Simulation Round</p>
                </li>
                <li>
                    <span class="timeline-point"></span>
                    <span class="date text1 text-shadow">15/3/2024</span>
                    <p class="text1 text-shadow">Seminar & Awarding</p>
                </li>
            </ul>
        </div>
    </section>

    <section class="guide" id="guide">
        <div class="box-about" style="text-align: center; padding: 1vh; margin: 2vh auto;">
            <h3 class="header1 text-shadow gs_reveal gs_reveal_fromTop">Guide</h3>
        </div>

        <div class="box-guide">
            <div class="left">
                <h1 class="header2 text-shadow gs_reveal" id="judul-prize">Prize Pool</h1>
                <div class="subbox-guide">
                    <div class="left gs_reveal gs_reveal_fromBottomFar">
                        <img src="../../assets/img/WUDII.png" alt="" class="img-prize">
                    </div>
                    <div class="right">
                        <div class="box-prize gs_reveal gs_reveal_fromBottomFar">
                            <h1 class="header3 text-shadow">1st Winner Prize</h1>
                            <p class="text1 text-shadow">Rp4.000.000 + certificate</p>
                        </div>
                        <div class="box-prize gs_reveal gs_reveal_fromBottomFar">
                            <h1 class="header3 text-shadow">2nd Winner Prize</h1>
                            <p class="text1 text-shadow">Rp2.000.000 + certificate</p>
                        </div>
                        <div class="box-prize gs_reveal gs_reveal_fromBottomFar">
                            <h1 class="header3 text-shadow">3rd Winner Prize</h1>
                            <p class="text1 text-shadow">Rp1.000.000 + certificate</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <h1 class="header2 text-shadow gs_reveal" id="judul-modul">Module</h1>
                <div class="img-module-container">
                    <div class="module gs_reveal gs_reveal_fromBottomFar">
                        <a href="https://drive.google.com/drive/folders/1fEsg_eN9BknlnsZpJLSesNLpWgofRJiZ" target="_blank">
                            <img src="../../assets/img/cover_guidebook.png" alt="" class="img-module" id="module1">
                        </a>
                    </div>
                    <div class="module gs_reveal gs_reveal_fromBottomFar">
                        <a href="https://drive.google.com/drive/folders/1FL7hArrbhUj8Lpi5HOfMvCyDRpniCwKf" target="_blank">
                            <img src="../../assets/img/cover_peraturan.png" alt="" class="img-module" id="module2">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq" id="faq">
        <div class="box-about" style="text-align: center; padding: 1vh; margin: 2vh auto;">
            <h3 class="header1 text-shadow gs_reveal gs_reveal_fromBottomFar">F A Q</h3>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item gs_reveal gs_reveal_fromBottomFar">
                <h2 class="accordion-header" style="text-align: justify;">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="column-gap: 2px;">
                        Apa arti dari <i>green business?</i>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-4" style="text-align: justify;"><i>Green business</i> merupakan kegiatan bisnis dan praktik ekonomi yang bertujuan untuk meminimalkan dampak negatif terhadap lingkungan alam. <i>Green business</i> melakukan upaya aktif dalam menerapkan praktik-praktik berkelanjutan dan berwawasan lingkungan. Fokus utamanya adalah tidak hanya mematuhi peraturan lingkungan yang berlaku, melainkan juga memberikan kontribusi positif aktif terhadap pelestarian dan pemulihan ekosistem.</div>
                </div>
            </div>
            <div class="accordion-item gs_reveal gs_reveal_fromBottomFar">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="column-gap: 1vw;">
                        Apa saja ketentuan yang diperlukan untuk mengikuti lomba CAPITAL?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-4" style="text-align: justify;">Lomba ini dibuka untuk seluruh siswa-siswi SMA/SMK. Setiap tim beranggotakan 4 orang dan diperbolehkan dari angkatan yang berbeda, tetapi harus berasal dari instansi yang sama.</div>
                </div>
            </div>
            <div class="accordion-item gs_reveal gs_reveal_fromBottomFar">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="column-gap: 1vw;">
                        Apakah peserta perlu membayar biaya tambahan untuk mengikuti seminar selain biaya pendaftaran?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-4" style="text-align: justify;">Tidak, biaya pendaftaran adalah satu-satunya biaya yang diperlukan untuk mengikuti lomba dan seminar CAPITAL.</div>
                </div>
            </div>
            <div class="accordion-item gs_reveal gs_reveal_fromBottomFar">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" style="column-gap: 1vw;">
                        Setelah saya mengisi formulir pendaftaran, langkah apa selanjutnya yang perlu dilakukan?
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-4" style="text-align: justify;">Setelah mengisi formulir pendaftaran, panitia akan memeriksa data tim Anda. Jika data sudah lengkap, Anda akan menerima <i>e-mail</i> validasi maksimal H+3 sebagai konfirmasi resmi pendaftaran Anda di CAPITAL 2024.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="contactUs" id="contactUs">
        <div class="box-contact p-3">
            <h1 class="header2 text-shadow contact-text gs_reveal gs_reveal_fromBottom">Sponsored By:</h1>
            <div class="wrapper p-2 p-,d-4">
                <img src="https://capital.petra.ac.id/2024/assets/img/logo_sponsor.png" class="logo-sponsor gs_reveal gs_reveal_fromBottom" alt="">
            </div>
            <h1 class="header2 text-shadow contact-text gs_reveal gs_reveal_fromBottom mt-5">Contact Us</h1>
            <div class="wrapper p-4">
                <div class="button gs_reveal gs_reveal_fromBottom">
                    <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=651ujcmf" target="_blank" style="text-decoration: none; color: black;">
                        <div class="icon">
                            <i class="fab fa-line"></i>
                        </div>
                        <span>@651ujcmf</span>
                    </a>
                </div>

                <div class="button gs_reveal gs_reveal_fromBottom">
                    <a href="https://wa.me/6281336536388" target="_blank" style="text-decoration: none; color: black;">

                        <div class="icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <span>+62 813 3653 6388</span>
                    </a>
                </div>

                <div class="button gs_reveal gs_reveal_fromBottom">
                    <a href="https://mail.google.com/mail/?view=cm&source=mailto&to=capital.cbi@petra.ac.id" target="_blank" style="text-decoration: none; color: black;">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <span>capital.cbi@petra.ac.id</span>

                    </a>
                </div>

            </div>
            <h1 class="header2 text-shadow contact-text mt-4 gs_reveal gs_reveal_fromBottom">Connect With Us</h1>
            <div class="wrapper wrapper2 p-4">

                <div class="button gs_reveal gs_reveal_fromBottom">
                    <a href="https://www.instagram.com/capital.petra?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" style="text-decoration: none; color: black;">
                        <div class="icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <span>@capital.petra</span>
                    </a>
                </div>

                <div class="button gs_reveal gs_reveal_fromBottom">
                    <a href="https://www.tiktok.com/@capital.petra?is_from_webapp=1&sender_device=pc" target="_blank" style="text-decoration: none; color: black;">
                        <div class="icon">
                            <i class="fab fa-tiktok"></i>
                        </div>
                        <span>@capital.petra</span>
                    </a>
                </div>
            </div>
        </div>
        <p class="text1 text-shadow text-center" style="color: rgba(255,255,255,0.8); margin-top: 10vh;">&copy;IT Capital 2024</p>
    </section>
</body>

<script>
    $(document).ready(function() {
        $(".sign-in-btn").click(function() {
            $.ajax({
                url: 'cek.php',
                type: 'GET',
                success: function(response) {
                    if (response === 'closed') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Pendaftaran sudah ditutup!'
                        })
                    } else {
                        window.location.href = 'cek.php';
                    }
                }
            });
        });
    });
</script>

</html>