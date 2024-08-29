
<?php
require_once "../../pendaftaran/conn.php";

// if (isset($_POST["submit"])) {
    if (isset($_POST["pos"]) && isset($_POST["kelompok1"]) && isset($_POST["nominal1"]) && is_numeric($_POST["nominal1"])) {
        $id_pos = $_POST["pos"];
        if ($id_pos == 9) {
            $id_pos = "Bonus";
        }
        $kelompok1 = $_POST["kelompok1"];
        $kelompok2 = $_POST["kelompok2"];
        $kelompok3 = $_POST["kelompok3"];
        $kelompok4 = $_POST["kelompok4"];
        $kelompok5 = $_POST["kelompok5"];
        $nominal1 = $_POST["nominal1"];
        $nominal2 = $_POST["nominal2"];
        $nominal3 = $_POST["nominal3"];
        $nominal45 = $_POST["nominal45"];


        try{
            $conn->beginTransaction();
            // KELOMPOK 1
            // Update jumlah uang kelompok di tabel kelompok
            $sql = "UPDATE game_kelompok SET uang = (uang + ?) WHERE id_kelompok = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nominal1, $kelompok1]);

            if (isset($_POST["kelompok2"])) {
                if (isset($_POST["nominal2"]) && is_numeric($_POST["nominal2"])) {
                    // KELOMPOK 2
                    // Update jumlah uang kelompok di tabel kelompok
                    $sql = "UPDATE game_kelompok SET uang = (uang + ?) WHERE id_kelompok = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$nominal2, $kelompok2]);
                }
            }

            if (isset($_POST["kelompok3"])) {
                if (isset($_POST["nominal3"]) && is_numeric($_POST["nominal3"])) {
                    // KELOMPOK 3
                    // Update jumlah uang kelompok di tabel kelompok
                    $sql = "UPDATE game_kelompok SET uang = (uang + ?) WHERE id_kelompok = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$nominal3, $kelompok3]);
                }
            }

            if (isset($_POST["kelompok4"])) {
                if (isset($_POST["nominal45"]) && is_numeric($_POST["nominal45"])) {
                    // KELOMPOK 4
                    // Update jumlah uang kelompok di tabel kelompok
                    $sql = "UPDATE game_kelompok SET uang = (uang + ?) WHERE id_kelompok = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$nominal45, $kelompok4]);
                }
            }

            if (isset($_POST["kelompok5"])) {
                if (isset($_POST["nominal45"]) && is_numeric($_POST["nominal45"])) {
                    // KELOMPOK 5
                    // Update jumlah uang kelompok di tabel kelompok
                    $sql = "UPDATE game_kelompok SET uang = (uang + ?) WHERE id_kelompok = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$nominal45, $kelompok5]);
                }
            }

            // Insert Transaksi
            if (isset($_POST["kelompok5"])) {
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $nominal1, $kelompok2, $nominal2, $kelompok3, $nominal3, $kelompok4, $nominal45, $kelompok5, $nominal45]);
            } else if (isset($_POST["kelompok4"])) {
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $nominal1, $kelompok2, $nominal2, $kelompok3, $nominal3, $kelompok4, $nominal45]);
            } else if (isset($_POST["kelompok3"])) {
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $nominal1, $kelompok2, $nominal2, $kelompok3, $nominal3]);
            } else if (isset($_POST["kelompok2"])) {
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'IN', 'Reward Game Pos $id_pos'), (?, ?, 'IN', 'Reward Game Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $nominal1, $kelompok2, $nominal2]);
            } else {
                $sql = "INSERT INTO game_transaksi (id_kelompok, nominal, jenis_mutasi, tujuan_transaksi) VALUES (?, ?, 'IN', 'Reward Game Pos $id_pos')";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$kelompok1, $nominal1]);
            }

            $_SESSION['notification'] = array(
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Berhasil menambahkan uang!'
            );

            $conn->commit();

            
        }catch(\PDOException $e){
            $conn->rollBack();
            $_SESSION['notification'] = array(
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Error Database'
            );
            header("Location: pemenang.php");
            die($e->getMessage());
            exit();
        }
        
    } else {
        $_SESSION['notification'] = array(
            'type' => 'error',
            'title' => 'Error',
            'message' => 'Mohon isi kelengkapan data!'
        );
    }

    header("Location: pemenang.php");
    exit();
// }
?>