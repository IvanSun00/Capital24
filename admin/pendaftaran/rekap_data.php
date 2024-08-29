<?php
require_once "conn.php";

// if (!isset($_SESSION['gmail'])) {
//     header('Location: ../login.php');
//     exit;
// } else {
//     $gmail = $_SESSION['gmail'];
//     $username = $_SESSION['username'];
//     $divisi = $_SESSION['divisi'];
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CAPITAL 2024 | Rekap Data Peserta</title>
    <?php include '../../admin/assets/link.html' ?>

    <style>
        .col-sm-6,
        .col-sm-5,
        .col-sm-7 {
            margin: 10px auto;
        }
    </style>
</head>

<body>
    <?php include './navbar.php'; ?>
    <h1 class="text-center" style="margin-top: 60px; font-weight: bold;">REKAP DATA PESERTA</h1>
    <div class="p-4 mt-4 card" style="border-radius: 1.3rem;">
        <div class="card-body table-responsive px-1">
            <table class="table table-striped" id="tableMain" style="width: 100%!important;">
                <thead>
                    <tr class="mid">
                        <th>Tanggal Daftar</th>
                        <th>Nama Kelompok</th>
                        <th>Asal Sekolah</th>
                        <th>E-mail</th>
                        <th>ID Line</th>
                        <th>Nama Ketua</th>
                        <th>No. WA Ketua</th>
                        <th>Konsumsi Ketua</th>
                        <th>Alergi Ketua</th>
                        <th>Nama Anggota 2</th>
                        <th>No. WA Anggota 2</th>
                        <th>Konsumsi Anggota 2</th>
                        <th>Alergi Anggota 2</th>
                        <th>Nama Anggota 3</th>
                        <th>No. WA Anggota 3</th>
                        <th>Konsumsi Anggota 3</th>
                        <th>Alergi Anggota 3</th>
                        <th>Nama Anggota 4</th>
                        <th>No. WA Anggota 4</th>
                        <th>Konsumsi Anggota 4</th>
                        <th>Alergi Anggota 4</th>
                    </tr>
                </thead>
                <tbody id="tbodyMain">
                    <?php
                    $sql = "SELECT * FROM `kelompok` WHERE verify = 4";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<tr class="mid">
                                <td>' . $data['tanggal_daftar'] . '</td>
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . $data['asal_sekolah'] . '</td>
                                <td>' . $data['email'] . '</td>
                                <td>' . $data['no_whatsapp'] . '</td>
                                <td>' . $data['nama_ketua'] . '</td>
                                <td>' . $data['id_line_ketua'] . '</td>
                                <td>' . $data['konsumsi_ketua'] . '</td> 
                                <td>' . $data['alergi_ketua'] . '</td>
                                <td>' . $data['nama_peserta2'] . '</td>
                                <td>' . $data['id_line2'] . '</td>
                                <td>' . $data['konsumsi_peserta2'] . '</td> 
                                <td>' . $data['alergi_peserta2'] . '</td>
                                <td>' . $data['nama_peserta3'] . '</td>
                                <td>' . $data['id_line3'] . '</td>
                                <td>' . $data['konsumsi_peserta3'] . '</td> 
                                <td>' . $data['alergi_peserta3'] . '</td>
                                <td>' . $data['nama_peserta4'] . '</td>
                                <td>' . $data['id_line4'] . '</td>
                                <td>' . $data['konsumsi_peserta4'] . '</td> 
                                <td>' . $data['alergi_peserta4'] . '</td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#tableMain').DataTable({
            "lengthMenu": [
                [-1, 5, 10, 25, 50, 100],
                ["All", 5, 10, 25, 50, 100]
            ],
            "scrollX": true,
            dom: "<'d-flex text-center justify-content-center'B><'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: {
                dom: {
                    button: {
                        tag: "button",
                        className: "btn btn-dark my-2"
                    },
                    buttonLiner: {
                        tag: null
                    }
                }
            }
        });

        $(document).ready(function() {
            $(".rekapNavbar").addClass("active disabled");
        });
    </script>
</body>

</html>