<?php
require_once "conn.php";

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
    <title>Admin CAPITAL 2024 | Data Konsumsi</title>
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
    <h1 class="text-center" style="margin-top: 60px; font-weight: bold;">DATA KONSUMSI PESERTA</h1>
    <div class="d-flex mt-4 row mx-0 justify-content-center text-center">
        <?php
        $sql = "SELECT 
        'Vege' AS jenis_konsumsi,
        SUM(vege_count) AS count
    FROM (
        SELECT 
            COUNT(*) AS vege_count
        FROM 
            kelompok
        WHERE 
            konsumsi_ketua = 'vege' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta2 = 'vege' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta3 = 'vege' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta4 = 'vege' AND verify = 4
    ) AS vege_table
    UNION ALL
    SELECT 
        'Vegan' AS jenis_konsumsi,
        SUM(vegan_count) AS total_vegan
    FROM (
        SELECT 
            COUNT(*) AS vegan_count
        FROM 
            kelompok
        WHERE 
            konsumsi_ketua = 'vegan' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta2 = 'vegan' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta3 = 'vegan' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta4 = 'vegan' AND verify = 4
    ) AS vegan_table
    UNION ALL
    SELECT 
        'Normal' AS jenis_konsumsi,
        SUM(normal_count) AS total_normal
    FROM (
        SELECT 
            COUNT(*) AS normal_count
        FROM 
            kelompok
        WHERE 
            konsumsi_ketua = 'normal' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta2 = 'normal' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta3 = 'normal' AND verify = 4
        UNION ALL
        SELECT 
            COUNT(*)
        FROM 
            kelompok
        WHERE 
            konsumsi_peserta4 = 'normal' AND verify = 4
    ) AS normal_table;
    ";
        $action = $conn->prepare($sql);
        $action->execute();

        while ($data = $action->fetch()) {
            echo '<div class="col-12 col-md-3 p-2 mx-4 my-1" style="background-color: white;">
            <h5 class="m-0" style="font-weight: bold; text-transform: capitalize;">' . $data['jenis_konsumsi'] . ': ' . $data['count'] . '</h5>
        </div>';
        }

        ?>

    </div>
    <div class="p-4 mt-4 card" style="border-radius: 1.3rem;">
        <div class="card-body table-responsive px-1">
            <table class="table table-striped" id="tableMain" style="width: 100%!important;">
                <thead>
                    <tr class="mid">
                        <th>Nama Kelompok</th>
                        <th>Nama Peserta</th>
                        <th>Jenis Konsumsi</th>
                        <th>Alergi</th>
                    </tr>
                </thead>
                <tbody id="tbodyMain">
                    <?php
                    $sql = "SELECT * FROM `kelompok` WHERE verify = 4";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<tr class="mid">
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . $data['nama_ketua'] . '</td>
                                <td>' . $data['konsumsi_ketua'] . '</td> 
                                <td>' . $data['alergi_ketua'] . '</td> 
                                </tr>
                                
                                <tr class="mid">
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . $data['nama_peserta2'] . '</td>
                                <td>' . $data['konsumsi_peserta2'] . '</td> 
                                <td>' . $data['alergi_peserta2'] . '</td> 
                                </tr>
                                
                                <tr class="mid">
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . $data['nama_peserta3'] . '</td>
                                <td>' . $data['konsumsi_peserta3'] . '</td> 
                                <td>' . $data['alergi_peserta3'] . '</td> 
                                </tr>
                                
                                <tr class="mid">
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . $data['nama_peserta4'] . '</td>
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
                [4, 8, 24, 56, -1],
                [4, 8, 24, 56, "All"]
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
        $(".konsumNavbar").addClass("active disabled");
    });
    </script>
</body>

</html>