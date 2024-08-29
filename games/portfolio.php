<?php
include "include_php.php"
?>

<style>
    .table {
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    .portfolio {
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: fixed;
        text-align: center;
        padding: 25px 30px 0px 30px;
        color: white;
        background: #161e33;
        width: 50%;
        border-radius: 30px;
        max-height: 60vh;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 13px 12px 20px rgba(0, 0, 0, 0.3);
    }

    .portfolio::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: linear-gradient(to right, #2c3652, #161e33);
        z-index: -1;
        border-radius: 30px;
    }

    .portfolio-title {
        background: #fffaf0;
        align-items: center;
        justify-content: center;
        margin: 0 5%;
        border-radius: 30px;
        color: black;
        margin-bottom: 20px;
    }

    .portfolio-table {
        border-radius: 20px;
        background-color: white;
        max-height: 30%;
        overflow: auto;
    }

    .judul_porto {
        font-family: font-utama;
    }

    th {
        top: 0;
        position: sticky;
        z-index: 1;
        font-size: 20px;
    }

    td {
        font-size: 18px;
    }

    table th,
    tr {
        text-align: center;
        border: #ddd;
    }

    P {
        padding-top: 10px;
        font-size: 15px;
    }

    @media only screen and (max-width: 900px) {
        .portfolio {
            width: 70%;
        }
    }

    @media only screen and (max-width: 500px) {
        .portfolio {
            width: 70%;
            max-height: 350px;
            padding: 25px 25px 5px 25px;
        }

        th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }
    }

    @media only screen and (max-width: 380px) {
        .portfolio {
            max-height: 300px;
            width: 80%;
            padding: 15px 15px 0px 15px;
        }

        .portfolio-title {
            margin-bottom: 15px;
        }

        p {
            font-size: 12px;
        }

        th {
            font-size: 15px;
        }

        td {
            font-size: 13px;
        }
    }

    @media only screen and (max-width: 280px) {
        th {
            font-size: 13px;
        }

        td {
            font-size: 12px;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php include "../assets/link/link.html" ?>
</head>

<body>
    <?php include "include.php" ?>

    <div class="portfolio">
        <div class="portfolio-title">
            <h1 class="judul_porto m-0">PORTFOLIO</h1>
        </div>

        <div class="portfolio-table">
            <table class="table" style="width: 100%;">
                <?php
                $query = "SELECT * FROM game_portfolio por
                    JOIN game_saham s ON por.id_saham = s.id
                    WHERE id_kelompok = $id_kelompok";

                $stmt = $conn->prepare($query);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="table-title">
                    <thead>
                        <tr>
                            <th scope="col">CODE</th>
                            <th scope="col">QTY</th>
                            <th scope="col">VALUE</th>
                            <th scope="col">TOTAL</th>
                        </tr>
                    </thead>
                </div>
                <tbody>
                    <?php
                    foreach ($data as $row) {
                        $total = $row['quantity'] * $row['value'];
                        echo '<tr>';
                        echo '<td>' . $row['code'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['value'] . '</td>';
                        echo '<td>' . $total . '</td>';
                        echo '</tr>';
                    }
                    ?>
            </table>
        </div>
        <p>Transaksi jual beli hanya dapat dilakukan di Stock Exchange</p>
    </div>


</body>

</html>