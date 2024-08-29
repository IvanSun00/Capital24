<?php
    require_once "../user/conn.php";

    if (!isset($_SESSION['kelompok']) || $_SESSION['kelompok'] == "") {
        header("Location: login.php");
    }

    $id_kelompok = $_SESSION['kelompok'];
    $query = "SELECT * FROM game_kelompok WHERE id_kelompok = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id_kelompok]);
    $data = $stmt->fetch();

    $uang = number_format($data['uang'], 0, '.', '.');

    // $queryHistory = "SELECT id_kelompok, SUM(CASE WHEN jenis_mutasi = 'IN' THEN nominal ELSE -nominal END) AS total_uang FROM game_transaksi WHERE id_kelompok = ?";
    // $stmt = $conn->prepare($queryHistory);
    // $stmt->execute([$id_kelompok]);
    // $data = $stmt->fetch();

    // $total_uang = number_format($data['total_uang'], 0, '.', '.');

?>