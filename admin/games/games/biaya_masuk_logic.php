
<?php
require_once "../../pendaftaran/conn.php";


// if (isset($_POST["submit"])) {
    if (isset($_POST["kelompok1"]) && isset($_POST["pos"]) && isset($_POST["nominal"]) && is_numeric($_POST["nominal"])) {
        $kelompok1 = $_POST["kelompok1"];
        $kelompok2 = $_POST["kelompok2"];
        $kelompok3 = $_POST["kelompok3"];
        $kelompok4 = $_POST["kelompok4"];
        $kelompok5 = $_POST["kelompok5"];
        $id_pos = $_POST["pos"];
        if ($id_pos == 9) {
            $id_pos = "Bonus";
        }
        $uang_masuk = $_POST["nominal"];

        $sql = "SELECT * FROM `game_kelompok` WHERE id_kelompok = ? OR id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$kelompok1, $kelompok2, $kelompok3, $kelompok4, $kelompok5]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // cek apakah uang cukup
        foreach ($data as $row) {
            if ($uang_masuk > $row["uang"]) {
                // fetch nama kelompok
                $fetch_nama = "SELECT `nama_kelompok` FROM `kelompok` WHERE id = ?";
                $stmt2 = $conn->prepare($fetch_nama);
                $stmt2->execute([$row["id_kelompok"]]);
                $nama = $stmt2->fetchColumn();

                $_SESSION['notification'] = array(
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => 'Uang kelompok ' . $nama . ' tidak mencukupi'
                );

                header("Location: biaya_masuk.php");
                exit();
            }
        }

        try{
            $conn->beginTransaction();
            if (isset($_POST["kelompok5"])) {
                // Update jumlah uang kelompok di tabel kelompok
                $sql = "UPDATE game_kelompok SET uang = (uang - ?) WHERE id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uang_masuk, $kelompok1, $kelompok2, $kelompok3, $kelompok4, $kelompok5]);
    
                // Insert transaksi
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $kelompok2, $kelompok3, $kelompok4, $kelompok5]);
            } else if (isset($_POST["kelompok4"])) {
                // Update jumlah uang kelompok di tabel kelompok
                $sql = "UPDATE game_kelompok SET uang = (uang - ?) WHERE id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uang_masuk, $kelompok1, $kelompok2, $kelompok3, $kelompok4]);
    
                // Insert transaksi
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $kelompok2, $kelompok3, $kelompok4]);
            } else if (isset($_POST["kelompok3"])) {
                // Update jumlah uang kelompok di tabel kelompok
                $sql = "UPDATE game_kelompok SET uang = (uang - ?) WHERE id_kelompok = ?  OR id_kelompok = ?  OR id_kelompok = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uang_masuk, $kelompok1, $kelompok2, $kelompok3]);
    
                // Insert transaksi
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $kelompok2, $kelompok3]);
            } else if (isset($_POST["kelompok2"])) {
                // Update jumlah uang kelompok di tabel kelompok
                $sql = "UPDATE game_kelompok SET uang = (uang - ?) WHERE id_kelompok = ?  OR id_kelompok = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uang_masuk, $kelompok1, $kelompok2]);
    
                // Insert transaksi
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos'), (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $kelompok2]);
            } else {
                // Update jumlah uang kelompok di tabel kelompok
                $sql = "UPDATE game_kelompok SET uang = (uang - ?) WHERE id_kelompok = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uang_masuk, $kelompok1]);
    
                // Insert transaksi
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, $uang_masuk, 'OUT', 'Biaya Masuk Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1]);
            }
    
            $_SESSION['notification'] = array(
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Berhasil menarik biaya masuk game!'
            );

            $conn->commit();
        }catch(\Exception $e){
            $conn->rollBack();
            $_SESSION['notification'] = array(
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Error Database'
            );
            die($e->getMessage());
            header("Location: pemenang.php");
            exit();
        }

    } else {
        $_SESSION['notification'] = array(
            'type' => 'error',
            'title' => 'Error',
            'message' => 'Mohon isi kelengkapan data!'
        );
    }

    header("Location: biaya_masuk.php");
    exit();
// }
?>