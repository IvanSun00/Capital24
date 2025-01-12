<?php
require_once "../conn.php";
$output = '';

use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!isset($_SESSION['nrp']) || $_SESSION['nrp'] == "") {
        $output = "session//index.php";
        echo $output;
        exit();
    }
    $nrp_panit = $_SESSION['nrp'];

    //GET ID PANITIA
    $getIDSql = "SELECT * FROM `panitia` WHERE nrp = ?";
    $getIDAction = $conn->prepare($getIDSql);
    $getIDAction->execute([$nrp_panit]);
    $getIDRow = $getIDAction->fetch();
    $idPanit = $getIDRow['id'];

    //get data admin berdarsarkan id
    if (isset($_POST['for']) && $_POST['for'] != "" && $_POST['for'] == "getAdmin" && isset($_POST['nrp']) && $_POST['nrp'] != "") {
        $nrp = $_POST['nrp'];

        //ambil data
        $getAdminSql = "SELECT p.nama,d.nama as divisi FROM `panitia` p join divisi d on p.id_divisi = d.id WHERE nrp = ?";
        $getAdminAction = $conn->prepare($getAdminSql);
        $getAdminAction->execute([$nrp]);
        $getAdminRow = $getAdminAction->fetch(PDO::FETCH_ASSOC);

        echo json_encode($getAdminRow);
        exit();
    }

    // New Admin 
    if (isset($_POST['for']) && $_POST['for'] != "" && $_POST['for'] == "addAdmin" && isset($_POST['nrp']) && $_POST['nrp'] != "" && isset($_POST['nama']) && $_POST['nama'] != "" && isset($_POST['divisi']) && $_POST['divisi'] != "") {
        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $divisi = $_POST['divisi'];

        //cek apakah sudah admin
        $cekAdminSql = "SELECT * FROM `panitia` WHERE nrp = ? and is_admin = 1 and nama = ?";
        $cekAdminAction = $conn->prepare($cekAdminSql);
        $cekAdminAction->execute([$nrp, $nama]);
        $checkAdminCount = $cekAdminAction->rowCount();

        if ($checkAdminCount == 1) {
            $output .= 'already//';
        } else {
            //jadikan admin
            $updateAdmin = "UPDATE panitia SET is_admin = 1 WHERE nrp = ?";
            $updateAdminAction = $conn->prepare($updateAdmin);
            $updateAdminAction->execute([$nrp]);

            if ($updateAdminAction) {
                $output .= 'success//';
            } else {
                $output .= 'error//';
            }
        }
    }


    //GET DATA ALL PENDAFTAR
    if (isset($_POST['for']) && $_POST['for'] != "" && $_POST['for'] == "getData") {
        $output .= "success//";

        //GET PENDAFTAR YANG SUDAH NDAFTAR
        $getDataSql = "SELECT * FROM `kelompok` WHERE verify != 0 ORDER BY tanggal_daftar DESC";
        $getDataAction = $conn->prepare($getDataSql);
        $getDataAction->execute();

        $i = 1;
        while ($getDataRow = $getDataAction->fetch()) {
            $newDate = date("d-m-Y", strtotime($getDataRow['tanggal_daftar']));
            $output .= '<tr class="mid">
                                <td>' . $i++ . '</td>
                                <td>' . $getDataRow['nama_kelompok'] . '</td>
                                <td>' . $getDataRow['asal_sekolah'] . '</td>
                                <td>' . $getDataRow['email'] . '</td>
                                <td>' . $getDataRow['no_whatsapp'] . '</td>
                                <td>' . $getDataRow['id_line_ketua'] . '</td>
                                <td><button type="button" class="btn btn-primary detail">View</button></td>
                                <td>' . $newDate . '</td>
                                <td><button type="button" data-val="' . $getDataRow['bukti_transfer'] . '?' . time() . '" class="btn btn-warning bukti-tarif">View</button></td>
                                <td><button type="button" data-val="' . $getDataRow['bukti_upload'] . '?' . time() . '" class="btn btn-warning bukti-upload">View</button></td>';



            if ($getDataRow['verify'] == 1) {
                $getAdminSql = "SELECT * FROM `panitia` WHERE id = ?";
                $getAdminAction = $conn->prepare($getAdminSql);
                $getAdminAction->execute([$getDataRow['validasi_by']]);
                $getAdminRow = $getAdminAction->fetch();
                $namaPanit = $getAdminRow['nama'];
                $output .= '<td style="color: red;"><i class="fas fa-times-circle"></i><br>
                                Rejected By<br><span style="font-weight: bold;">' . $namaPanit . '</span></td>';
            } else if ($getDataRow['verify'] == 2) {
                $output .= '<td class="nunggu" data-val="' . $getDataRow['pesan'] . '"><div id="rotate"><i class="fas fa-hourglass-half"></i></div>Waiting for Data Completion</td>';
            } else if ($getDataRow['verify'] == 3) {
                $output .= '<td><button type="button" class="btn btn-success valid">Validasi</button></td>';
            } else if ($getDataRow['verify'] == 4) {
                $getAdminSql = "SELECT * FROM `panitia` WHERE id = ?";
                $getAdminAction = $conn->prepare($getAdminSql);
                $getAdminAction->execute([$getDataRow['validasi_by']]);
                $getAdminRow = $getAdminAction->fetch();
                $namaPanit = $getAdminRow['nama'];
                $output .= '<td style="color: green;"><i class="fas fa-check-circle"></i><br>
                                Validated By<br><span style="font-weight: bold;">' . $namaPanit . '</span></td>';
            }
            $output .= '<td>' . $getDataRow['pesan'] . '</td>';
            $output .= '</tr>';
        }
    }

    //GET DETAIL KELOMPOK
    if (isset($_POST['for']) && $_POST['for'] != "" && isset($_POST['email']) && $_POST['email'] != "" && $_POST['for'] == "detailAnggota") {
        $output .= "success//";
        $email = $_POST['email'];
        $satu = '';
        $dua = '';
        $tiga = '';
        $empat = '';

        //GET ID KELOMPOK
        $getIDSql = "SELECT * FROM `kelompok` WHERE email = ?";
        $getIDAction = $conn->prepare($getIDSql);
        $getIDAction->execute([$email]);
        $getIDRow = $getIDAction->fetch();
        $idKelompok = $getIDRow['id'];

        //GET SEMUA ANGGOTA KELOMPOK
        $getDataSql = "SELECT * FROM `kelompok` WHERE id = ?";
        $getDataAction = $conn->prepare($getDataSql);
        $getDataAction->execute([$idKelompok]);
        $getDataRow = $getDataAction->fetch();
        $satu .= '<div class="row justify-content-center mb-4"><div class="col-9"><label for="exampleFormControlInput' . $getDataRow['id'] . '" class="form-label tebal" style="text-align: center;">Nama Lengkap</label><input type="text" class="form-control" id="exampleFormControlInput' . $getDataRow['id'] . '" value="' . $getDataRow['nama_ketua'] . '" disabled></div></div>
        <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">No. WhatsApp</label><input type="text" class="form-control" value="' . $getDataRow['no_whatsapp'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Jenis Konsumsi</label><input type="text" class="form-control" value="' . $getDataRow['konsumsi_ketua'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Alergi</label><input type="text" class="form-control" value="' . $getDataRow['alergi_ketua'] . '" disabled></div></div>
        <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Pas Foto</div><div class="col-12"><img class="img-custom" src="../uploads/foto3x4/' . $getDataRow['foto_diri_ketua'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1 mb-4">Click to enlarge image</span><div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Kartu Pelajar</div><div class="col-12"><img class="img-custom" src="../uploads/fotokartupelajar/' . $getDataRow['kartu_pelajar_ketua'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1">Click to enlarge image</span>';
        $dua .= '<div class="row justify-content-center mb-4">
            <div class="col-9"><label for="exampleFormControlInput' . $getDataRow['id'] . '" class="form-label tebal" style="text-align: center;">Nama Lengkap</label><input type="text" class="form-control" id="exampleFormControlInput' . $getDataRow['id'] . '" value="' . $getDataRow['nama_peserta2'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">No. WhatsApp</label><input type="text" class="form-control" value="' . $getDataRow['id_line2'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Jenis Konsumsi</label><input type="text" class="form-control" value="' . $getDataRow['konsumsi_peserta2'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Alergi</label><input type="text" class="form-control" value="' . $getDataRow['alergi_peserta2'] . '" disabled></div></div>
            <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Pas Foto</div>
            <div class="col-12"><img class="img-custom" src="../uploads/foto3x4/' . $getDataRow['foto_diri_peserta2'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1 mb-4">Click to enlarge image</span>
            <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Kartu Pelajar</div><div class="col-12"><img class="img-custom" src="../uploads/fotokartupelajar/' . $getDataRow['kartu_pelajar2'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1">Click to enlarge image</span>';
        $tiga .= '<div class="row justify-content-center mb-4">
            <div class="col-9"><label for="exampleFormControlInput' . $getDataRow['id'] . '" class="form-label tebal" style="text-align: center;">Nama Lengkap</label><input type="text" class="form-control" id="exampleFormControlInput' . $getDataRow['id'] . '" value="' . $getDataRow['nama_peserta3'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">No. WhatsApp</label><input type="text" class="form-control" value="' . $getDataRow['id_line3'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Jenis Konsumsi</label><input type="text" class="form-control" value="' . $getDataRow['konsumsi_peserta3'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Alergi</label><input type="text" class="form-control" value="' . $getDataRow['alergi_peserta3'] . '" disabled></div></div>
            <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Pas Foto</div>
            <div class="col-12"><img class="img-custom" src="../uploads/foto3x4/' . $getDataRow['foto_diri_peserta3'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1 mb-4">Click to enlarge image</span>
            <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Kartu Pelajar</div><div class="col-12"><img class="img-custom" src="../uploads/fotokartupelajar/' . $getDataRow['kartu_pelajar3'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1">Click to enlarge image</span>';
        $empat .= '<div class="row justify-content-center mb-4">
            <div class="col-9"><label for="exampleFormControlInput' . $getDataRow['id'] . '" class="form-label tebal" style="text-align: center;">Nama Lengkap</label><input type="text" class="form-control" id="exampleFormControlInput' . $getDataRow['id'] . '" value="' . $getDataRow['nama_peserta4'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">No. WhatsApp</label><input type="text" class="form-control" value="' . $getDataRow['id_line4'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Jenis Konsumsi</label><input type="text" class="form-control" value="' . $getDataRow['konsumsi_peserta4'] . '" disabled></div></div>
            <div class="row justify-content-center mb-4">
            <div class="col-9"><label class="form-label tebal" style="text-align: center;">Alergi</label><input type="text" class="form-control" value="' . $getDataRow['alergi_peserta4'] . '" disabled></div></div>
            <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Pas Foto</div>
            <div class="col-12"><img class="img-custom" src="../uploads/foto3x4/' . $getDataRow['foto_diri_peserta4'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1 mb-4">Click to enlarge image</span>
            <div class="row justify-content-center"><div class="col-12 text-center mb-2 tebal">Kartu Pelajar</div><div class="col-12"><img class="img-custom" src="../uploads/fotokartupelajar/' . $getDataRow['kartu_pelajar4'] . '?' . time() . '" alt=""></div></div><span class="row justify-content-center mt-1">Click to enlarge image</span>';
        $output .= $satu . '//' . $dua . '//' . $tiga . '//' . $empat;
    }


    //VALIDASI KELOMPOK
    else if (isset($_POST['for']) && $_POST['for'] == 'validasi' && $_POST['for'] != "" && isset($_POST['email']) && $_POST['email'] != "") {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $emailKelompok = $_POST['email'];

        //GET ID KELOMPOK
        $getIDSql = "SELECT * FROM `kelompok` WHERE email = ?";
        $getIDAction = $conn->prepare($getIDSql);
        $getIDAction->execute([$emailKelompok]);
        $getIDRow = $getIDAction->fetch();
        $idKelompok = $getIDRow['id'];
        $namaKelompok = $getIDRow['nama_kelompok'];

        //CHECK APAKAH SUDAH DI UPDATE
        if ($getIDRow['verify'] != 3 && $getIDRow['verify'] != 2) {
            $output .= 'already//';
            echo $output;
            exit();
        } else {
            //EMAIL
            $mail = new PHPMailer();
            $name = 'CAPITAL 2024';
            $subject = 'CAPITAL Registration';
            $email = $emailKelompok;

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

            //perlu ganti path image
            $body =
                '<body>
                <div class="wrapper"
                    style="padding: 20px; height:fit-content; margin:0 auto; margin-top: 2%; min-width: 200px; width: 380px; background-color: #b4cee8; border: 2px solid black; border-radius: 10px;">
                    <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG"
                        style="height: 80px;border-radius:100px; display: block;margin: auto;">
            
                    <h2 style="text-align: center; font-weight: 600; color: black;">Hello, ' . $namaKelompok . '!</h2>
            
                    <h4 style="text-align: center; color: black;">Your CAPITAL 2024 registration has been validated!</h4>
            
                    <div>
                        <img style="text-align: center; margin: 40px auto; width: 40px; display: block;"
                            src="https://img.icons8.com/pastel-glyph/64/ffffff/clipboard-approve--v1.png" />
                    </div>
            
                    <p style="text-align: center; color: black; margin-top: 30px; margin-bottom: 0" >Make sure to recheck your status on our website.</p>
                    <a href="https://capital.petra.ac.id" style="text-align: center; color:black;"
                        target="_blank">
                        <h3>capital.petra.ac.id</h3>
                    </a>
            
                    <h4 style="text-align: center; color: black; margin-top: 30px; font-weight: 400">For all group leaders, it\'s mandatory to join
                        the WhatsApp group so you don\'t miss the latest info.</h4>
                    <button type="submit"
                        style="background-color: #a59aea; color: black; border: none; cursor: pointer; width: 60%; margin: 5px auto; border-radius: 50px; border: 2px solid black; display:block; text-align:center;">
                        <a href="https://chat.whatsapp.com/Dc9BMTXuPvGBb9JaRVl4SK" style="color:black; text-decoration: none;"
                            target="_blank">
                            <h3>JOIN NOW!</h3>
                        </a>
                    </button>
            
                    <h3 style="text-align: center; color: black; margin-top: 30px;">Get your team ready for CAPITAL 2024</h3>
                    <div class="container" style="padding: 16px;">
                        <p style="text-align: center; color: black;">Any problems regarding registration? <br>
                            Contact us through</p>
            
                        <button type="submit" style="background-color: #79a2df; color: black; border: none; cursor: pointer; width: 60%; margin: 0 auto; padding: 8px; border-radius: 50px; border: 2px solid black; display:block; text-align:center;
                                            ">
                            <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=651ujcmf"
                                style="color:black; text-decoration: none;" target="_blank">OA Line: @651ujcmf</a>
                        </button>

                        <button type="submit" class="mt-4" style="background-color: #79a2df; color: black; border: none; cursor: pointer; width: 60%; margin: 10px auto; padding: 8px; border-radius: 50px; border: 2px solid black; display:block; text-align:center;
                                            ">
                            <a href="https://wa.me/6281336536388"
                                style="color:black; text-decoration: none;" target="_blank">WhatsApp: +62 813 3653 6388</a>
                        </button>
                    </div>
                </div>
            </body>';

            $mail->Body = $body;
            $check = $mail->send();

            if ($check) { //error di emailnya gk kekirim
                // if(true){

                //UPDATE TEAM
                $updateTeamsql = "UPDATE `kelompok` SET verify= 4, pesan = NULL, validasi_by = ? WHERE id = ?";
                $updateTeamstmt = $conn->prepare($updateTeamsql);
                $updateTeamstmt->execute([$idPanit, $idKelompok]);
                if ($updateTeamstmt) {
                    $output .= 'success//';
                } else {
                    $output .= 'error!';
                }
            } else {
                $output .= 'error';
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    }


    //DATA KELOMPOK TIDAK VALID, UPLOAD ULANG
    else if (isset($_POST['for']) && $_POST['for'] == 'lengkapiData' && $_POST['for'] != "" && isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['text']) && $_POST['text'] != "") {
        $emailKelompok = $_POST['email'];
        $kurang = $_POST['text'];

        //GET ID KELOMPOK
        $getIDSql = "SELECT * FROM `kelompok` WHERE email = ?";
        $getIDAction = $conn->prepare($getIDSql);
        $getIDAction->execute([$emailKelompok]);
        $getIDRow = $getIDAction->fetch();
        $idKelompok = $getIDRow['id'];
        $namaKelompok = $getIDRow['nama_kelompok'];

        if ($getIDRow['verify'] != 3) {
            $output .= 'already//';
            echo $output;
            exit();
        } else {
            //EMAIL
            $mail = new PHPMailer();
            $name = 'CAPITAL 2024';
            $subject = 'CAPITAL Registration';
            // $email = "c14210109@john.petra.ac.id";
            $email = $emailKelompok;

            //SMTP Setting
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
                        
                    <div class="wrapper" style="padding: 20px; height:fit-content; margin:0 auto; margin-top: 2%; min-width: 200px; width: 380px; background-color: #b4cee8; border: 2px solid black; border-radius: 10px;">
                        <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG" style="height: 70px;  border-radius:100px; display: block;margin: auto;">
                    
                            <h2 style="text-align: center; font-weight: 600; color: #2c1a47;">Hello, ' . $namaKelompok . '!</h2>

                            <p style="text-align: center; color: #2c1a47;">Registration was not completed.<br>Please upload the right document!</p>

                            <p style="text-align: center; color: #2c1a47;">' . $kurang . '</p>
                            <p style="text-align: center; color: #2c1a47;">Masuk ke website <a href="https://capital.petra.ac.id/">capital.petra.ac.id</a>. Kemudian, pencet tombol Sign In. Ubah data/document yang salah, lalu jangan lupa pencet tombol Edit Data.</p>
                            
                           
                            <div class="container" style="padding: 16px;">
                                <h4 style="text-align: center; color: #2c1a47;">If you have any questions, please contact:</h4>

                                <button type="submit" style="background-color: #79a2df; color: black; border: none; cursor: pointer; width: 60%; margin: 5px auto; padding: 8px; border-radius: 50px; border: 2px solid black; display:block; text-align:center;
                                ">
                                    <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=651ujcmf" style="color:black; text-decoration: none;" target="_blank">OA Line: @651ujcmf</a>
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

            if ($mail->send()) {
                // if(true){
                //UPDATE TEAM
                $updateTeamsql = "UPDATE `kelompok` SET `verify`= 2, validasi_by = NULL, pesan = ? WHERE id = ?";
                $updateTeamstmt = $conn->prepare($updateTeamsql);
                $updateTeamstmt->execute([$kurang, $idKelompok]);

                if ($updateTeamstmt) {
                    $output .= 'success//';
                } else {
                    $output .= 'error';
                }
            } else {
                $output .= 'error';
            }
        }
    }


    //TOLAK KELOMPOK
    else if (isset($_POST['for']) && $_POST['for'] == 'tolak' && $_POST['for'] != "" && isset($_POST['email']) && $_POST['email'] != "") {
        $emailKelompok = $_POST['email'];

        //GET ID KELOMPOK
        $getIDSql = "SELECT * FROM `kelompok` WHERE email = ?";
        $getIDAction = $conn->prepare($getIDSql);
        $getIDAction->execute([$emailKelompok]);
        $getIDRow = $getIDAction->fetch();
        $idKelompok = $getIDRow['id'];
        $namaKelompok = $getIDRow['nama_kelompok'];

        if ($getIDRow['verify'] != 3) {
            $output .= 'already//';
            echo $output;
            exit();
        } else {
            //EMAIL
            $mail = new PHPMailer();
            $name = 'CAPITAL 2024';
            $subject = 'CAPITAL Registration';
            $email = $emailKelompok;

            //SMTP Setting
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
                    <div class="wrapper" style="padding: 20px; height:fit-content; margin:0 auto; margin-top: 2%; min-width: 200px; width: 380px; background-color: #b4cee8; border: 2px solid black; border-radius: 10px;">
                        <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG" style="height: 80px;border-radius:100px; display: block;margin: auto;">
                        
                        <h2 style="text-align: center; font-weight: 600; color: black;">Hello, ' . $namaKelompok . '!</h2>

                            <p style="text-align: center; color: black;">Your team registration has been rejected!</p>

                            <div>
                                <img style="text-align: center; margin-top: 30px; width: 40px; display: block; margin-left: auto;  margin-right: auto;" src="https://img.icons8.com/ios-filled/50/ffffff/dislike.png"/>
                            </div>

                            <div class="container" style="padding: 16px;">
                                <h4 style="text-align: center; color: black;">If you have any questions, please contact:</h4>

                                <button type="submit" style="background-color: #79a2df; color: black; border: none; cursor: pointer; width: 60%; margin: 5px auto; padding: 8px; border-radius: 50px; border: 2px solid black; display:block; text-align:center;
                                ">
                                    <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=651ujcmf" style="color:black; text-decoration: none;" target="_blank">OA Line: @651ujcmf</a>
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

            if ($check) {
                // if(true){
                //UPDATE TEAM
                $updateTeamsql = "UPDATE `kelompok` SET `verify`= 1, pesan = NULL, validasi_by = ? WHERE id = ?";
                $updateTeamstmt = $conn->prepare($updateTeamsql);
                $updateTeamstmt->execute([$idPanit, $idKelompok]);

                if ($updateTeamstmt) {
                    $output .= 'success//';
                } else {
                    $output .= 'error//';
                }
            } else {
                $output .= 'error//';
            }
        }
    }
} else {
    $output = "error//";
}

echo $output;
