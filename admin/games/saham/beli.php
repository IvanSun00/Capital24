<?php
require_once "../../pendaftaran/conn.php";
?>

<?php
if (!isset($_SESSION['gmail'])) {
    header('Location: ./login.php');
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
    <title>Admin CAPITAL 2024 | Beli Saham</title>
    <?php include '../../assets/link.html' ?>

    <style>
        .input {
            padding: 4px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            outline: none;
        }
    </style>
</head>

<body>
    <?php include "../navbar.php" ?>

    <h1 class="text-center" style="margin-top: 50px; font-weight: bold;">BELI SAHAM</h1>

    <div class="d-flex justify-content-center">
        <form action="function_beli.php" method="POST" class="px-4 pt-2 pb-4 mt-4" style="background-color: white; border-radius: 30px; box-shadow: 10px 10px 20px rgba(0,0,0,0.2); width: 80vw;">
            <div class="mt-4 d-flex flex-column">
                <label for="kelompok">Kelompok: </label>
                <select class="input mt-2" name="kelompok" id="kelompok">
                    <option selected disabled value="0">Pilih kelompok: </option>
                    <?php
                    $sql = "SELECT * FROM `game_kelompok` g JOIN `kelompok` k ON g.id_kelompok = k.id ORDER BY k.nama_kelompok";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<option value="' . $data['id_kelompok'] . '">' . $data['nama_kelompok'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mt-4 d-flex flex-column">
                <label for="saham">Code Saham: </label>
                <select class="input mt-2" name="saham" id="saham">
                    <option selected disabled value="0">Pilih saham: </option>
                    <?php
                    $sql = "SELECT * FROM `game_saham`";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<option value="' . $data['id'] . '">' . $data['code'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mt-4 d-flex flex-column">
                <label for="quantity">Quantity: </label>
                <input class="input mt-2 px-2" type="number" min="0" name="quantity" id="quantity" placeholder="Masukkan Quantity" required>
            </div>
            <div class="mt-4 d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary btn-submit">Confirm</button>
            </div>
        </form>
    </div>

    <script>
        function displayNotification() {
            <?php
            if (isset($_SESSION['notification'])) {
                echo "Swal.fire({
                    icon: '{$_SESSION['notification']['type']}',
                    title: '{$_SESSION['notification']['title']}',
                    text: '{$_SESSION['notification']['message']}'
                });";
                unset($_SESSION['notification']);
            }
            ?>
        }

        displayNotification();
    </script>

</body>

</html>