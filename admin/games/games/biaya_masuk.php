<?php
require_once "../../pendaftaran/conn.php";
$sql = "SELECT * FROM `game_kelompok` gk JOIN `kelompok` k ON gk.id_kelompok = k.id ORDER BY k.nama_kelompok";
$result = $conn->prepare($sql);
$result->execute();
$kelompok_data = $result->fetchAll();
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
    <title>Admin CAPITAL 2024 | Games</title>

    <?php include '../../assets/link.html' ?>
</head>

<body>
    <?php include '../navbar.php' ?>

    <h1 class="text-center" style="margin-top: 50px; font-weight: bold;">BIAYA MASUK GAME</h1>

    <div class="container px-4 pt-4 pb-4 mt-4" style="background-color: white; border-radius: 30px; box-shadow: 10px 10px 20px rgba(0,0,0,0.2); width: 80vw;">
        <form action="biaya_masuk_logic.php" id="form_menang" method="POST" class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 mb-3">
                <label for="pos" class="form-label">Pos</label>
                <select name="pos" id="pos" class="form-select">
                    <option value="" selected disabled hidden>Pilih Pos: </option>
                    <?php
                    $sql = "SELECT * FROM `game_pos` ORDER BY `id`";

                    $result = $conn->prepare($sql);
                    $result->execute();

                    while ($data = $result->fetch()) {
                        echo "<option value='" . $data['id'] . "'>" . $data['pos'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input name="nominal" type="number" class="form-control" id="nominal" placeholder="Nominal" min="0">
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="kelompok1" class="form-label">Kelompok 1</label>
                <select name="kelompok1" id="kelompok1" class="form-select">
                    <option value="" selected disabled hidden>Pilih Kelompok:</option>
                    <?php
                    foreach ($kelompok_data as $kelompok) {
                        echo "<option value='" . $kelompok['id'] . "'>" . $kelompok['nama_kelompok'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="kelompok2" class="form-label">Kelompok 2</label>
                <select name="kelompok2" id="kelompok2" class="form-select">
                    <option value="" selected disabled hidden>Pilih Kelompok: </option>
                    <?php
                    foreach ($kelompok_data as $kelompok) {
                        echo "<option value='" . $kelompok['id'] . "'>" . $kelompok['nama_kelompok'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <label for="kelompok3" class="form-label">Kelompok 3</label>
                <select name="kelompok3" id="kelompok3" class="form-select">
                    <option value="" selected disabled hidden>Pilih Kelompok: </option>
                    <?php
                    foreach ($kelompok_data as $kelompok) {
                        echo "<option value='" . $kelompok['id'] . "'>" . $kelompok['nama_kelompok'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <label for="kelompok4" class="form-label">Kelompok 4</label>
                <select name="kelompok4" id="kelompok4" class="form-select">
                    <option value="" selected disabled hidden>Pilih Kelompok: </option>
                    <?php
                    foreach ($kelompok_data as $kelompok) {
                        echo "<option value='" . $kelompok['id'] . "'>" . $kelompok['nama_kelompok'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <label for="kelompok5" class="form-label">Kelompok 5</label>
                <select name="kelompok5" id="kelompok5" class="form-select">
                    <option value="" selected disabled hidden>Pilih Kelompok: </option>
                    <?php
                    foreach ($kelompok_data as $kelompok) {
                        echo "<option value='" . $kelompok['id'] . "'>" . $kelompok['nama_kelompok'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary btn-submit mt-4">Submit</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#form_menang").submit(function(e){
                $(".btn-submit").click();
                $(".btn-submit").attr("disabled", true);
                setTimeout(function(){
                    $(".btn-submit").attr("disabled", false);
                }, 30000);
            });
        })
    </script>


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