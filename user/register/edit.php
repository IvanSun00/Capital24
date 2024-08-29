<?php

require "../conn.php";

$success_regist = false;
$success_data = false;
$message = '';
$verifikasi = 3;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $allowed = array('jpg', 'png', 'jpeg');
    header('Content-Type: application/json');

    $id_kelompok = $_SESSION['kelompok'];

    $stmt = $conn->prepare('SELECT * FROM kelompok where id=?');
    $stmt->execute([$id_kelompok]);
    $data = $stmt->fetch();

    $email = $data['email'];
    $nama_kelompok = $data['nama_kelompok'];
    $namaketua = ($_POST['namaketua']);
    $nomerwa = ($_POST['nomerwa']);
    $idline1 = ($_POST['idline1']);
    $alergi1 = ($_POST['alergi1']);
    $konsumsi1 = ($_POST['konsumsi1']);
    $namapeserta2 = ($_POST['namapeserta2']);
    $idline2 = ($_POST['idline2']);
    $alergi2 = ($_POST['alergi2']);
    $konsumsi2 = ($_POST['konsumsi2']);
    $namapeserta3 = ($_POST['namapeserta3']);
    $idline3 = ($_POST['idline3']);
    $alergi3 = ($_POST['alergi3']);
    $konsumsi3 = ($_POST['konsumsi3']);
    $namapeserta4 = ($_POST['namapeserta4']);
    $idline4 = ($_POST['idline4']);
    $alergi4 = ($_POST['alergi4']);
    $konsumsi4 = ($_POST['konsumsi4']);
    $fileDestinationkp = '../../admin/uploads/fotokartupelajar/';
    $fileDestination3x4 = '../../admin/uploads/foto3x4/';


    //Edit Data Yang Lain
    if (empty($namaketua) || empty($idline1) || empty($nomerwa) || empty($alergi1) || empty($konsumsi1) || empty($namapeserta2) || empty($idline2) || empty($alergi2) || empty($konsumsi2) || empty($namapeserta3) || empty($idline3) || empty($alergi3) || empty($konsumsi3) || empty($namapeserta4) || empty($idline4) || empty($alergi4) || empty($konsumsi4)) {
        $message = 'Data diri masih ada yang kosong! Silahkan mengisi semua data!';
    } else {
        $sqlInsert = "UPDATE `kelompok` SET nama_ketua = ?, no_whatsapp = ?, id_line_ketua = ?, alergi_ketua = ?, konsumsi_ketua = ?, nama_peserta2 = ?, id_line2 = ?, alergi_peserta2 = ?, konsumsi_peserta2 = ?, nama_peserta3 = ?, id_line3 = ?, alergi_peserta3 = ?, konsumsi_peserta3 = ?, nama_peserta4 = ?, id_line4 = ?, alergi_peserta4 = ?, konsumsi_peserta4 = ? WHERE id = ?";
        $insertStmt = $conn->prepare($sqlInsert);
        $insertStmt->execute([$namaketua, $nomerwa, $idline1, $alergi1, $konsumsi1, $namapeserta2, $idline2, $alergi2, $konsumsi2, $namapeserta3, $idline3, $alergi3, $konsumsi3, $namapeserta4, $idline4, $alergi4, $konsumsi4, $id_kelompok]);
        if (!$insertStmt) {
            $message = 'Gagal mengubah data';
        } else {
            $success_data = true;

            //Ketua (Foto Diri)
            $fotodiri1 = ($_FILES['fotodiri1']['name']);
            if ($fotodiri1) {
                $fotodiri1_name = $_FILES['fotodiri1']['name'];
                $fileExt1 = explode('.', $fotodiri1_name);
                $filetype1 = strtolower(end($fileExt1));
                $filetmpname1 = $_FILES['fotodiri1']['tmp_name'];

                if (!in_array($filetype1, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    $filenamenew1 = $namaketua . $nama_kelompok . '.' . $filetype1;
                    $targetDir1 = $fileDestination3x4 . $filenamenew1;
                    $moveLD1 = move_uploaded_file($filetmpname1, $targetDir1);

                    if (!$moveLD1) {
                        $message = 'Error saat mengupload foto';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET foto_diri_ketua = ?,verify = ? where email = ?");
                        $insert_data->execute([$filenamenew1, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            //foto kartu pelajar ketua
            $kartupelajar1 = ($_FILES['kartupelajar1']['name']);

            if ($kartupelajar1) {
                // Foto pelajar 1
                $kartupelajar1_name = $_FILES['kartupelajar1']['name'];
                $fileExt2 = explode('.', $kartupelajar1_name);
                $filetype2 = strtolower(end($fileExt2));
                $filetmpname2 = $_FILES['kartupelajar1']['tmp_name'];
                if (!in_array($filetype2, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    //Foto pelajar 1
                    $filenamenew2 = $namaketua . $nama_kelompok . '.' . $filetype2;

                    $targetDir2 = $fileDestinationkp . $filenamenew2;
                    $moveLD2 = move_uploaded_file($filetmpname2, $targetDir2);

                    if (!$moveLD2) {
                        $message = 'Error saat mengupload foto';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET kartu_pelajar_ketua = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew2, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            //foto peserta 2

            $fotodiri2 = ($_FILES['fotodiri2']['name']);

            if ($fotodiri2) {
                // Foto Diri 2
                $fotodiri2_name = $_FILES['fotodiri2']['name'];
                $fileExt3 = explode('.', $fotodiri2_name);
                $filetype3 = strtolower(end($fileExt3));
                $filetmpname3 = $_FILES['fotodiri2']['tmp_name'];
                if (!in_array($filetype3, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {

                    $filenamenew3 = $namapeserta2 . $nama_kelompok . '.' . $filetype3;
                    $targetDir3 = $fileDestination3x4 . $filenamenew3;
                    $moveSM1 = move_uploaded_file($filetmpname3, $targetDir3);

                    if (!$moveSM1) {
                        $message = 'Error saat mengupload foto';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET foto_diri_peserta2 = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew3, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            //foto kartu peljar peserta 2
            $kartupelajar2 = ($_FILES['kartupelajar2']['name']);

            if ($kartupelajar2) {
                $kartupelajar2_name = $_FILES['kartupelajar2']['name'];
                $fileExt4 = explode('.', $kartupelajar2_name);
                $filetype4 = strtolower(end($fileExt4));
                $filetmpname4 = $_FILES['kartupelajar2']['tmp_name'];
                if (!in_array($filetype4, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    //Peserta 2 Kartu Pelajar
                    $filenamenew4 = $namapeserta2 . $nama_kelompok . '.' . $filetype4;
                    $targetDir4 = $fileDestinationkp . $filenamenew4;
                    $moveSM2 = move_uploaded_file($filetmpname4, $targetDir4);
                    if (!$moveSM2) {
                        $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 2';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET kartu_pelajar2 = ?,verify = ? where email =?");
                        $insert_data->execute([$filenamenew4, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }


            //foto peserta 3
            $fotodiri3 = ($_FILES['fotodiri3']['name']);
            if ($fotodiri3) {

                $fotodiri3_name = $_FILES['fotodiri3']['name'];
                $fileExt5 = explode('.', $fotodiri3_name);
                $filetype5 = strtolower(end($fileExt5));
                $filetmpname5 = $_FILES['fotodiri3']['tmp_name'];
                if (!in_array($filetype5, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    //Peserta 3 Foto Diri
                    $filenamenew5 = $namapeserta3 . $nama_kelompok . '.' . $filetype5;
                    $targetDir5 = $fileDestination3x4 . $filenamenew5;
                    $moveTT1 = move_uploaded_file($filetmpname5, $targetDir5);

                    if (!$moveTT1) {
                        $message = 'An Error occured while uploading "Foto 3x4 Peserta 3".';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET foto_diri_peserta3 = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew5, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            //foto kartu pelajar peserta 3
            $kartupelajar3 = ($_FILES['kartupelajar3']['name']);
            if ($kartupelajar3) {
                $kartupelajar3_name = $_FILES['kartupelajar3']['name'];
                $fileExt6 = explode('.', $kartupelajar3_name);
                $filetype6 = strtolower(end($fileExt6));
                $filetmpname6 = $_FILES['kartupelajar3']['tmp_name'];
                if (!in_array($filetype6, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    //Peserta 3 Kartu Pelajar
                    $filenamenew6 = $namapeserta3 . $nama_kelompok . '.' . $filetype6;
                    $targetDir6 = $fileDestinationkp . $filenamenew6;
                    $moveTM2 = move_uploaded_file($filetmpname6, $targetDir6);

                    if (!$moveTM2) {
                        $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 3".';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET kartu_pelajar3 = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew6, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            //foto peserta 4
            $fotodiri4 = ($_FILES['fotodiri4']['name']);
            if ($fotodiri4) {

                $fotodiri4_name = $_FILES['fotodiri4']['name'];
                $fileExt7 = explode('.', $fotodiri4_name);
                $filetype7 = strtolower(end($fileExt7));
                $filetmpname7 = $_FILES['fotodiri4']['tmp_name'];
                if (!in_array($filetype7, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    //Peserta 4 Foto Diri
                    $filenamenew7 = $namapeserta4 . $nama_kelompok . '.' . $filetype7;
                    $targetDir7 = $fileDestination3x4 . $filenamenew7;
                    $moveTT1 = move_uploaded_file($filetmpname7, $targetDir7);

                    if (!$moveTT1) {
                        $message = 'An Error occured while uploading "Foto 3x4 Peserta 4".';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET foto_diri_peserta4 = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew7, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            //foto kartu pelajar peserta 4
            $kartupelajar4 = ($_FILES['kartupelajar4']['name']);
            if ($kartupelajar4) {
                $kartupelajar4_name = $_FILES['kartupelajar4']['name'];
                $fileExt8 = explode('.', $kartupelajar4_name);
                $filetype8 = strtolower(end($fileExt8));
                $filetmpname8 = $_FILES['kartupelajar4']['tmp_name'];
                if (!in_array($filetype8, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    //Peserta 4 Kartu Pelajar
                    $filenamenew8 = $namapeserta4 . $nama_kelompok . '.' . $filetype8;
                    $targetDir8 = $fileDestinationkp . $filenamenew8;
                    $moveTT2 = move_uploaded_file($filetmpname8, $targetDir8);

                    if (!$moveTT2) {
                        $message = 'An Error occured while uploading "Foto Kartu Pelajar Peserta 4".';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET kartu_pelajar4 = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew8, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }

            $buktitrf = (($_FILES['buktitrf']['name']));
            if ($buktitrf) {
                $filetmpname9 = $_FILES['buktitrf']['tmp_name'];
                $buktitrf_name = $_FILES['buktitrf']['name'];
                $fileExt9 = explode('.', $buktitrf_name);
                $filetype9 = strtolower(end($fileExt9));

                if (!in_array($filetype9, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    $filenamenew9 = 'buktitransfer' . $nama_kelompok . '.' . $filetype9;
                    $fileDestinationtrf = '../../admin/uploads/buktitransfer/';
                    $targetDir9 = $fileDestinationtrf . $filenamenew9;
                    $moveTR = move_uploaded_file($filetmpname9, $targetDir9);

                    if (!$moveTR) {
                        $message = 'An Error occured while uploading "Bukti Transfer".';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET bukti_transfer = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew9, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }


            $buktiupload = (($_FILES['buktiupload']['name']));
            if ($buktiupload) {
                $filetmpname10 = $_FILES['buktiupload']['tmp_name'];
                $buktiupload_name = $_FILES['buktiupload']['name'];
                $fileExt10 = explode('.', $buktiupload_name);
                $filetype10 = strtolower(end($fileExt10));

                if (!in_array($filetype10, $allowed)) {
                    $message = 'Tipe file yang dapat digunakan adalah (.jpg, .png, .jpeg)';
                } else {
                    $filenamenew10 = 'buktiupload' . $nama_kelompok . '.' . $filetype10;
                    $fileDestinationupload = '../../admin/uploads/buktiupload/';
                    $targetDir10 = $fileDestinationupload . $filenamenew10;
                    $moveUP = move_uploaded_file($filetmpname10, $targetDir10);

                    if (!$moveUP) {
                        $message = 'An Error occured while uploading "Bukti Upload".';
                    } else {
                        $insert_data = $conn->prepare("UPDATE `kelompok` SET bukti_upload = ?,verify = ? where email=?");
                        $insert_data->execute([$filenamenew10, 3, $email]);
                        if ($insert_data) {
                            $message = 'Berhasil mengubah data';
                            $success_regist = true;
                        } else {
                            $message = 'Gagal mengubah data';
                        }
                    }
                }
            }
        }
    }

    echo json_encode([
        'success_data' => $success_data,
        'success_regist' => $success_regist,
        'message' => $message,
    ]);
    exit();
}
