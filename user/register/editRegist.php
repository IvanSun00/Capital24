<?php
require_once "../conn.php";

if (!isset($_SESSION['kelompok'])) {
    header("Location: login.php");
}

$id_kelompok = $_SESSION['kelompok'];
$query = "SELECT * FROM kelompok WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id_kelompok]);
$data = $stmt->fetch();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS / LINK -->
    <?php include "../../assets/link/link.html"; ?>
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/register.css" rel="stylesheet">
    <script src="../../assets/js/gsap.js"></script>

    <title>CAPITAL 2024 | EDIT REGISTRATION</title>
</head>

<body>
    <a href="logout.php">
        <button class="btn-logout ms-3 ms-md-5 mt-md-3">
            <div class="sign-logout"><svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg></div>
            <div class="text-logout">LOG OUT</div>
        </button>
    </a>
    <div class="img-container gs_reveal gs_reveal_fromTop">
        <img src="../../assets/img/logo_capital_tulisan.png" alt="">
    </div>
    <div class="container shadow text-white">

        <div class="mx-3 mx-md-5 py-3">
            <form class="well form-horizontal" method="post" id="regist-form">
                <fieldset>
                    <div class="px-3 py-2 row  py-3">
                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Status Validasi</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" stroke="#494c4e" stroke-linecap="round" stroke-width="2">
                                            <path d="M8.5 14.5h7.657" />
                                            <path d="M8.5 10.5h7.657" />
                                            <path d="M8.5 6.5h7.657" />
                                            <path d="M5.5 14.5h0" />
                                            <path d="M5.5 10.5h0" />
                                            <path d="M5.5 6.5h0" />
                                        </g>
                                        <path fill="none" stroke="#494c4e" stroke-linecap="round" stroke-width="2" d="M9.128 20.197H3.444a2.22 2.22 0 01-2.229-2.153V3.152A2.153 2.153 0 013.367.997h15.48A2.153 2.153 0 0121 3.152v8.738" />
                                        <path fill="#494c4e" d="M16.5 23.499a1.464 1.464 0 01-1.094-.484l-2.963-2.969A1.479 1.479 0 0112 18.985a1.5 1.5 0 01.462-1.078 1.56 1.56 0 012.113.037l1.925 1.931 4.943-4.959a1.543 1.543 0 012.132.02 1.461 1.461 0 01.425 1.04 1.5 1.5 0 01-.45 1.068l-5.993 6.012a1.44 1.44 0 01-1.057.443z" />
                                    </svg></span>

                                <?php
                                if ($data["verify"] == 1) {
                                    echo '<input style="background-color: white !important; color: red !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="REJECTED" disabled type="text" name="email" id="email" class="form-control shadow-none " placeholder="Masukkan email ketua" aria-label="Username" aria-describedby="addon-wrapping">';
                                } else if ($data["verify"] == 2) {
                                    echo '<input style="background-color: white !important; color: orange !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="INCOMPLETE FILE" disabled type="text" name="email" id="email" class="form-control shadow-none " placeholder="Masukkan email ketua" aria-label="Username" aria-describedby="addon-wrapping">';
                                } else if ($data["verify"] == 3) {
                                    echo '<input style="background-color: white !important; color: blue !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="PENDING..." disabled type="text" name="email" id="email" class="form-control shadow-none " placeholder="Masukkan email ketua" aria-label="Username" aria-describedby="addon-wrapping">';
                                } else if ($data["verify"] == 4) {
                                    echo '<input style="background-color: white !important; color: green !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="VALIDATED" disabled type="text" name="email" id="email" class="form-control shadow-none " placeholder="Masukkan email ketua" aria-label="Username" aria-describedby="addon-wrapping">';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Asal Sekolah</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="0.00512">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <polygon fill="var(--ci-primary-color, #000000)" points="368 350.643 256 413.643 144 350.643 144 284.081 112 266.303 112 369.357 256 450.357 400 369.357 400 266.303 368 284.081 368 350.643" class="ci-primary"></polygon>
                                            <path fill="var(--ci-primary-color, #000000)" d="M256,45.977,32,162.125v27.734L256,314.3,448,207.637V296h32V162.125ZM416,188.808l-32,17.777L256,277.7,128,206.585,96,188.808,73.821,176.486,256,82.023l182.179,94.463Z" class="ci-primary"></path>
                                        </g>
                                    </svg></span>
                                <input style="background-color: white !important; color: darkgreen !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="<?= $data['asal_sekolah'] ?>" disabled type="text" name="asalsekolah" id="asalsekolah" class="form-control shadow-none " placeholder="Masukkan sekolah anda" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Nama Team</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M5 22V14M5 14V4M5 14L7.47067 13.5059C9.1212 13.1758 10.8321 13.3328 12.3949 13.958C14.0885 14.6354 15.9524 14.7619 17.722 14.3195L17.8221 14.2945C18.4082 14.148 18.6861 13.4769 18.3753 12.9589L16.8147 10.3578C16.4732 9.78863 16.3024 9.50405 16.2619 9.19451C16.2451 9.06539 16.2451 8.93461 16.2619 8.80549C16.3024 8.49595 16.4732 8.21137 16.8147 7.64221L18.0932 5.51132C18.4278 4.9536 17.9211 4.26972 17.2901 4.42746C15.8013 4.79967 14.2331 4.69323 12.8082 4.12329L12.3949 3.95797C10.8321 3.33284 9.1212 3.17576 7.47067 3.50587L5 4M5 4V2" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg></span>
                                <input style="background-color: white !important; color: darkgreen !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="<?= $data['nama_kelompok'] ?>" disabled type="text" name="namatim" id="namatim" class="form-control shadow-none " placeholder="Masukkan nama team" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Email Ketua</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round"></rect>
                                        </g>
                                    </svg></span>
                                <input style="background-color: white !important; color: darkgreen !important; font-weight: 600 !important; letter-spacing: 2px !important;" value="<?= $data['email'] ?>" disabled type="text" name="email" id="email" class="form-control shadow-none " placeholder="Masukkan email ketua" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- Peserta 1 (Ketua) -->
                    <div class="px-3 py-2 row  py-3">
                        <h1 style="font-size: 22px" class="text-black">Peserta 1</h1>
                        <div class="col-12 col-md-6 mb-4">
                            <label style="font-size: 22px" class="text-black my-3 cotrol-label mb-2 ms-1">Nama Lengkap Peserta 1 (KETUA)</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3.2640000000000002" stroke="#000000" fill="none">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <circle cx="32" cy="18.14" r="11.14"></circle>
                                            <path d="M54.55,56.85A22.55,22.55,0,0,0,32,34.3h0A22.55,22.55,0,0,0,9.45,56.85Z"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['nama_ketua'] ?>" type="text" name="namaketua" id="namaketua" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input style="background-color: white !important;" value="<?= $data['nama_ketua'] ?>" type="text" name="namaketua" id="namaketua" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping" disabled>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">No. Whatsapp</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.000000000000000003">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M2 22L3.41152 16.8691C2.54422 15.3639 2.08876 13.6568 2.09099 11.9196C2.08095 6.44549 6.52644 2 11.99 2C14.6417 2 17.1315 3.02806 19.0062 4.9034C19.9303 5.82266 20.6627 6.91616 21.1611 8.12054C21.6595 9.32492 21.9139 10.6162 21.9096 11.9196C21.9096 17.3832 17.4641 21.8287 12 21.8287C10.3368 21.8287 8.71374 21.4151 7.26204 20.6192L2 22ZM7.49424 18.8349L7.79675 19.0162C9.06649 19.7676 10.5146 20.1644 11.99 20.1654C16.5264 20.1654 20.2263 16.4662 20.2263 11.9291C20.2263 9.73176 19.3696 7.65554 17.8168 6.1034C17.0533 5.33553 16.1453 4.72636 15.1453 4.31101C14.1452 3.89565 13.0728 3.68232 11.99 3.68331C7.44343 3.6839 3.74476 7.38316 3.74476 11.9202C3.74476 13.4724 4.17843 14.995 5.00502 16.3055L5.19645 16.618L4.35982 19.662L7.49483 18.8354L7.49424 18.8349Z" fill="#000000"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.52024 7.76662C9.33885 7.35303 9.13737 7.34298 8.96603 7.34298C8.81477 7.33294 8.65288 7.33294 8.48154 7.33294C8.32083 7.33294 8.04845 7.39321 7.81684 7.64549C7.58464 7.89719 6.95007 8.49217 6.95007 9.71167C6.95007 10.9318 7.83693 12.1111 7.95805 12.2724C8.07858 12.4337 9.67149 15.0139 12.192 16.0124C14.2883 16.839 14.712 16.6777 15.1657 16.6269C15.6189 16.5767 16.6275 16.0325 16.839 15.4476C17.0405 14.8733 17.0405 14.3693 16.9802 14.2682C16.9199 14.1678 16.748 14.1069 16.5064 13.9758C16.2541 13.8552 15.0446 13.2502 14.813 13.1693C14.5808 13.0889 14.4195 13.0487 14.2582 13.2904C14.0969 13.5427 13.623 14.0969 13.4724 14.2582C13.3306 14.4195 13.1799 14.4396 12.9377 14.3185C12.686 14.1979 11.8895 13.9356 10.9418 13.0889C10.2056 12.4331 9.71167 11.6171 9.56041 11.3755C9.41979 11.1232 9.54032 10.992 9.67149 10.8709C9.78257 10.7604 9.92378 10.579 10.0449 10.4378C10.1654 10.296 10.2056 10.1855 10.2966 10.0242C10.377 9.86292 10.3368 9.71167 10.2765 9.59114C10.2157 9.48006 9.74239 8.25997 9.52024 7.76603V7.76662Z" fill="#000000"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['no_whatsapp'] ?>" type="text" name="nomerwa" id="nomerwa" class="form-control shadow-none " placeholder="Masukkan nomor whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['no_whatsapp'] ?>" type="text" name="nomerwa" id="nomerwa" class="form-control shadow-none " placeholder="Masukkan nomor whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Alergi Makanan</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <rect x="4" y="4" width="12" height="3" rx="1" stroke="#000000" stroke-width="0.960000000000009" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16 20H10H6C4.89543 20 4 19.1046 4 18V10.372C4 10.1321 4.08631 9.90006 4.24318 9.71843L6.59091 7H10H13.4091L15.7568 9.71843C15.9137 9.90006 16 10.1321 16 10.372V14" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 13L10 13M10 13L12 13M10 13V11M10 13L10 15" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="17" cy="17" r="3" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18.5 14.402L15.5 19.5981" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg></span>

                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['alergi_ketua'] ?>" name="alergi1" id="alergi1" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['alergi_ketua'] ?>" name="alergi1" id="alergi1" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Konsumsi</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg fill="#000000" width="25px" height="25px" viewBox="-6.14 -6.14 135.16 135.16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 121.87" xml:space="preserve" stroke="#000000" stroke-width="0.0012288">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path d="M97.34,0.74c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L81.98,24.1l-0.03,0.04 c-2.29,2.77-3.86,5.33-4.56,7.67c-0.62,2.07-0.53,3.95,0.39,5.59c0.49,0.88,0.33,1.96-0.32,2.67l0,0l-8.89,9.62 c-0.87-0.95-1.56-1.72-2.02-2.22c-0.21-0.28-0.45-0.55-0.7-0.81l-0.02,0.02c-0.12-0.13-0.25-0.25-0.38-0.37l7.6-8.23 c-0.89-2.38-0.88-4.91-0.06-7.6c0.88-2.92,2.75-6.03,5.44-9.27c0.06-0.08,0.11-0.16,0.18-0.23L97.32,0.72L97.34,0.74L97.34,0.74z M57.13,55.01c-0.84-0.94-0.76-2.39,0.18-3.23c0.94-0.84,2.39-0.76,3.23,0.18c9.41,10.54,38.5,41.73,46.56,53.39 c10.63,15.05-5.83,19.79-11.29,14.31c-13.64-13.19-42.6-46.82-55.33-61.08c-4.58,1.94-9.03,2.24-13.5,0.96 c-4.81-1.37-9.52-4.58-14.3-9.51l-0.06-0.06c-3.64-3.84-6.49-7.63-8.55-11.38c-2.11-3.86-3.4-7.68-3.86-11.47 c-0.49-4.08-0.11-7.88,0.99-11.25c1.29-3.96,3.58-7.31,6.58-9.8c3.02-2.5,6.73-4.12,10.87-4.62c3.44-0.41,7.19-0.06,11.07,1.21 c5.37,1.75,11.63,6.1,16.82,11.68c3.83,4.11,7.11,8.92,9.06,13.87c2.03,5.16,2.65,10.5,1.02,15.5c-0.96,2.96-2.7,5.74-5.4,8.25 c-0.93,0.86-2.37,0.8-3.23-0.12c-0.86-0.93-0.8-2.37,0.12-3.23c2.09-1.95,3.43-4.08,4.16-6.33c1.26-3.87,0.73-8.16-0.93-12.38 c-1.74-4.42-4.69-8.74-8.15-12.45c-4.68-5.02-10.23-8.91-14.91-10.44c-3.21-1.04-6.28-1.34-9.09-1c-3.26,0.4-6.18,1.65-8.51,3.6 c-2.34,1.95-4.13,4.58-5.16,7.71c-0.89,2.73-1.2,5.87-0.79,9.26c0.39,3.2,1.5,6.47,3.32,9.81c1.91,3.43,4.53,6.9,7.9,10.45 l0.02,0.03c4.22,4.35,8.27,7.15,12.28,8.29c3.79,1.08,7.65,0.66,11.68-1.35c0.92-0.53,2.11-0.35,2.84,0.47 c12.42,13.91,42.63,48.92,56.01,61.89c5.81,2.37,9.03-0.55,6.25-5.7C100.7,102.43,63.5,62.17,57.13,55.01L57.13,55.01L57.13,55.01z M45.07,75.12l-29.16,31.55c-0.06,0.06-0.11,0.12-0.18,0.18c-4.26,4.6,3.28,11.3,7.96,6.82l28.32-30.65l3.04,3.45l-28.1,30.41l0,0 c-0.06,0.07-0.12,0.13-0.2,0.2c-1.68,1.41-3.37,2.33-5.08,2.71c-1.76,0.4-3.49,0.22-5.15-0.56c-0.28-0.11-0.54-0.25-0.77-0.46 l-4.03-3.73l0,0c-0.06-0.06-0.12-0.11-0.18-0.18c-1.56-1.8-2.3-3.72-2.1-5.75c0.19-1.92,1.21-3.79,3.14-5.59l29.44-31.86 L45.07,75.12L45.07,75.12z M75.63,57.46l1.73-1.87c0.86-0.93,2.31-0.99,3.23-0.13s0.99,2.3,0.13,3.23l-2,2.16L75.63,57.46 L75.63,57.46z M104.45,7.43c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L91.4,28.3c-0.86,0.93-2.3,0.99-3.23,0.13 c-0.93-0.86-0.99-2.3-0.13-3.23L104.45,7.43L104.45,7.43L104.45,7.43z M111.55,14c0.86-0.93,2.3-0.99,3.23-0.13 c0.93,0.86,0.99,2.3,0.13,3.23L98.51,34.86c-0.86,0.93-2.3,0.99-3.23,0.13c-0.93-0.86-0.99-2.3-0.13-3.23L111.55,14L111.55,14 L111.55,14z M118.91,20.83c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.31,0.13,3.23L103.55,44.2c-0.07,0.07-0.14,0.13-0.21,0.2 c-4.26,4.1-8.33,6.47-12.22,7.14c-4.22,0.73-8.09-0.47-11.64-3.57c-0.95-0.83-1.04-2.28-0.22-3.22c0.83-0.95,2.28-1.04,3.22-0.22 c2.45,2.14,5.07,2.98,7.84,2.49c2.98-0.51,6.26-2.48,9.84-5.93l0.02-0.02l18.71-20.25L118.91,20.83L118.91,20.83z"></path>
                                            </g>
                                        </g>
                                    </svg></span>

                                <?php if ($data['verify'] == 2) : ?>
                                    <select class="form-select shadow-none" name="konsumsi1" id="konsumsi1">
                                        <option value="normal" <?php echo ($data['konsumsi_ketua'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
                                        <option value="vege" <?php echo ($data['konsumsi_ketua'] == 'vege') ? 'selected' : ''; ?>>Vege</option>
                                        <option value="vegan" <?php echo ($data['konsumsi_ketua'] == 'vegan') ? 'selected' : ''; ?>>Vegan</option>
                                    </select>
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['konsumsi_ketua'] ?>" name="konsumsi1" id="konsumsi1" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_ketua'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label>
                                <div class="input-group mb-2">
                                    <input name="fotodiri1" id="fotodiri1" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label><br>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_ketua'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar_ketua'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label>
                                <div class="input-group mb-2">
                                    <input name="kartupelajar1" id="kartupelajar1" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label><br>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar_ketua'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>

                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">ID Line</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.9359999999999999">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M21.9999 10.0588C21.9999 5.58405 17.5141 1.94354 12 1.94354C6.48627 1.94354 1.99994 5.58405 1.99994 10.0588C1.99994 14.0702 5.55749 17.4299 10.3632 18.065C10.6887 18.1354 11.132 18.2798 11.244 18.5582C11.3449 18.8109 11.31 19.207 11.2765 19.4623C11.2765 19.4623 11.1591 20.168 11.1336 20.3184C11.09 20.571 10.9327 21.3072 12 20.8576C13.0672 20.4078 17.7588 17.4664 19.8569 15.0518H19.8564C21.3056 13.4624 21.9999 11.8495 21.9999 10.0588Z" stroke="#000000" stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3139 8.53744H18.4141V8.34641H16.1227V12.1925H18.4141V12.0014H16.3139V10.365H18.4141V10.1739H16.3139V8.53744ZM5.92147 12.0014V8.34641H5.73044V12.1925H8.02179V12.0014H5.92147ZM14.35 12.0433L11.6125 8.34634H11.295V12.1925H11.486V8.49641L14.223 12.1925H14.541V8.34634H14.35V12.0433ZM9.52202 8.34634V12.1925H9.71305V8.34634H9.52202Z" stroke="#000000" stroke-linejoin="round"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['id_line_ketua'] ?>" type="text" name="idline1" id="idline1" class="form-control shadow-none " placeholder="Masukkan ID Line" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['id_line_ketua'] ?>" type="text" name="idline1" id="idline1" class="form-control shadow-none " placeholder="Masukkan ID Line" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <!-- Peserta 2 -->
                    <div class="px-3 py-2 row  py-3">
                        <h1 style="font-size: 22px" class="text-black">Peserta 2</h1>
                        <div class="col-12 col-md-6 mb-4">
                            <label style="font-size: 22px" class="text-black my-3 212 control-label mb-2 ms-1">Nama Lengkap Peserta 2</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3.2640000000000002" stroke="#000000" fill="none">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <circle cx="32" cy="18.14" r="11.14"></circle>
                                            <path d="M54.55,56.85A22.55,22.55,0,0,0,32,34.3h0A22.55,22.55,0,0,0,9.45,56.85Z"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['nama_peserta2'] ?>" name="namapeserta2" id="namapeserta2" type="text" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['nama_peserta2'] ?>" name="namapeserta2" id="namapeserta2" type="text" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">No. WhatsApp</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.000000000000000003">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M2 22L3.41152 16.8691C2.54422 15.3639 2.08876 13.6568 2.09099 11.9196C2.08095 6.44549 6.52644 2 11.99 2C14.6417 2 17.1315 3.02806 19.0062 4.9034C19.9303 5.82266 20.6627 6.91616 21.1611 8.12054C21.6595 9.32492 21.9139 10.6162 21.9096 11.9196C21.9096 17.3832 17.4641 21.8287 12 21.8287C10.3368 21.8287 8.71374 21.4151 7.26204 20.6192L2 22ZM7.49424 18.8349L7.79675 19.0162C9.06649 19.7676 10.5146 20.1644 11.99 20.1654C16.5264 20.1654 20.2263 16.4662 20.2263 11.9291C20.2263 9.73176 19.3696 7.65554 17.8168 6.1034C17.0533 5.33553 16.1453 4.72636 15.1453 4.31101C14.1452 3.89565 13.0728 3.68232 11.99 3.68331C7.44343 3.6839 3.74476 7.38316 3.74476 11.9202C3.74476 13.4724 4.17843 14.995 5.00502 16.3055L5.19645 16.618L4.35982 19.662L7.49483 18.8354L7.49424 18.8349Z" fill="#000000"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.52024 7.76662C9.33885 7.35303 9.13737 7.34298 8.96603 7.34298C8.81477 7.33294 8.65288 7.33294 8.48154 7.33294C8.32083 7.33294 8.04845 7.39321 7.81684 7.64549C7.58464 7.89719 6.95007 8.49217 6.95007 9.71167C6.95007 10.9318 7.83693 12.1111 7.95805 12.2724C8.07858 12.4337 9.67149 15.0139 12.192 16.0124C14.2883 16.839 14.712 16.6777 15.1657 16.6269C15.6189 16.5767 16.6275 16.0325 16.839 15.4476C17.0405 14.8733 17.0405 14.3693 16.9802 14.2682C16.9199 14.1678 16.748 14.1069 16.5064 13.9758C16.2541 13.8552 15.0446 13.2502 14.813 13.1693C14.5808 13.0889 14.4195 13.0487 14.2582 13.2904C14.0969 13.5427 13.623 14.0969 13.4724 14.2582C13.3306 14.4195 13.1799 14.4396 12.9377 14.3185C12.686 14.1979 11.8895 13.9356 10.9418 13.0889C10.2056 12.4331 9.71167 11.6171 9.56041 11.3755C9.41979 11.1232 9.54032 10.992 9.67149 10.8709C9.78257 10.7604 9.92378 10.579 10.0449 10.4378C10.1654 10.296 10.2056 10.1855 10.2966 10.0242C10.377 9.86292 10.3368 9.71167 10.2765 9.59114C10.2157 9.48006 9.74239 8.25997 9.52024 7.76603V7.76662Z" fill="#000000"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['id_line2'] ?>" name="idline2" id="idline2" type="text" class="form-control shadow-none " placeholder="Masukkan no whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['id_line2'] ?>" name="idline2" id="idline2" type="text" class="form-control shadow-none " placeholder="Masukkan no whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Alergi Makanan</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <rect x="4" y="4" width="12" height="3" rx="1" stroke="#000000" stroke-width="0.960000000000009" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16 20H10H6C4.89543 20 4 19.1046 4 18V10.372C4 10.1321 4.08631 9.90006 4.24318 9.71843L6.59091 7H10H13.4091L15.7568 9.71843C15.9137 9.90006 16 10.1321 16 10.372V14" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 13L10 13M10 13L12 13M10 13V11M10 13L10 15" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="17" cy="17" r="3" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18.5 14.402L15.5 19.5981" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['alergi_peserta2'] ?>" name="alergi2" id="alergi2" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['alergi_peserta2'] ?>" name="alergi2" id="alergi2" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Konsumsi</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg fill="#000000" width="25px" height="25px" viewBox="-6.14 -6.14 135.16 135.16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 121.87" xml:space="preserve" stroke="#000000" stroke-width="0.0012288">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path d="M97.34,0.74c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L81.98,24.1l-0.03,0.04 c-2.29,2.77-3.86,5.33-4.56,7.67c-0.62,2.07-0.53,3.95,0.39,5.59c0.49,0.88,0.33,1.96-0.32,2.67l0,0l-8.89,9.62 c-0.87-0.95-1.56-1.72-2.02-2.22c-0.21-0.28-0.45-0.55-0.7-0.81l-0.02,0.02c-0.12-0.13-0.25-0.25-0.38-0.37l7.6-8.23 c-0.89-2.38-0.88-4.91-0.06-7.6c0.88-2.92,2.75-6.03,5.44-9.27c0.06-0.08,0.11-0.16,0.18-0.23L97.32,0.72L97.34,0.74L97.34,0.74z M57.13,55.01c-0.84-0.94-0.76-2.39,0.18-3.23c0.94-0.84,2.39-0.76,3.23,0.18c9.41,10.54,38.5,41.73,46.56,53.39 c10.63,15.05-5.83,19.79-11.29,14.31c-13.64-13.19-42.6-46.82-55.33-61.08c-4.58,1.94-9.03,2.24-13.5,0.96 c-4.81-1.37-9.52-4.58-14.3-9.51l-0.06-0.06c-3.64-3.84-6.49-7.63-8.55-11.38c-2.11-3.86-3.4-7.68-3.86-11.47 c-0.49-4.08-0.11-7.88,0.99-11.25c1.29-3.96,3.58-7.31,6.58-9.8c3.02-2.5,6.73-4.12,10.87-4.62c3.44-0.41,7.19-0.06,11.07,1.21 c5.37,1.75,11.63,6.1,16.82,11.68c3.83,4.11,7.11,8.92,9.06,13.87c2.03,5.16,2.65,10.5,1.02,15.5c-0.96,2.96-2.7,5.74-5.4,8.25 c-0.93,0.86-2.37,0.8-3.23-0.12c-0.86-0.93-0.8-2.37,0.12-3.23c2.09-1.95,3.43-4.08,4.16-6.33c1.26-3.87,0.73-8.16-0.93-12.38 c-1.74-4.42-4.69-8.74-8.15-12.45c-4.68-5.02-10.23-8.91-14.91-10.44c-3.21-1.04-6.28-1.34-9.09-1c-3.26,0.4-6.18,1.65-8.51,3.6 c-2.34,1.95-4.13,4.58-5.16,7.71c-0.89,2.73-1.2,5.87-0.79,9.26c0.39,3.2,1.5,6.47,3.32,9.81c1.91,3.43,4.53,6.9,7.9,10.45 l0.02,0.03c4.22,4.35,8.27,7.15,12.28,8.29c3.79,1.08,7.65,0.66,11.68-1.35c0.92-0.53,2.11-0.35,2.84,0.47 c12.42,13.91,42.63,48.92,56.01,61.89c5.81,2.37,9.03-0.55,6.25-5.7C100.7,102.43,63.5,62.17,57.13,55.01L57.13,55.01L57.13,55.01z M45.07,75.12l-29.16,31.55c-0.06,0.06-0.11,0.12-0.18,0.18c-4.26,4.6,3.28,11.3,7.96,6.82l28.32-30.65l3.04,3.45l-28.1,30.41l0,0 c-0.06,0.07-0.12,0.13-0.2,0.2c-1.68,1.41-3.37,2.33-5.08,2.71c-1.76,0.4-3.49,0.22-5.15-0.56c-0.28-0.11-0.54-0.25-0.77-0.46 l-4.03-3.73l0,0c-0.06-0.06-0.12-0.11-0.18-0.18c-1.56-1.8-2.3-3.72-2.1-5.75c0.19-1.92,1.21-3.79,3.14-5.59l29.44-31.86 L45.07,75.12L45.07,75.12z M75.63,57.46l1.73-1.87c0.86-0.93,2.31-0.99,3.23-0.13s0.99,2.3,0.13,3.23l-2,2.16L75.63,57.46 L75.63,57.46z M104.45,7.43c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L91.4,28.3c-0.86,0.93-2.3,0.99-3.23,0.13 c-0.93-0.86-0.99-2.3-0.13-3.23L104.45,7.43L104.45,7.43L104.45,7.43z M111.55,14c0.86-0.93,2.3-0.99,3.23-0.13 c0.93,0.86,0.99,2.3,0.13,3.23L98.51,34.86c-0.86,0.93-2.3,0.99-3.23,0.13c-0.93-0.86-0.99-2.3-0.13-3.23L111.55,14L111.55,14 L111.55,14z M118.91,20.83c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.31,0.13,3.23L103.55,44.2c-0.07,0.07-0.14,0.13-0.21,0.2 c-4.26,4.1-8.33,6.47-12.22,7.14c-4.22,0.73-8.09-0.47-11.64-3.57c-0.95-0.83-1.04-2.28-0.22-3.22c0.83-0.95,2.28-1.04,3.22-0.22 c2.45,2.14,5.07,2.98,7.84,2.49c2.98-0.51,6.26-2.48,9.84-5.93l0.02-0.02l18.71-20.25L118.91,20.83L118.91,20.83z"></path>
                                            </g>
                                        </g>
                                    </svg></span>

                                <?php if ($data['verify'] == 2) : ?>
                                    <select class="form-select shadow-none" name="konsumsi2" id="konsumsi2">
                                        <option value="normal" <?php echo ($data['konsumsi_peserta2'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
                                        <option value="vege" <?php echo ($data['konsumsi_peserta2'] == 'vege') ? 'selected' : ''; ?>>Vege</option>
                                        <option value="vegan" <?php echo ($data['konsumsi_peserta2'] == 'vegan') ? 'selected' : ''; ?>>Vegan</option>
                                    </select>
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['konsumsi_peserta2'] ?>" name="konsumsi2" id="konsumsi2" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_peserta2'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label>
                                <div class="input-group mb-2">
                                    <input name="fotodiri2" id="fotodiri2" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label><br>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_peserta2'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar2'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label>
                                <div class="input-group mb-2">
                                    <input name="kartupelajar2" id="kartupelajar2" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label><br>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar2'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr>
                    <!-- Peserta 3 -->
                    <div class="px-3 py-2 row  py-3">
                        <h1 style="font-size: 22px" class="text-black">Peserta 3</h1>
                        <div class="col-12 col-md-6 mb-4">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Nama Lengkap Peserta 3</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3.2640000000000002" stroke="#000000" fill="none">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <circle cx="32" cy="18.14" r="11.14"></circle>
                                            <path d="M54.55,56.85A22.55,22.55,0,0,0,32,34.3h0A22.55,22.55,0,0,0,9.45,56.85Z"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['nama_peserta3'] ?>" name="namapeserta3" id="namapeserta3" type="text" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['nama_peserta3'] ?>" name="namapeserta3" id="namapeserta3" type="text" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 my-2">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">No. WhatsApp</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.000000000000000003">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M2 22L3.41152 16.8691C2.54422 15.3639 2.08876 13.6568 2.09099 11.9196C2.08095 6.44549 6.52644 2 11.99 2C14.6417 2 17.1315 3.02806 19.0062 4.9034C19.9303 5.82266 20.6627 6.91616 21.1611 8.12054C21.6595 9.32492 21.9139 10.6162 21.9096 11.9196C21.9096 17.3832 17.4641 21.8287 12 21.8287C10.3368 21.8287 8.71374 21.4151 7.26204 20.6192L2 22ZM7.49424 18.8349L7.79675 19.0162C9.06649 19.7676 10.5146 20.1644 11.99 20.1654C16.5264 20.1654 20.2263 16.4662 20.2263 11.9291C20.2263 9.73176 19.3696 7.65554 17.8168 6.1034C17.0533 5.33553 16.1453 4.72636 15.1453 4.31101C14.1452 3.89565 13.0728 3.68232 11.99 3.68331C7.44343 3.6839 3.74476 7.38316 3.74476 11.9202C3.74476 13.4724 4.17843 14.995 5.00502 16.3055L5.19645 16.618L4.35982 19.662L7.49483 18.8354L7.49424 18.8349Z" fill="#000000"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.52024 7.76662C9.33885 7.35303 9.13737 7.34298 8.96603 7.34298C8.81477 7.33294 8.65288 7.33294 8.48154 7.33294C8.32083 7.33294 8.04845 7.39321 7.81684 7.64549C7.58464 7.89719 6.95007 8.49217 6.95007 9.71167C6.95007 10.9318 7.83693 12.1111 7.95805 12.2724C8.07858 12.4337 9.67149 15.0139 12.192 16.0124C14.2883 16.839 14.712 16.6777 15.1657 16.6269C15.6189 16.5767 16.6275 16.0325 16.839 15.4476C17.0405 14.8733 17.0405 14.3693 16.9802 14.2682C16.9199 14.1678 16.748 14.1069 16.5064 13.9758C16.2541 13.8552 15.0446 13.2502 14.813 13.1693C14.5808 13.0889 14.4195 13.0487 14.2582 13.2904C14.0969 13.5427 13.623 14.0969 13.4724 14.2582C13.3306 14.4195 13.1799 14.4396 12.9377 14.3185C12.686 14.1979 11.8895 13.9356 10.9418 13.0889C10.2056 12.4331 9.71167 11.6171 9.56041 11.3755C9.41979 11.1232 9.54032 10.992 9.67149 10.8709C9.78257 10.7604 9.92378 10.579 10.0449 10.4378C10.1654 10.296 10.2056 10.1855 10.2966 10.0242C10.377 9.86292 10.3368 9.71167 10.2765 9.59114C10.2157 9.48006 9.74239 8.25997 9.52024 7.76603V7.76662Z" fill="#000000"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['id_line3'] ?>" name="idline3" id="idline3" type="text" class="form-control shadow-none " placeholder="Masukkan no whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['id_line3'] ?>" name="idline3" id="idline3" type="text" class="form-control shadow-none " placeholder="Masukkan no whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Alergi Makanan</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <rect x="4" y="4" width="12" height="3" rx="1" stroke="#000000" stroke-width="0.960000000000009" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16 20H10H6C4.89543 20 4 19.1046 4 18V10.372C4 10.1321 4.08631 9.90006 4.24318 9.71843L6.59091 7H10H13.4091L15.7568 9.71843C15.9137 9.90006 16 10.1321 16 10.372V14" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 13L10 13M10 13L12 13M10 13V11M10 13L10 15" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="17" cy="17" r="3" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18.5 14.402L15.5 19.5981" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['alergi_peserta3'] ?>" name="alergi3" id="alergi3" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['alergi_peserta3'] ?>" name="alergi3" id="alergi3" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Konsumsi</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg fill="#000000" width="25px" height="25px" viewBox="-6.14 -6.14 135.16 135.16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 121.87" xml:space="preserve" stroke="#000000" stroke-width="0.0012288">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path d="M97.34,0.74c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L81.98,24.1l-0.03,0.04 c-2.29,2.77-3.86,5.33-4.56,7.67c-0.62,2.07-0.53,3.95,0.39,5.59c0.49,0.88,0.33,1.96-0.32,2.67l0,0l-8.89,9.62 c-0.87-0.95-1.56-1.72-2.02-2.22c-0.21-0.28-0.45-0.55-0.7-0.81l-0.02,0.02c-0.12-0.13-0.25-0.25-0.38-0.37l7.6-8.23 c-0.89-2.38-0.88-4.91-0.06-7.6c0.88-2.92,2.75-6.03,5.44-9.27c0.06-0.08,0.11-0.16,0.18-0.23L97.32,0.72L97.34,0.74L97.34,0.74z M57.13,55.01c-0.84-0.94-0.76-2.39,0.18-3.23c0.94-0.84,2.39-0.76,3.23,0.18c9.41,10.54,38.5,41.73,46.56,53.39 c10.63,15.05-5.83,19.79-11.29,14.31c-13.64-13.19-42.6-46.82-55.33-61.08c-4.58,1.94-9.03,2.24-13.5,0.96 c-4.81-1.37-9.52-4.58-14.3-9.51l-0.06-0.06c-3.64-3.84-6.49-7.63-8.55-11.38c-2.11-3.86-3.4-7.68-3.86-11.47 c-0.49-4.08-0.11-7.88,0.99-11.25c1.29-3.96,3.58-7.31,6.58-9.8c3.02-2.5,6.73-4.12,10.87-4.62c3.44-0.41,7.19-0.06,11.07,1.21 c5.37,1.75,11.63,6.1,16.82,11.68c3.83,4.11,7.11,8.92,9.06,13.87c2.03,5.16,2.65,10.5,1.02,15.5c-0.96,2.96-2.7,5.74-5.4,8.25 c-0.93,0.86-2.37,0.8-3.23-0.12c-0.86-0.93-0.8-2.37,0.12-3.23c2.09-1.95,3.43-4.08,4.16-6.33c1.26-3.87,0.73-8.16-0.93-12.38 c-1.74-4.42-4.69-8.74-8.15-12.45c-4.68-5.02-10.23-8.91-14.91-10.44c-3.21-1.04-6.28-1.34-9.09-1c-3.26,0.4-6.18,1.65-8.51,3.6 c-2.34,1.95-4.13,4.58-5.16,7.71c-0.89,2.73-1.2,5.87-0.79,9.26c0.39,3.2,1.5,6.47,3.32,9.81c1.91,3.43,4.53,6.9,7.9,10.45 l0.02,0.03c4.22,4.35,8.27,7.15,12.28,8.29c3.79,1.08,7.65,0.66,11.68-1.35c0.92-0.53,2.11-0.35,2.84,0.47 c12.42,13.91,42.63,48.92,56.01,61.89c5.81,2.37,9.03-0.55,6.25-5.7C100.7,102.43,63.5,62.17,57.13,55.01L57.13,55.01L57.13,55.01z M45.07,75.12l-29.16,31.55c-0.06,0.06-0.11,0.12-0.18,0.18c-4.26,4.6,3.28,11.3,7.96,6.82l28.32-30.65l3.04,3.45l-28.1,30.41l0,0 c-0.06,0.07-0.12,0.13-0.2,0.2c-1.68,1.41-3.37,2.33-5.08,2.71c-1.76,0.4-3.49,0.22-5.15-0.56c-0.28-0.11-0.54-0.25-0.77-0.46 l-4.03-3.73l0,0c-0.06-0.06-0.12-0.11-0.18-0.18c-1.56-1.8-2.3-3.72-2.1-5.75c0.19-1.92,1.21-3.79,3.14-5.59l29.44-31.86 L45.07,75.12L45.07,75.12z M75.63,57.46l1.73-1.87c0.86-0.93,2.31-0.99,3.23-0.13s0.99,2.3,0.13,3.23l-2,2.16L75.63,57.46 L75.63,57.46z M104.45,7.43c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L91.4,28.3c-0.86,0.93-2.3,0.99-3.23,0.13 c-0.93-0.86-0.99-2.3-0.13-3.23L104.45,7.43L104.45,7.43L104.45,7.43z M111.55,14c0.86-0.93,2.3-0.99,3.23-0.13 c0.93,0.86,0.99,2.3,0.13,3.23L98.51,34.86c-0.86,0.93-2.3,0.99-3.23,0.13c-0.93-0.86-0.99-2.3-0.13-3.23L111.55,14L111.55,14 L111.55,14z M118.91,20.83c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.31,0.13,3.23L103.55,44.2c-0.07,0.07-0.14,0.13-0.21,0.2 c-4.26,4.1-8.33,6.47-12.22,7.14c-4.22,0.73-8.09-0.47-11.64-3.57c-0.95-0.83-1.04-2.28-0.22-3.22c0.83-0.95,2.28-1.04,3.22-0.22 c2.45,2.14,5.07,2.98,7.84,2.49c2.98-0.51,6.26-2.48,9.84-5.93l0.02-0.02l18.71-20.25L118.91,20.83L118.91,20.83z"></path>
                                            </g>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <select class="form-select shadow-none" name="konsumsi3" id="konsumsi3">
                                        <option value="normal" <?php echo ($data['konsumsi_peserta3'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
                                        <option value="vege" <?php echo ($data['konsumsi_peserta3'] == 'vege') ? 'selected' : ''; ?>>Vege</option>
                                        <option value="vegan" <?php echo ($data['konsumsi_peserta3'] == 'vegan') ? 'selected' : ''; ?>>Vegan</option>
                                    </select>
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['konsumsi_peserta3'] ?>" name="konsumsi3" id="konsumsi3" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_peserta3'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label>
                                <div class="input-group mb-2">
                                    <input name="fotodiri3" id="fotodiri3" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label><br>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_peserta3'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar3'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label>
                                <div class="input-group mb-2">
                                    <input name="kartupelajar3" id="kartupelajar3" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label><br>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar3'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr>
                    <!-- Peserta 4 -->
                    <div class="px-3 py-2 row  py-3 mb-4">
                        <h1 style="font-size: 22px" class="text-black">Peserta 4</h1>
                        <div class="col-12 col-md-6 mb-4">
                            <label style="font-size: 22px" class="text-black my-3 c22 control-label mb-2 ms-1">Nama Lengkap Peserta 4</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3.2640000000000002" stroke="#000000" fill="none">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <circle cx="32" cy="18.14" r="11.14"></circle>
                                            <path d="M54.55,56.85A22.55,22.55,0,0,0,32,34.3h0A22.55,22.55,0,0,0,9.45,56.85Z"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['nama_peserta4'] ?>" name="namapeserta4" id="namapeserta4" type="text" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['nama_peserta4'] ?>" name="namapeserta4" id="namapeserta4" type="text" class="form-control shadow-none " placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">No. WhatsApp</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.000000000000000003">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M2 22L3.41152 16.8691C2.54422 15.3639 2.08876 13.6568 2.09099 11.9196C2.08095 6.44549 6.52644 2 11.99 2C14.6417 2 17.1315 3.02806 19.0062 4.9034C19.9303 5.82266 20.6627 6.91616 21.1611 8.12054C21.6595 9.32492 21.9139 10.6162 21.9096 11.9196C21.9096 17.3832 17.4641 21.8287 12 21.8287C10.3368 21.8287 8.71374 21.4151 7.26204 20.6192L2 22ZM7.49424 18.8349L7.79675 19.0162C9.06649 19.7676 10.5146 20.1644 11.99 20.1654C16.5264 20.1654 20.2263 16.4662 20.2263 11.9291C20.2263 9.73176 19.3696 7.65554 17.8168 6.1034C17.0533 5.33553 16.1453 4.72636 15.1453 4.31101C14.1452 3.89565 13.0728 3.68232 11.99 3.68331C7.44343 3.6839 3.74476 7.38316 3.74476 11.9202C3.74476 13.4724 4.17843 14.995 5.00502 16.3055L5.19645 16.618L4.35982 19.662L7.49483 18.8354L7.49424 18.8349Z" fill="#000000"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.52024 7.76662C9.33885 7.35303 9.13737 7.34298 8.96603 7.34298C8.81477 7.33294 8.65288 7.33294 8.48154 7.33294C8.32083 7.33294 8.04845 7.39321 7.81684 7.64549C7.58464 7.89719 6.95007 8.49217 6.95007 9.71167C6.95007 10.9318 7.83693 12.1111 7.95805 12.2724C8.07858 12.4337 9.67149 15.0139 12.192 16.0124C14.2883 16.839 14.712 16.6777 15.1657 16.6269C15.6189 16.5767 16.6275 16.0325 16.839 15.4476C17.0405 14.8733 17.0405 14.3693 16.9802 14.2682C16.9199 14.1678 16.748 14.1069 16.5064 13.9758C16.2541 13.8552 15.0446 13.2502 14.813 13.1693C14.5808 13.0889 14.4195 13.0487 14.2582 13.2904C14.0969 13.5427 13.623 14.0969 13.4724 14.2582C13.3306 14.4195 13.1799 14.4396 12.9377 14.3185C12.686 14.1979 11.8895 13.9356 10.9418 13.0889C10.2056 12.4331 9.71167 11.6171 9.56041 11.3755C9.41979 11.1232 9.54032 10.992 9.67149 10.8709C9.78257 10.7604 9.92378 10.579 10.0449 10.4378C10.1654 10.296 10.2056 10.1855 10.2966 10.0242C10.377 9.86292 10.3368 9.71167 10.2765 9.59114C10.2157 9.48006 9.74239 8.25997 9.52024 7.76603V7.76662Z" fill="#000000"></path>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['id_line4'] ?>" name="idline4" id="idline4" type="text" class="form-control shadow-none " placeholder="Masukkan no whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['id_line4'] ?>" name="idline4" id="idline4" type="text" class="form-control shadow-none " placeholder="Masukkan no whatsapp" aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Alergi Makanan</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <rect x="4" y="4" width="12" height="3" rx="1" stroke="#000000" stroke-width="0.960000000000009" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16 20H10H6C4.89543 20 4 19.1046 4 18V10.372C4 10.1321 4.08631 9.90006 4.24318 9.71843L6.59091 7H10H13.4091L15.7568 9.71843C15.9137 9.90006 16 10.1321 16 10.372V14" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 13L10 13M10 13L12 13M10 13V11M10 13L10 15" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="17" cy="17" r="3" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18.5 14.402L15.5 19.5981" stroke="#000000" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <input value="<?= $data['alergi_peserta4'] ?>" name="alergi4" id="alergi4" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['alergi_peserta4'] ?>" name="alergi4" id="alergi4" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Konsumsi</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text py-2" id="addon-wrapping"><svg fill="#000000" width="25px" height="25px" viewBox="-6.14 -6.14 135.16 135.16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 121.87" xml:space="preserve" stroke="#000000" stroke-width="0.0012288">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path d="M97.34,0.74c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L81.98,24.1l-0.03,0.04 c-2.29,2.77-3.86,5.33-4.56,7.67c-0.62,2.07-0.53,3.95,0.39,5.59c0.49,0.88,0.33,1.96-0.32,2.67l0,0l-8.89,9.62 c-0.87-0.95-1.56-1.72-2.02-2.22c-0.21-0.28-0.45-0.55-0.7-0.81l-0.02,0.02c-0.12-0.13-0.25-0.25-0.38-0.37l7.6-8.23 c-0.89-2.38-0.88-4.91-0.06-7.6c0.88-2.92,2.75-6.03,5.44-9.27c0.06-0.08,0.11-0.16,0.18-0.23L97.32,0.72L97.34,0.74L97.34,0.74z M57.13,55.01c-0.84-0.94-0.76-2.39,0.18-3.23c0.94-0.84,2.39-0.76,3.23,0.18c9.41,10.54,38.5,41.73,46.56,53.39 c10.63,15.05-5.83,19.79-11.29,14.31c-13.64-13.19-42.6-46.82-55.33-61.08c-4.58,1.94-9.03,2.24-13.5,0.96 c-4.81-1.37-9.52-4.58-14.3-9.51l-0.06-0.06c-3.64-3.84-6.49-7.63-8.55-11.38c-2.11-3.86-3.4-7.68-3.86-11.47 c-0.49-4.08-0.11-7.88,0.99-11.25c1.29-3.96,3.58-7.31,6.58-9.8c3.02-2.5,6.73-4.12,10.87-4.62c3.44-0.41,7.19-0.06,11.07,1.21 c5.37,1.75,11.63,6.1,16.82,11.68c3.83,4.11,7.11,8.92,9.06,13.87c2.03,5.16,2.65,10.5,1.02,15.5c-0.96,2.96-2.7,5.74-5.4,8.25 c-0.93,0.86-2.37,0.8-3.23-0.12c-0.86-0.93-0.8-2.37,0.12-3.23c2.09-1.95,3.43-4.08,4.16-6.33c1.26-3.87,0.73-8.16-0.93-12.38 c-1.74-4.42-4.69-8.74-8.15-12.45c-4.68-5.02-10.23-8.91-14.91-10.44c-3.21-1.04-6.28-1.34-9.09-1c-3.26,0.4-6.18,1.65-8.51,3.6 c-2.34,1.95-4.13,4.58-5.16,7.71c-0.89,2.73-1.2,5.87-0.79,9.26c0.39,3.2,1.5,6.47,3.32,9.81c1.91,3.43,4.53,6.9,7.9,10.45 l0.02,0.03c4.22,4.35,8.27,7.15,12.28,8.29c3.79,1.08,7.65,0.66,11.68-1.35c0.92-0.53,2.11-0.35,2.84,0.47 c12.42,13.91,42.63,48.92,56.01,61.89c5.81,2.37,9.03-0.55,6.25-5.7C100.7,102.43,63.5,62.17,57.13,55.01L57.13,55.01L57.13,55.01z M45.07,75.12l-29.16,31.55c-0.06,0.06-0.11,0.12-0.18,0.18c-4.26,4.6,3.28,11.3,7.96,6.82l28.32-30.65l3.04,3.45l-28.1,30.41l0,0 c-0.06,0.07-0.12,0.13-0.2,0.2c-1.68,1.41-3.37,2.33-5.08,2.71c-1.76,0.4-3.49,0.22-5.15-0.56c-0.28-0.11-0.54-0.25-0.77-0.46 l-4.03-3.73l0,0c-0.06-0.06-0.12-0.11-0.18-0.18c-1.56-1.8-2.3-3.72-2.1-5.75c0.19-1.92,1.21-3.79,3.14-5.59l29.44-31.86 L45.07,75.12L45.07,75.12z M75.63,57.46l1.73-1.87c0.86-0.93,2.31-0.99,3.23-0.13s0.99,2.3,0.13,3.23l-2,2.16L75.63,57.46 L75.63,57.46z M104.45,7.43c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.3,0.13,3.23L91.4,28.3c-0.86,0.93-2.3,0.99-3.23,0.13 c-0.93-0.86-0.99-2.3-0.13-3.23L104.45,7.43L104.45,7.43L104.45,7.43z M111.55,14c0.86-0.93,2.3-0.99,3.23-0.13 c0.93,0.86,0.99,2.3,0.13,3.23L98.51,34.86c-0.86,0.93-2.3,0.99-3.23,0.13c-0.93-0.86-0.99-2.3-0.13-3.23L111.55,14L111.55,14 L111.55,14z M118.91,20.83c0.86-0.93,2.3-0.99,3.23-0.13c0.93,0.86,0.99,2.31,0.13,3.23L103.55,44.2c-0.07,0.07-0.14,0.13-0.21,0.2 c-4.26,4.1-8.33,6.47-12.22,7.14c-4.22,0.73-8.09-0.47-11.64-3.57c-0.95-0.83-1.04-2.28-0.22-3.22c0.83-0.95,2.28-1.04,3.22-0.22 c2.45,2.14,5.07,2.98,7.84,2.49c2.98-0.51,6.26-2.48,9.84-5.93l0.02-0.02l18.71-20.25L118.91,20.83L118.91,20.83z"></path>
                                            </g>
                                        </g>
                                    </svg></span>
                                <?php if ($data['verify'] == 2) : ?>
                                    <select class="form-select shadow-none" name="konsumsi4" id="konsumsi4">
                                        <option value="normal" <?php echo ($data['konsumsi_peserta4'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
                                        <option value="vege" <?php echo ($data['konsumsi_peserta4'] == 'vege') ? 'selected' : ''; ?>>Vege</option>
                                        <option value="vegan" <?php echo ($data['konsumsi_peserta4'] == 'vegan') ? 'selected' : ''; ?>>Vegan</option>
                                    </select>
                                <?php else : ?>
                                    <input disabled style="background-color: white !important;" value="<?= $data['konsumsi_peserta4'] ?>" name="konsumsi4" id="konsumsi4" type="text" class="form-control shadow-none " placeholder='Jika tidak ada isi " - "' aria-label="Username" aria-describedby="addon-wrapping">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_peserta4'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label>
                                <div class="input-group mb-2">
                                    <input name="fotodiri4" id="fotodiri4" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Pas Foto 3x4</label><br>
                                <img src="../../admin/uploads/foto3x4/<?= $data['foto_diri_peserta4'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar4'] ?>?<?= time() ?>" alt="" style="">
                                <br>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label>
                                <div class="input-group mb-2">
                                    <input name="kartupelajar4" id="kartupelajar4" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <label style="font-size: 22px" class="text-black my-3 control-label mb-2 ms-1">Foto Kartu Pelajar</label><br>
                                <img src="../../admin/uploads/fotokartupelajar/<?= $data['kartu_pelajar4'] ?>?<?= time() ?>" alt="" style="">
                            <?php endif; ?>
                        </div>

                    </div>
                    <hr>
                    <div class="px-3 py-2 row  py-3">
                        <div class="col-md-6 col-12 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img class="gbrtrf" src="../../admin/uploads/buktitransfer/<?= $data['bukti_transfer'] ?>?<?= time() ?>" alt="Bukti transfer" style=""> <br>
                                <h1 style="font-size: 22px" class="text-black my-3 fs-5 my-3">Bukti Transfer</h1>
                                <div class="input-group mb-4">
                                    <input name="buktitrf" id="buktitrf" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <h1 style="font-size: 22px" class="text-black my-3 fs-5 my-3">Bukti Transfer</h1><br>
                                <img class="gbrtrf mb-4" src="../../admin/uploads/buktitransfer/<?= $data['bukti_transfer'] ?>?<?= time() ?>" alt="Bukti transfer" style=""> <br>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 col-12 my-2">
                            <?php if ($data['verify'] == 2) : ?>
                                <img class="gbrtrf" src="../../admin/uploads/buktiupload/<?= $data['bukti_upload'] ?>?<?= time() ?>" alt="Bukti upload" style=""> <br>
                                <h1 style="font-size: 22px" class="text-black my-3 fs-5 my-3">Bukti Upload Story</h1>
                                <div class="input-group mb-4">
                                    <input name="buktiupload" id="buktiupload" class="form-control shadow-none " type="file" accept="image/*">
                                </div>
                            <?php else : ?>
                                <h1 style="font-size: 22px" class="text-black my-3 fs-5 my-3">Bukti Upload Story</h1><br>
                                <img class="gbrtrf mb-4" src="../../admin/uploads/buktiupload/<?= $data['bukti_upload'] ?>?<?= time() ?>" alt="Bukti upload" style=""> <br>
                            <?php endif; ?>
                        </div>
                        <?php if ($data['verify'] == 2) : ?>
                            <button type="submit" style="font-size: 24px" class="btn btn-success text-white w-100 my-4">Edit Data</button>
                        <?php endif; ?>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function enableForm() {}
            $("#regist-form").on("submit", function(e) {
                e.preventDefault();
                const fd = new FormData($(this)[0]);
                $.ajax({
                    url: "edit.php",
                    method: "POST",
                    data: fd,
                    processData: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    success: (e) => {
                        if (!e.success_data && e.message != null && !e.success_data) {
                            Swal.fire({
                                icon: "error",
                                title: "Failed",
                                text: e.message,
                            });
                        } else if (e.success_data) {
                            if (!e.success_regist && e.message == '') {
                                Swal.fire({
                                    title: "Success",
                                    text: "Berhasil mengubah data",
                                    icon: "success"
                                }).then(function() {
                                    location.reload();
                                });
                            } else if (!e.success_regist && e.message != null) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Failed",
                                    text: e.message,
                                }).then(function() {
                                    location.reload();
                                });
                            } else if (e.success_regist) {
                                Swal.fire({
                                    title: "Success",
                                    text: e.message,
                                    icon: "success",
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    },
                    error: function(err) {
                        Swal.fire({
                            title: "Error",
                            text: "Terjadi kesalahan saat memproses data!",
                            icon: 'error',
                        }).then(function() {
                            location.reload();
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>