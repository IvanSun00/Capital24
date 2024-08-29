<?php
require_once "../../pendaftaran/conn.php";


if (isset($_POST["submit"])) {
    if (isset($_POST["kelompok"]) && isset($_POST["saham"]) && isset($_POST["quantity"])) {
        $id_kelompok = $_POST["kelompok"];
        $id_saham = $_POST["saham"];
        $quantity = $_POST["quantity"];

        // Value saham
        $sql = "SELECT * FROM `game_saham` WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_saham]);
        $data = $stmt->fetch();
        $harga_beli = $data["value"];

        $harga_total = $harga_beli * $quantity;
        $code_saham = $data["code"];

        // Cek uang cukup ga
        $sql = "SELECT * FROM `game_kelompok` WHERE id_kelompok = ?";
        $action = $conn->prepare($sql);
        $action->execute([$id_kelompok]);
        $data = $action->fetch();

        if ($data["uang"] < $harga_total) {
            $_SESSION['notification'] = array(
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Dana tidak cukup!'
            );

            header("Location: beli.php");
            exit();
        }

        $sql = "SELECT * FROM `game_portfolio` gp JOIN `kelompok` k ON gp.id_kelompok = k.id WHERE gp.id_saham = ? AND gp.id_kelompok = ?";
        $action = $conn->prepare($sql);
        $action->execute([$id_saham, $id_kelompok]);

        $count = $action->rowCount();

        echo $count;

        //punya, update
        if ($count > 0) {
            $sql = "UPDATE `game_portfolio` SET quantity = (quantity + ?) WHERE id_kelompok = ? AND id_saham = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$quantity, $id_kelompok, $id_saham]);
        } else { // tidak punya, insert
            $sql = "INSERT INTO `game_portfolio` (id_kelompok, id_saham, quantity) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_kelompok, $id_saham, $quantity]);
        }

        // Update jumlah uang kelompok di tabel kelompok
        $sql = "UPDATE game_kelompok SET uang = (uang - ?) WHERE id_kelompok = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$harga_total, $id_kelompok]);

        // Insert transaksi
        $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'OUT', ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_kelompok, $harga_total, "Beli saham $code_saham"]);

        $_SESSION['notification'] = array(
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Berhasil membeli saham!'
        );
    } else {
        $_SESSION['notification'] = array(
            'type' => 'error',
            'title' => 'Error',
            'message' => 'Mohon isi kelengkapan data!'
        );
    }

    header("Location: beli.php");
    exit();
}
