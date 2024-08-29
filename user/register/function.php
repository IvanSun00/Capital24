<?php


require "../conn.php";


use PHPMailer\PHPMailer\PHPMailer;

require_once '../../admin/pendaftaran/api/PHPMailer/PHPMailer.php';
require_once '../../admin/pendaftaran/api/PHPMailer/SMTP.php';
require_once '../../admin/pendaftaran/api/PHPMailer/Exception.php';

$success_regist = false;
$message = '';
$verifikasi = 3;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    header('Content-Type: application/json');

    echo json_encode([
        'success_regist' => false,
        'message' => "Pendaftaran sudah tutup"
    ]);
    return;

    $asalsekolah = trim($_POST['asalsekolah']);
    $namatim = trim($_POST['namatim']);
    $emailketua = $_POST['email'];
    $pass = $_POST['password'];

    $namaketua = ($_POST['namaketua']);
    $nomerwa = ($_POST['nomerwa']);
    $idline1 = ($_POST['idline1']);
    $alergi1 = ($_POST['alergi1']);
    $konsumsi1 = ($_POST['konsumsi1']);
    $fotodiri1 = ($_FILES['fotodiri1']['name']);
    $kartupelajar1 = ($_FILES['kartupelajar1']['name']);
    $namapeserta2 = ($_POST['namapeserta2']);
    $idline2 = ($_POST['idline2']);
    $alergi2 = ($_POST['alergi2']);
    $konsumsi2 = ($_POST['konsumsi2']);
    $fotodiri2 = ($_FILES['fotodiri2']['name']);
    $kartupelajar2 = ($_FILES['kartupelajar2']['name']);
    $namapeserta3 = ($_POST['namapeserta3']);
    $idline3 = ($_POST['idline3']);
    $alergi3 = ($_POST['alergi3']);
    $konsumsi3 = ($_POST['konsumsi3']);
    $fotodiri3 = ($_FILES['fotodiri3']['name']);
    $kartupelajar3 = ($_FILES['kartupelajar3']['name']);
    $namapeserta4 = ($_POST['namapeserta4']);
    $idline4 = ($_POST['idline4']);
    $alergi4 = ($_POST['alergi4']);
    $konsumsi4 = ($_POST['konsumsi4']);
    $fotodiri4 = ($_FILES['fotodiri4']['name']);
    $kartupelajar4 = ($_FILES['kartupelajar4']['name']);
    $buktitrf = (($_FILES['buktitrf']['name']));
    $buktiupload = (($_FILES['buktiupload']['name']));

    // Foto Diri 1
    $fotodiri1_name = $_FILES['fotodiri1']['name'];
    $fileExt1 = explode('.', $fotodiri1_name);
    $filetype1 = strtolower(end($fileExt1));
    $filetmpname1 = $_FILES['fotodiri1']['tmp_name'];

    // Kartu Pelajar 1
    $kartupelajar1_name = $_FILES['kartupelajar1']['name'];
    $fileExt2 = explode('.', $kartupelajar1_name);
    $filetype2 = strtolower(end($fileExt2));
    $filetmpname2 = $_FILES['kartupelajar1']['tmp_name'];

    // Foto Diri 2
    $fotodiri2_name = $_FILES['fotodiri2']['name'];
    $fileExt3 = explode('.', $fotodiri2_name);
    $filetype3 = strtolower(end($fileExt3));
    $filetmpname3 = $_FILES['fotodiri2']['tmp_name'];

    // Kartu Pelajar 2
    $kartupelajar2_name = $_FILES['kartupelajar2']['name'];
    $fileExt4 = explode('.', $kartupelajar2_name);
    $filetype4 = strtolower(end($fileExt4));
    $filetmpname4 = $_FILES['kartupelajar2']['tmp_name'];

    //Foto Diri 3
    $fotodiri3_name = $_FILES['fotodiri3']['name'];
    $fileExt5 = explode('.', $fotodiri3_name);
    $filetype5 = strtolower(end($fileExt5));
    $filetmpname5 = $_FILES['fotodiri3']['tmp_name'];

    // Kartu Pelajar 3
    $kartupelajar3_name = $_FILES['kartupelajar3']['name'];
    $fileExt6 = explode('.', $kartupelajar3_name);
    $filetype6 = strtolower(end($fileExt6));
    $filetmpname6 = $_FILES['kartupelajar3']['tmp_name'];

    //Foto Diri 4
    $fotodiri4_name = $_FILES['fotodiri4']['name'];
    $fileExt7 = explode('.', $fotodiri4_name);
    $filetype7 = strtolower(end($fileExt7));
    $filetmpname7 = $_FILES['fotodiri4']['tmp_name'];

    // Kartu Pelajar 4
    $kartupelajar4_name = $_FILES['kartupelajar4']['name'];
    $fileExt8 = explode('.', $kartupelajar4_name);
    $filetype8 = strtolower(end($fileExt8));
    $filetmpname8 = $_FILES['kartupelajar4']['tmp_name'];

    //Bukti Trf
    $buktitrf_name = $_FILES['buktitrf']['name'];
    $fileExt9 = explode('.', $buktitrf_name);
    $filetype9 = strtolower(end($fileExt9));
    $filetmpname9 = $_FILES['buktitrf']['tmp_name'];

    //Bukti Upload
    $buktiupload_name = $_FILES['buktiupload']['name'];
    $fileExt10 = explode('.', $buktiupload_name);
    $filetype10 = strtolower(end($fileExt10));
    $filetmpname10 = $_FILES['buktiupload']['tmp_name'];

    $allowed = array('jpg', 'png', 'jpeg');


    $cek_namatim = $conn->prepare("SELECT nama_kelompok FROM `kelompok` WHERE nama_kelompok = :namatim");
    $cek_namatim->bindParam(':namatim', $namatim);
    $cek_namatim->execute();

    $cek_email = $conn->prepare("SELECT * FROM kelompok where email =?");
    $cek_email->execute([$emailketua]);

    if (empty($namaketua)) {
        $message = 'Nama ketua masih kosong! Silahkan mengisi semua data!';
    } else if (empty($idline1)) {
        $message = 'ID Line peserta 1 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($nomerwa)) {
        $message = 'Nomor WhatsApp ketua masih kosong! Silahkan mengisi semua data!';
    } else if (empty($alergi1)) {
        $message = 'Informasi alergi peserta 1 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($konsumsi1)) {
        $message = 'Informasi konsumsi peserta 1 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($fotodiri1)) {
        $message = 'Foto diri peserta 1 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($kartupelajar1)) {
        $message = 'Kartu pelajar peserta 1 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($namapeserta2)) {
        $message = 'Nama peserta 2 masih kosong! Silahkan mengisi semua data!';
    } else  if (empty($idline2)) {
        $message = 'ID Line peserta 2 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($alergi2)) {
        $message = 'Informasi alergi peserta 2 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($konsumsi2)) {
        $message = 'Informasi konsumsi peserta 2 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($fotodiri2)) {
        $message = 'Foto diri peserta 2 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($kartupelajar2)) {
        $message = 'Kartu pelajar peserta 2 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($namapeserta3)) {
        $message = 'Nama peserta 3 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($idline3)) {
        $message = 'ID Line peserta 3 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($alergi3)) {
        $message = 'Informasi alergi peserta 3 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($konsumsi3)) {
        $message = 'Informasi konsumsi peserta 3 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($fotodiri3)) {
        $message = 'Foto diri peserta 3 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($kartupelajar3)) {
        $message = 'Kartu pelajar peserta 3 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($namapeserta4)) {
        $message = 'Nama peserta 4 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($idline4)) {
        $message = 'ID Line peserta 4 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($alergi4)) {
        $message = 'Informasi alergi peserta 4 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($konsumsi4)) {
        $message = 'Informasi konsumsi peserta 4 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($fotodiri4)) {
        $message = 'Foto diri peserta 4 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($kartupelajar4)) {
        $message = 'Kartu pelajar peserta 4 masih kosong! Silahkan mengisi semua data!';
    } else if (empty($asalsekolah)) {
        $message = 'Asal sekolah masih kosong!';
    } else if (empty($namatim)) {
        $message = 'Nama tim masih kosong!';
    } else if (empty($buktiupload)) {
        $message = 'Bukti upload story masih kosong!';
    } else if (empty($buktitrf)) {
        $message = 'Bukti transfer masih kosong!';
    } else if (empty($emailketua)) {
        $message = "Email Ketua Tim masih kosong!";
    } else if (mb_strlen($namatim) < 3 || mb_strlen($namatim) > 20) {
        $message = 'Nama tim tidak boleh kurang dari 3 dan lebih dari 20';
    } else if (mb_strlen($asalsekolah) < 5 || mb_strlen($asalsekolah) > 50) {
        $message = 'Asal sekolah tidak boleh kurang dari 5 dan lebih dari 50';
    } else if ($cek_namatim->rowCount() > 0) {
        $message = 'Nama tim sudah digunakan!';
    } else if ($cek_email->rowCount() > 0) {
        $message = 'Email Ketua telah digunakan';
    } else if (!filter_var($emailketua, FILTER_VALIDATE_EMAIL)) {
        $message = "Format Email Ketua tidak valid";
    } else if (!in_array($filetype1, $allowed) || !in_array($filetype2, $allowed) || !in_array($filetype3, $allowed) || !in_array($filetype4, $allowed) || !in_array($filetype5, $allowed) || !in_array($filetype6, $allowed) || !in_array($filetype7, $allowed) || !in_array($filetype8, $allowed) || !in_array($filetype9, $allowed) || !in_array($filetype10, $allowed)) {
        $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
    } else if (strlen($pass) < 8) {
        $message = 'Password minimal memiliki 8 karakter';
    } else {
        $success_regist = true;

        //Leader Foto Diri
        $filenamenew1 = $namaketua . $namatim . '.' . $filetype1;
        $fileDestination3x4 = '../../admin/uploads/foto3x4/';
        $targetDir1 = $fileDestination3x4 . $filenamenew1;
        $moveLD1 = move_uploaded_file($filetmpname1, $targetDir1);

        if (!$moveLD1)
            $message = 'An Error occured while uploading "Foto 3x4 Peserta 1".';

        //Leader Foto Kartu Pelajar
        $filenamenew2 = $namaketua . $namatim . '.' . $filetype2;
        $fileDestinationkp = '../../admin/uploads/fotokartupelajar/';
        $targetDir2 = $fileDestinationkp . $filenamenew2;
        $moveLD2 = move_uploaded_file($filetmpname2, $targetDir2);

        if (!$moveLD2)
            $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 1".';

        //Peserta 2 Foto Diri
        $filenamenew3 = $namapeserta2 . $namatim . '.' . $filetype3;
        $targetDir3 = $fileDestination3x4 . $filenamenew3;
        $moveSM1 = move_uploaded_file($filetmpname3, $targetDir3);

        if (!$moveSM1)
            $message = 'An Error occured while uploading "Foto 3x4 Peserta 2".';

        //Peserta 2 Kartu Pelajar
        $filenamenew4 = $namapeserta2 . $namatim . '.' . $filetype4;
        $targetDir4 = $fileDestinationkp . $filenamenew4;
        $moveSM2 = move_uploaded_file($filetmpname4, $targetDir4);

        if (!$moveSM2)
            $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 2".';

        //Peserta 3 Foto Diri
        $filenamenew5 = $namapeserta3 . $namatim . '.' . $filetype5;
        $targetDir5 = $fileDestination3x4 . $filenamenew5;
        $moveTM1 = move_uploaded_file($filetmpname5, $targetDir5);

        if (!$moveTM1)
            $message = 'An Error occured while uploading "Foto 3x4 Peserta 3".';

        //Peserta 3 Kartu Pelajar
        $filenamenew6 = $namapeserta3 . $namatim . '.' . $filetype6;
        $targetDir6 = $fileDestinationkp . $filenamenew6;
        $moveTM2 = move_uploaded_file($filetmpname6, $targetDir6);

        if (!$moveTM2)
            $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 3".';

        //Peserta 4 Foto Diri
        $filenamenew7 = $namapeserta4 . $namatim . '.' . $filetype7;
        $targetDir7 = $fileDestination3x4 . $filenamenew7;
        $moveTT1 = move_uploaded_file($filetmpname7, $targetDir7);

        if (!$moveTT1)
            $message = 'An Error occured while uploading "Foto 3x4 Peserta 4".';

        //Peserta 4 Kartu Pelajar
        $filenamenew8 = $namapeserta4 . $namatim . '.' . $filetype8;
        $targetDir8 = $fileDestinationkp . $filenamenew8;
        $moveTT2 = move_uploaded_file($filetmpname8, $targetDir8);

        if (!$moveTT2)
            $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 4".';

        //Bukti Trf
        $filenamenew9 = 'buktitransfer' . $namatim . '.' . $filetype9;
        $fileDestinationtrf = '../../admin/uploads/buktitransfer/';
        $targetDir9 = $fileDestinationtrf . $filenamenew9;
        $moveTR = move_uploaded_file($filetmpname9, $targetDir9);

        if (!$moveTR)
            $message = 'An Error occured while uploading "Bukti Transfer".';

        //Bukti Upload
        $filenamenew10 = 'buktiupload' . $namatim . '.' . $filetype10;
        $fileDestinationupload = '../../admin/uploads/buktiupload/';
        $targetDir10 = $fileDestinationupload . $filenamenew10;
        $moveUP = move_uploaded_file($filetmpname10, $targetDir10);

        if (!$moveUP)
            $message = 'An Error occured while uploading "Bukti Upload".';

        $insert_data = $conn->prepare("INSERT INTO `kelompok` SET asal_sekolah = ?, nama_kelompok =?, nama_ketua = ?, no_whatsapp = ?, id_line_ketua = ?, alergi_ketua = ?, konsumsi_ketua = ?, foto_diri_ketua = ?, kartu_pelajar_ketua = ?, nama_peserta2 = ?, id_line2 = ?, alergi_peserta2 = ?, konsumsi_peserta2 = ?, foto_diri_peserta2 = ?, kartu_pelajar2 = ?, nama_peserta3 = ?, id_line3 = ?, alergi_peserta3 = ?, konsumsi_peserta3 = ?, foto_diri_peserta3 = ?, kartu_pelajar3 = ?, nama_peserta4 = ?, id_line4 = ?, alergi_peserta4 = ?, konsumsi_peserta4 = ?, foto_diri_peserta4 = ?, kartu_pelajar4 = ?, verify = ?, bukti_transfer = ?, bukti_upload = ?, email = ?, `password` = ?");
        // password hash
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $insert_data->execute([$asalsekolah, $namatim, $namaketua, $nomerwa, $idline1, $alergi1, $konsumsi1, $filenamenew1, $filenamenew2, $namapeserta2, $idline2, $alergi2, $konsumsi2, $filenamenew3, $filenamenew4, $namapeserta3, $idline3, $alergi3, $konsumsi3, $filenamenew5, $filenamenew6, $namapeserta4, $idline4, $alergi4, $konsumsi4, $filenamenew7, $filenamenew8, $verifikasi, $filenamenew9, $filenamenew10, $emailketua, $hash]);

        if ($insert_data) {
            $message = 'Data berhasil dimasukkan !!';

            $mail = new PHPMailer();
            $name = 'CAPITAL 2024';
            $subject = 'CAPITAL Registration';
            $email = $emailketua;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'capital.cbi@petra.ac.id';
            $mail->Password = 'zxlo exht siha ppaa';
            $mail->Port = 587; //465->SSL 587->TLS
            $mail->SMTPSecure = 'tls'; // 'tls'

            //Email Setting
            $mail->isHTML(true);
            $mail->setFrom($mail->Username, $name);
            $mail->addAddress($email);
            $mail->Subject = $subject;

            $body =
                '<body>
                <div class="wrapper"
                    style="padding: 20px; height:fit-content; margin:0 auto; margin-top: 2%; min-width: 200px; width: 380px; background-color: #b4cee8; border: 2px solid black; border-radius: 10px;">
                    <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG"
                        style="height: 80px;border-radius:100px; display: block;margin: auto;">
            
                    <h2 style="text-align: center; font-weight: 600; color: black;">Hello, ' . $namatim . '!</h2>
            
                    <p style="text-align: center; color: black;">Terima kasih telah mendaftar CAPITAL 2024!!</p>
            
                    <div>
                        <img style="text-align: center; margin-top: 30px; width: 40px; display: block; margin-left: auto;  margin-right: auto;"
                            src="https://img.icons8.com/pastel-glyph/64/ffffff/clipboard-approve--v1.png" />
                    </div>

                    <div class="container" style="padding: 16px;">
                        <h4 style="text-align: center; color: black;">Silakan menunggu email dan perubahan status di website. Jika dalam 3 hari belum mendapatkan email validasi atau status validasi di website masih "pending", silakan chat: </h4>
            
                        <button type="submit" style="background-color: #79a2df; color: black; border: none; cursor: pointer; width: 60%; margin: 5px auto; padding: 8px; border-radius: 50px; border: 2px solid black; display:block; text-align:center;
                                            ">
                            <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=651ujcmf"
                                style="color:black; text-decoration: none;" target="_blank">OA Line: @651ujcmf</a>
                        </button>

                        <button type="submit" style="background-color: #79a2df; color: black; border: none; cursor: pointer; width: 60%; margin: 0 auto; padding: 8px; border-radius: 50px; border: 2px solid black; display:block; text-align:center;
                                            ">
                                    <a href="https://wa.me/6281336536388"
                                        style="color:black; text-decoration: none;" target="_blank">WhatsApp: +62 813 3653 6388</a>
                        </button>
                    </div>
                </div>
            </body>';

            $mail->Body = $body;
            $check = $mail->send();
        } else {
            $message = "Terjadi kesalahaan saat memasukkan data, silahkan ulangi kembali!";
        }
    }

    echo json_encode([
        'success_regist' => $success_regist,
        'message' => $message
    ]);
}
