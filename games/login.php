<?php
include '../user/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $stmt = $conn->prepare('SELECT * FROM kelompok where nama_kelompok=? and verify = 0');
    $stmt->execute([$username]);
    if ($stmt->rowCount() == 1) {
        $data = $stmt->fetch();
        if (password_verify($pass, $data['password'])) {
            $_SESSION['kelompok'] = $data['id'];
            header("Location: index.php");
            exit();
        } else {
            setcookie('gagal_submit', true, time() + 3600, '/');
            header('location: login.php');
        }
    } else {
        setcookie('gagal_submit', true, time() + 3600, '/');
        header('location: login.php');
    }
}

$gagal = '';
if (isset($_COOKIE['gagal_submit'])) {
    setcookie('gagal_submit', null, time() - 3600, '/');

    $gagal  = "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: 'Simulation round telah selesai. Sampai jumpa di Closing!'
                })
            </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS / LINK -->
    <?php include "../assets/link/link.html"; ?>
    <link href="../assets/css/main.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
    <script src="../assets/js/gsap.js"></script>

    <title>CAPITAL 2024 | LOGIN SIMULATION ROUND</title>
</head>

<body>
    <?php
    if (!empty($gagal))
        echo $gagal;
    ?>

    <div class="container">
        <div class="content">
            <div class="text">
                LOGIN
            </div>
            <form action="#" method="POST">
                <div class="field">
                    <input type="text" required name="username" id="username" class="input">
                    <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path>
                            </g>
                        </svg></span>
                    <label class="label">Nama Kelompok</label>
                </div>
                <div class="field mb-4">
                    <input type="password" required name="pass" id="pass" class="input">
                    <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path>
                            </g>
                        </svg></span>
                    <label class="label">Password</label>
                </div>
                <button type="submit" class="button mt-4">Sign In</button>
            </form>
        </div>
    </div>

</body>

</html>