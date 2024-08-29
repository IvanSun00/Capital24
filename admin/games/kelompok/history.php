<?php
require_once "../../pendaftaran/conn.php";
?>

<?php
if (!isset($_SESSION['gmail'])) {
    header('Location: ../login.php');
    exit;
} else {
    $gmail = $_SESSION['gmail'];
    $username = $_SESSION['username'];
    $divisi = $_SESSION['divisi'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CAPITAL 2024 | Data Uang</title>

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
    <h1 class="text-center" style="margin-top: 60px; font-weight: bold;">DATA RIWAYAT TRANSAKSI</h1>
    <div class="p-4 mt-5 card" style="border-radius: 1.3rem;">
        <div class="card-body table-responsive px-2">
            <table class="table table-striped" id="tableMain" style="width: 100%!important;">
                <thead>
                    <tr class="mid">
                        <th>Timestamp</th>
                        <th>Nama Kelompok</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="tbodyMain">
                    <?php
                    $sql = "SELECT * FROM `game_transaksi` g JOIN `kelompok` k ON g.id_kelompok = k.id  ORDER BY `timestamp` DESC";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<tr class="mid">
                                <td>' . $data['timestamp'] . '</td>
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>';
                        if ($data['jenis_mutasi'] == 'IN') {
                            echo '(+) ';
                        } else {
                            echo '(-) ';
                        }
                        echo number_format($data['nominal'], 0, '.', '.') . '</td>
                                <td>' . $data['tujuan_transaksi'] . '</td>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#tableMain').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
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
</body>

</html>