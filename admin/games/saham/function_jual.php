<?php
require_once "../../pendaftaran/conn.php";
session_start();


if (isset($_POST["jual"])) {
    $id_kelompok = $_POST['id_kelompok'];
    $id_saham = $_POST['id_saham'];
    $code_saham = $_POST['code'];
    $quantity = $_POST['quantity'];
    $quantity_awal = $_POST['quantity_awal'];

    // Value saham
    $sql = "SELECT * FROM `game_saham` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_saham]);
    $data = $stmt->fetch();
    $harga_jual = $data["value"];
    $harga_total = $harga_jual * $quantity;

    if ($quantity > $quantity_awal) {
        $_SESSION['notification'] = array(
            'type' => 'error',
            'title' => 'Error',
            'message' => 'Quantity yang ingin dijual melebihi quantity yang dimiliki!'
        );

        header("Location: jual.php");
        exit();
    }

    try {
        // jual semua, delete
        if ($quantity == $quantity_awal) {
            $sql = "DELETE FROM `game_portfolio` WHERE id_saham = ? AND id_kelompok = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_saham, $id_kelompok]);
        } else { // tidak jual semua, update quantity
            $sql = "UPDATE `game_portfolio` SET quantity = (quantity - ?) WHERE id_saham = ? AND id_kelompok = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$quantity, $id_saham, $id_kelompok]);
        }

        // Update jumlah uang kelompok di tabel kelompok
        $sql = "UPDATE game_kelompok SET uang = (uang + ?) WHERE id_kelompok = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$harga_total, $id_kelompok]);

        // Insert transaksi
        $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'IN', ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_kelompok, $harga_total, "Jual saham $code_saham"]);

        $_SESSION['notification'] = array(
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Berhasil jual saham!'
        );
    } catch (PDOException $e) {
        $_SESSION['notification'] = array(
            'type' => 'error',
            'title' => 'Error',
            'message' => 'An error occurred: ' . $e->getMessage()
        );
    }

    header("Location: jual.php");
    exit();
}
