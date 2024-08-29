<!-- NEWS PHASE 3 -->
<?php if ($news3 == 0) : ?>
    <div class="d-md-flex flexcol mx-md-5 justify-content-center py-md-5 py-3 border-light border-bottom">
        <div class="flex-col ms-md-5">
            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288" stroke="#FFFFFF" stroke-width="0.744" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <h5 class="mt-md-3 mt-2">Phase 3</h5>
        </div>
        <h5 class="locked-news mx-auto ms-md-5  mt-4 mt-md-0">News belum dapat terbuka, Harap membayar Rp. 20.000 pada News Station untuk melihat berita yang dapat membantu dalam perjalanan di simulation round hari ini</p>
    </div>
<?php else : ?>
    <h1 class="text-md-start text-center ms-md-5 mt-3 mt-md-4">General</h1>
    <div class="d-md-flex flexcol mx-md-5 py-3 pt-md-2 border-light">
        <img class="news-img" src="https://images.theconversation.com/files/446963/original/file-20220217-23-18zl8uv.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1356&h=668&fit=crop" alt="">
        <div class="flex-col">
            <h5 class="news-phase text-center text-md-start ms-md-5 mt-3 mt-md-0">Phase 3 (Awal)</h5>
            <!-- <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">July 2024</h6> -->
            <h5 class="locked-news ms-md-5 mx-auto "><a class="text-white" data-bs-toggle="modal" data-bs-target="#modal31">Sungai Citarum Simpan Rahasia Kotor Industri Tekstil</a></p>
        </div>
    </div>
    <div class="d-md-flex flexcol mx-md-5 py-3 pb-md-5 border-light border-bottom">
        <img class="news-img" src="https://waste4change.com/blog/wp-content/uploads/image-378.png" alt="">
        <div class="flex-col">
            <h5 class="news-phase text-center text-md-start ms-md-5 mt-3 mt-md-0">Phase 3 (Awal)</h5>
            <!-- <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">July 2024</h6> -->
            <h5 class="locked-news ms-md-5 mx-auto "><a class="text-white" data-bs-toggle="modal" data-bs-target="#modal32">Dampak “Abadi” Fast Fashion terhadap Lautan</a></p>
        </div>
    </div>

    <?php if (($phase == 3 && $diff_minutes < 15)) : ?>
        <div class="d-md-flex flexcol mx-md-5 justify-content-center py-md-5 py-3 border-light border-bottom">
            <div class="flex-col ms-md-5">
                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288" stroke="#FFFFFF" stroke-width="0.744" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <h5 class="mt-md-3 mt-2">Phase 3-2</h5>
            </div>
            <h5 class="locked-news mx-auto ms-md-5 mt-4 mt-md-0">News belum dapat terbuka, Harap tunggu hingga menit ke-15 untuk melihat berita yang dapat membantu dalam perjalanan di simulation round hari ini</p>
        </div>
    <?php else : ?>
        <div class="d-md-flex flexcol mx-md-5 py-3 py-md-5 border-light border-bottom">
            <img class="news-img" src="https://images-ext-2.discordapp.net/external/O_YgvV6y-nmFKNdFwBOcFTr9cFTc9eQOFkw0_YPn998/https/pakar.co.id/storage/2020/01/Cara-Membuat-Laporan-Keuangan-2.jpg?format=webp&width=906&height=573" alt="">
            <div class="flex-col">
                <h5 class="news-phase text-center text-md-start ms-md-5 mt-3 mt-md-0">Phase 3 (Menit 15)</h5>
                <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                <h5 class="locked-news ms-md-5 mx-auto "><a class="text-white" data-bs-toggle="modal" data-bs-target="#modal33">Laporan Keuangan</a></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if (($phase == 3 && $diff_minutes < 30)) : ?>
        <div class="d-md-flex flexcol mx-md-5 justify-content-center py-md-5 py-3 border-light border-bottom">
            <div class="flex-col ms-md-5">
                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288" stroke="#FFFFFF" stroke-width="0.744" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <h5 class="mt-md-3 mt-2">Phase 3-3</h5>
            </div>
            <h5 class="locked-news mx-auto ms-md-5 mt-4 mt-md-0">News belum dapat terbuka, Harap tunggu hingga menit ke-30 untuk melihat berita yang dapat membantu dalam perjalanan di simulation round hari ini</p>
        </div>
    <?php else : ?>
        <h1 class="text-md-start text-center ms-md-5 mt-3 mt-md-4">Performa Saham</h1>
        <div class="d-md-flex flexcol mx-md-5 py-3 py-md-2 border-light">
            <img class="news-img" src="https://foto.kontan.co.id/0Z2WvAOAOsRw-WtKrx21Ilp2Qs0=/640x360/smart/2017/01/23/670865593p.jpg" alt="">
            <div class="flex-col">
                <h5 class="news-phase text-center text-md-start ms-md-5 mt-3 mt-md-0">Phase 3 (Menit 30)</h5>
                <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                <h5 class="locked-news ms-md-5 mx-auto "><a class="text-white" data-bs-toggle="modal" data-bs-target="#modal34">Gelar TEXNOVA, Forever Sparkle Textile Lahirkan 6 Inovator Tekstil Ramah Lingkungan</a></p>
            </div>
        </div>
        <div class="d-md-flex flexcol mx-md-5 py-3 pb-md-5 border-light border-bottom">
            <img class="news-img" src="https://awsimages.detik.net.id/community/media/visual/2021/10/05/ilustrasi-sampah-plastik_169.jpeg?w=600&q=90" alt="">
            <div class="flex-col">
                <h5 class="news-phase text-center text-md-start ms-md-5 mt-3 mt-md-0">Phase 3 (Menit 30)</h5>
                <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                <h5 class="locked-news ms-md-5 mx-auto "><a class="text-white" data-bs-toggle="modal" data-bs-target="#modal35">Perusahaan Tekstil dan Garmen Ini Gunakan Bahan yang Lebih Ramah Lingkungan</a></p>
            </div>
        </div>
        <div class="d-md-flex flexcol mx-md-5 py-3 py-md-5 border-light border-bottom">
            <img class="news-img" src="https://foto.kontan.co.id/PE4karpGB2nBTjbLe56PsUQw0QE=/640x360/smart/2021/05/06/975772842p.jpg" alt="">
            <div class="flex-col">
                <h5 class="news-phase text-center text-md-start ms-md-5 mt-3 mt-md-0">Phase 3 (Menit 30)</h5>
                <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                <h5 class="locked-news ms-md-5 mx-auto "><a class="text-white" data-bs-toggle="modal" data-bs-target="#modal36">Strategi Multisradi Hadapi Kenaikan Bahan Baku</a></p>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="modal fade" id="modal31" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered mx-4 mx-md-auto">
        <div class="modal-content bg-birutua">
            <div class="modal-header">
                <h5 class="modal-title">NEWS UPDATE</h5>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-md-flex flexcol justify-content-center" style="overflow-y: scroll;  height: 50svh;">
                    <img class="news-img2" src="https://images.theconversation.com/files/446963/original/file-20220217-23-18zl8uv.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1356&h=668&fit=crop" alt="">
                    <div class="">
                        <h5 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">Phase 3</h5>
                        <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                        <p class="text-md-start ms-md-5 mt-3 mt-md-0 " style="text-align: justify;">Menurut film dokumenter “Deadly Water”, Citarum, yang terletak di Jawa Barat, Indonesia, adalah sungai paling tercemar di dunia. Sungai ini membentang sepanjang 300 kilometer dan menyediakan pasokan air penting bagi mata pencaharian masyarakat setempat. Namun, di sepanjang dasar sungai, terdapat 2000 fasilitas industri, sebagian besar merupakan industri tekstil. Fasilitas-fasilitas ini membuang 280 ton racun ke sungai setiap hari, sementara air yang sama digunakan untuk mengairi 4000 sawah dan menyediakan air minum bagi 25 juta orang. Akibatnya, hasil panen padi menurun dan masyarakat menjadi sakit dan mengalami masalah kulit akibat air. Aktivis lingkungan hidup menemukan bahwa industri tekstil menggunakan apa yang disebut ‘saluran pembuangan hantu’, yang diduga merupakan saluran ilegal untuk membuang air limbah ke sungai. Pencemaran sungai menyebar selebar 100 meter ke daratan dan kedalaman 60 meter, mengandung bakteri E. coli, logam berat, dan sampah organik. Konsentrasi timbal tiga kali lebih tinggi dari batas maksimum yang diperbolehkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal32" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered mx-4 mx-md-auto">
        <div class="modal-content bg-birutua">
            <div class="modal-header">
                <h5 class="modal-title">NEWS UPDATE</h5>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-md-flex flexcol justify-content-center" style="overflow-y: scroll;  height: 50svh;">
                    <img class="news-img2" src="https://waste4change.com/blog/wp-content/uploads/image-378.png" alt="">
                    <div class="">
                        <h5 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">Phase 3</h5>
                        <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                        <p class="text-md-start ms-md-5 mt-3 mt-md-0 " style="text-align: justify;">Dampak bahan bakar fosil dan plastik sekali pakai terhadap lingkungan sudah banyak diketahui. Namun, bagaimana dengan dampak pakaian kita? Hampir dua pertiga (63,1%) mikroplastik yang dilepaskan ke laut berasal dari pencucian pakaian sintetis. Bahkan. serat alami pun mempunyai masalah; 1kg kapas membutuhkan 10-20.000 liter air untuk mengolahnya. Di sisi lain, kebanyakan pakaian terbuat dari serat sintetis, yaitu plastik berbahan dasar minyak. Setiap kali dicuci, mereka melepaskan serat plastik mikroskopis ke dalam air yang mengalir ke laut dan berkontribusi terhadap masalah mikroplastik di laut. Serat ini biasanya terbuat dari poliester, polietilen, akrilik, atau elastane. Kaitannya dengan fast fashion, semakin banyak produk fashion yang diproduksi, semakin besar pula dampak industri ini terhadap lingkungan. Fast Fashion adalah istilah yang digunakan oleh industri tekstil yang memiliki berbagai model fashion yang silih berganti dalam waktu yang sangat singkat, serta menggunakan bahan baku yang berkualitas buruk, sehingga tidak tahan lama. Industri fast fashion seringkali tidak memperhatikan dampak buruk terhadap lingkungan dan mengorbankan keselamatan para pekerjanya. Industri fast fashion biasanya menggunakan zat tekstil yang murah dan berbahaya, sehingga dapat menyebabkan pencemaran air dan beresiko terhadap kesehatan manusia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal33" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mx-4 mx-md-auto">
        <div class="modal-content bg-birutua">
            <div class="modal-header">
                <h5 class="modal-title">NEWS UPDATE</h5>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-md-flex flexcol justify-content-center" style="overflow-y: scroll;  height: 50svh;">
                    <div class="">
                        <table class="table table-striped table-bordered" style="background-color: transparent !important;">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Perusahaan</th>
                                    <th scope="col">Net Income</th>
                                    <th scope="col">EPS</th>
                                    <th scope="col">Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">INPC</th>
                                    <td>11 biliun</td>
                                    <td>0,71</td>
                                    <td>418,3 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">ISOL</th>
                                    <td>33 biliun</td>
                                    <td>5,16</td>
                                    <td>1.367,9 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">BRPO</th>
                                    <td>-127 biliun</td>
                                    <td>-1.43</td>
                                    <td>15.818,8 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">CNNI</th>
                                    <td>-80,5 biliun</td>
                                    <td>-96,61</td>
                                    <td>23,7 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">FSTI</th>
                                    <td>768,4 miliar </td>
                                    <td>0,38</td>
                                    <td>187,5 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">BBRX</th>
                                    <td>172,8 biliun</td>
                                    <td>26,58</td>
                                    <td>4.665,4 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">MAPA</th>
                                    <td>-34,4 biliun</td>
                                    <td>-3,74</td>
                                    <td>1.548,1 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">INIY</th>
                                    <td>-313,4 biliun</td>
                                    <td>-60,28</td>
                                    <td>16.145,7 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">DNSA</th>
                                    <td>321,2 biliun</td>
                                    <td>416,78</td>
                                    <td>11.035,6 biliun</td>
                                </tr>
                                <tr>
                                    <th scope="row">ITMW</th>
                                    <td>427,3 biliun</td>
                                    <td>388,49</td>
                                    <td>9.333,9 biliun</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal34" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered mx-4 mx-md-auto">
        <div class="modal-content bg-birutua">
            <div class="modal-header">
                <h5 class="modal-title">NEWS UPDATE</h5>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-md-flex flexcol justify-content-center" style="overflow-y: scroll;  height: 50svh;">
                    <img class="news-img2" src="https://foto.kontan.co.id/0Z2WvAOAOsRw-WtKrx21Ilp2Qs0=/640x360/smart/2017/01/23/670865593p.jpg" alt="">
                    <div class="">
                        <h5 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">Phase 3</h5>
                        <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                        <p class="text-md-start ms-md-5 mt-3 mt-md-0 " style="text-align: justify;">Kompetisi inovasi tekstil ramah lingkungan bertajuk TEXNOVA yang digelar oleh perusahaan tekstil berbasis di Jakarta, PT Forever Sparkle Textile Industry Tbk (FSTI) berhasil melahirkan 6 jawara inovasi terbaik yang akan semakin meningkatkan daya tarik industri tekstil dan turunannya dalam jangka panjang. Mereka terbagi dalam dua kategori, yakni kategori mahasiswa dan perusahaan/organisasi. Direktur FSTI, Michael Sung mengungkapkan, inisiatif event ini akan dapat mendukung upaya pengembangan industri tekstil menjadi semakin berkelanjutan, sehingga dapat menjadi destinasi investasi dalam jangka panjang. Event ini berhasil menuai animo cukup positif dari masyarakat, yang terlihat dari jumlah pendaftar yang mencapai ribuan. Michael menambahkan, pihaknya berharap dapat kembali menyelenggarakan event serupa di masa datang agar dapat menjadikan sektor tekstil sebagai destinasi investasi potensial.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal35" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered mx-4 mx-md-auto">
        <div class="modal-content bg-birutua">
            <div class="modal-header">
                <h5 class="modal-title">NEWS UPDATE</h5>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-md-flex flexcol justify-content-center" style="overflow-y: scroll;  height: 50svh;">
                    <img class="news-img2" src="https://awsimages.detik.net.id/community/media/visual/2021/10/05/ilustrasi-sampah-plastik_169.jpeg?w=600&q=90" alt="">
                    <div class="">
                        <h5 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">Phase 3</h5>
                        <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                        <p class="text-md-start ms-md-5 mt-3 mt-md-0 " style="text-align: justify;">Perusahaan industri tekstil dan garmen terbesar di Indonesia, PT Ben Brothers Tbk, terus berupaya untuk menggunakan bahan baku ramah lingkungan serta meningkatkan penggunaan sumber-sumber energi terbarukan yang memenuhi SDGs (Suistainable Development Goals). Upaya produksi yang lebih ramah lingkungan ini mendapat dukungan penuh dari Wakil Ketua Komisi VII DPR RI Dony Maryadi Oekon. Selain itu, Dony juga menjelaskan, perlu adanya pendekatan yang berfokus pada People, Planet, dan Profit atau Triple Bottom Line yang lebih ramah lingkungan. Ini bertujuan untuk memberi manfaat dan kontribusi positif bagi semua pemangku kepentingan termasuk pengembangan masyarakat lokal dan ekonomi nasional. Sehubungan dengan sustainability dan program untuk mencapai Net-Zero Emission pada Tahun 2060 untuk mengatasi tantangan keberlanjutan yang dapat memengaruhi masyarakat, lingkungan, dan ekonomi juga berperan aktif dalam kolaborasi strategis mengatasi tantangan dan memenuhi tujuan Pembangunan Berkelanjutan dengan menerapkan konsep Circular Economy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal36" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered mx-4 mx-md-auto">
        <div class="modal-content bg-birutua">
            <div class="modal-header">
                <h5 class="modal-title">NEWS UPDATE</h5>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-md-flex flexcol justify-content-center" style="overflow-y: scroll;  height: 50svh;">
                    <img class="news-img2" src="https://foto.kontan.co.id/PE4karpGB2nBTjbLe56PsUQw0QE=/640x360/smart/2021/05/06/975772842p.jpg" alt="">
                    <div class="">
                        <h5 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">Phase 3</h5>
                        <h6 class="text-md-start text-center ms-md-5 mt-3 mt-md-0 news-month">2020</h6>
                        <p class="text-md-start ms-md-5 mt-3 mt-md-0 " style="text-align: justify;">Manajemen PT Multisradi Panorama Tbk optimistis tren pertumbuhan akan terus berlangsung di tengah ketidakpastian global. Presiden Direktur PT Multistradi Panorama Tbk, Steven Vette menuturkan, pada 2020 masih banyak tantangan dan ketidakpastian yang dihadapi perusahaan. Hal itu antara lain situasi pandemi COVID-19, kenaikan harga bahan baku, serta biaya dan ketersediaan layanan logistik yang masih belum menentu. "Tapi kami cukup optimistis tren pertumbuhan akan terus berlangsung pada tahun ini karena perusahaan sudah menyiapkan strategi penyesuaian biaya,” tuturnya. Perusahaan mencatatkan peningkatan volume penjualan ban mobil sebesar 27 persen dan ban sepeda motor sebesar 6 persen dibandingkan tahun sebelumnya. Ia mengatakan, perseroan berkomitmen memperluas penawaran produk dan layanannya baik di pasar domestik dan ekspor. Pada 2020, 77 persen dari penjualan berasal dari ekspor dan sisanya dari penjualan di pasar domestik. Vette menuturkan, pencapaian itu merupakan hasil dari integrasi perusahaan dengan Grup Michelin pada semua aspek bisnis dan operasional, termasuk produksi, mutu, rantai pasokan, logistik, serta keuangan, penjualan, pemasaran, dan pengadaan. Selain itu pertumbuhan signifikan pada permintaan ekspor menjadi salah satu pendorong kinerja positif perusahaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>