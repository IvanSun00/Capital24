<?php
require_once "../../pendaftaran/conn.php";
?>

<?php
$sql = "SELECT phase FROM game_phase";
$stmt = $conn->prepare($sql);
$stmt->execute();
$phase = $stmt->fetchColumn();
?>

<?php
// if (!isset($_SESSION['gmail'])) {
//     header('Location: ../login.php');
//     exit;
// } else {
//     $gmail = $_SESSION['gmail'];
//     $username = $_SESSION['username'];
//     $divisi = $_SESSION['divisi'];
// }
?>

<?php

if (isset($_GET['unlock'])) {
    $id = $_GET['id'];
    $news = $_GET['news'];
    $uang = $_GET['uang'];

    // Jika uang < 20000, maka tidak bisa beli news
    if ($uang < 20000) {
        $response = array("success" => false, "message" => "duit");
        echo json_encode($response);
        exit;
    }

    // Update jumlah uang kelompok di tabel kelompok
    $sql = "UPDATE game_kelompok SET uang = ($uang - 20000) WHERE id_kelompok = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Insert transaksi
    if ($news == 'news_1') {
        $phase = 1;
    } else if ($news == 'news_2') {
        $phase = 2;
    } else if ($news == 'news_3') {
        $phase = 3;
    } else if ($news == 'news_4') {
        $phase = 4;
    } else if ($news == 'news_5') {
        $phase = 5;
    }

    $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES ($id, 20000, 'OUT', CONCAT('News Phase ', $phase))";
    $conn->exec($sql);

    // Ubah vakue news jadi 1
    $sql = "UPDATE game_kelompok SET $news = 1 WHERE id_kelompok = $id";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CAPITAL 2024 | News</title>

    <?php include '../../assets/link.html' ?>

    <style>
        .col-sm-6,
        .col-sm-5,
        .col-sm-7 {
            margin: 10px auto;
        }
    </style>

</head>
</head>

<body>
    <?php include "../navbar.php" ?>

    <h1 class="text-center" style="margin-top: 60px; font-weight: bold;">NEWS</h1>
    <div class="p-4 mt-5 card" style="border-radius: 1.3rem;">
        <div class="card-body table-responsive px-4">
            <table class="table table-striped" id="tableMain" style="width: 100%!important;">
                <thead>
                    <tr class="mid">
                        <th>Kelompok</th>
                        <th>Uang</th>
                        <th>Phase 1</th>
                        <th>Phase 2</th>
                        <th>Phase 3</th>
                        <th>Phase 4</th>
                        <th>Phase 5</th>
                    </tr>
                </thead>
                <tbody id="tbodyMain">
                    <?php
                    $sql = "SELECT * FROM `game_kelompok` g JOIN `kelompok` k ON g.id_kelompok = k.id";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<tr class="mid">
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . number_format($data['uang'], 0, '.', '.') . '</td>';

                        if ($data['news_1'] == 0) {
                            echo ' <td><a href="#" data-id="' . $data["id_kelompok"] . '" data-uang=' . $data['uang'] . ' data-news="news_1" class="unlock"><button class = "btn btn-primary">Unlock</button></a></td>';
                        } else if ($data['news_1'] == 1) {
                            echo '<td>Unlocked <svg width="18px" height="18px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#1bcd18"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#1bcd18" fill-rule="evenodd" d="M3 10a7 7 0 019.307-6.611 1 1 0 00.658-1.889 9 9 0 105.98 7.501 1 1 0 00-1.988.22A7 7 0 113 10zm14.75-5.338a1 1 0 00-1.5-1.324l-6.435 7.28-3.183-2.593a1 1 0 00-1.264 1.55l3.929 3.2a1 1 0 001.38-.113l7.072-8z"></path> </g></svg></td>';
                        }

                        if ($data['news_2'] == 0) {
                            echo ' <td><a href="#" data-id="' . $data["id_kelompok"] . '" data-uang=' . $data['uang'] . ' data-news="news_2" class="unlock"><button class = "btn btn-primary">Unlock</button></a></td>';
                        } else if ($data['news_2'] == 1) {
                            echo '<td>Unlocked <svg width="18px" height="18px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#1bcd18"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#1bcd18" fill-rule="evenodd" d="M3 10a7 7 0 019.307-6.611 1 1 0 00.658-1.889 9 9 0 105.98 7.501 1 1 0 00-1.988.22A7 7 0 113 10zm14.75-5.338a1 1 0 00-1.5-1.324l-6.435 7.28-3.183-2.593a1 1 0 00-1.264 1.55l3.929 3.2a1 1 0 001.38-.113l7.072-8z"></path> </g></svg></td>';
                        }

                        if ($data['news_3'] == 0) {
                            echo ' <td><a href="#" data-id="' . $data["id_kelompok"] . '" data-uang=' . $data['uang'] . ' data-news="news_3" class="unlock"><button class = "btn btn-primary">Unlock</button></a></td>';
                        } else if ($data['news_3'] == 1) {
                            echo '<td>Unlocked <svg width="18px" height="18px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#1bcd18"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#1bcd18" fill-rule="evenodd" d="M3 10a7 7 0 019.307-6.611 1 1 0 00.658-1.889 9 9 0 105.98 7.501 1 1 0 00-1.988.22A7 7 0 113 10zm14.75-5.338a1 1 0 00-1.5-1.324l-6.435 7.28-3.183-2.593a1 1 0 00-1.264 1.55l3.929 3.2a1 1 0 001.38-.113l7.072-8z"></path> </g></svg></td>';
                        }

                        if ($data['news_4'] == 0) {
                            echo ' <td><a href="#" data-id="' . $data["id_kelompok"] . '" data-uang=' . $data['uang'] . ' data-news="news_4" class="unlock"><button class = "btn btn-primary">Unlock</button></a></td>';
                        } else if ($data['news_4'] == 1) {
                            echo '<td>Unlocked <svg width="18px" height="18px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#1bcd18"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#1bcd18" fill-rule="evenodd" d="M3 10a7 7 0 019.307-6.611 1 1 0 00.658-1.889 9 9 0 105.98 7.501 1 1 0 00-1.988.22A7 7 0 113 10zm14.75-5.338a1 1 0 00-1.5-1.324l-6.435 7.28-3.183-2.593a1 1 0 00-1.264 1.55l3.929 3.2a1 1 0 001.38-.113l7.072-8z"></path> </g></svg></td>';
                        }

                        if ($data['news_5'] == 0) {
                            echo ' <td><a href="#" data-id="' . $data["id_kelompok"] . '" data-uang=' . $data['uang'] . ' data-news="news_5" class="unlock"><button class = "btn btn-primary">Unlock</button></a></td>';
                        } else if ($data['news_5'] == 1) {
                            echo '<td>Unlocked <svg width="18px" height="18px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#1bcd18"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#1bcd18" fill-rule="evenodd" d="M3 10a7 7 0 019.307-6.611 1 1 0 00.658-1.889 9 9 0 105.98 7.501 1 1 0 00-1.988.22A7 7 0 113 10zm14.75-5.338a1 1 0 00-1.5-1.324l-6.435 7.28-3.183-2.593a1 1 0 00-1.264 1.55l3.929 3.2a1 1 0 001.38-.113l7.072-8z"></path> </g></svg></td>';
                        }

                        echo '</tr>';
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
    </script>

    <script>
        $(document).ready(function() {
            $(".unlock").click(function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                var news = $(this).data("news");
                var uang = $(this).data("uang");
                var phase = <?php echo $phase; ?>;
                if ((phase == 1 && news == "news_1") || (phase == 2 && news == "news_2") || (phase == 3 && news == "news_3") || (phase == 4 && news == "news_4") || (phase == 5 && news == "news_5")) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin unlock news?',
                        showCancelButton: true,
                        confirmButtonText: 'Yakin',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.get("index.php?unlock=true&id=" + id + "&news=" + news + "&uang=" + uang, function(data) {
                                var response = JSON.parse(data);
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Berhasil unlock news!',
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    if (response.message === 'duit') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Dana tidak cukup!',
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Gagal unlock news. Silakan coba lagi!',
                                        });
                                    }
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fase sekarang: ' + phase,
                        text: 'Anda hanya dapat unlock news pada fase ' + phase,
                    });
                }
            });
        });
    </script>

</body>

</html>