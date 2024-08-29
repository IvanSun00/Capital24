<?php
require_once '../../vendor/autoload.php';
require "../pendaftaran/conn.php";

$client = new Google_Client();
$client->setClientId('CLIENT_ID'); 
$client->setClientSecret('CLIENT_SECRET');
$client->setRedirectUri('https://capital.petra.ac.id/2024/admin/games/login.php');
// $client->setRedirectUri('http://localhost:8080/capital-main/capital2024/admin/games/login.php');

$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token['error'])){

        $client->setAccessToken($token['access_token']);

        $service = new Google_Service_Oauth2($client);
        $profile = $service->userinfo->get();

        //data
        $gmail = $profile['email'];
        $username = $profile['name'];
        $id = $profile['id'];

        //QUERY CHECK DISINI
        $cek_email = false;

        $nrp = strtolower(substr($gmail, 0, 9));
        
        
        // check is panitia
        $cek_email_nrp = $conn->prepare("SELECT nrp FROM `panitia` WHERE nrp = :nrp");
        $cek_email_nrp->bindParam(':nrp', $nrp);
        $cek_email_nrp->execute();

        // check divisi
        $cek_divisi = $conn->prepare("SELECT divisi.nama FROM divisi INNER JOIN panitia ON panitia.id_divisi = divisi.id WHERE panitia.nrp = :nrp");
        $cek_divisi->bindParam(':nrp', $nrp);
        $cek_divisi->execute();

        $divisi = $cek_divisi->fetchcolumn();

        if (strlen($gmail) === 26 && substr($gmail, 9) === "@john.petra.ac.id" && $cek_email_nrp->rowCount() == 1) {
            $cek_email = true;
        }

        if ($cek_email) {
            $_SESSION['access_token'] = $token['access_token'];
            $_SESSION['gmail'] = $gmail;
            $_SESSION['username'] = $username;
            $_SESSION['nrp'] = $nrp;
            $_SESSION['divisi'] = $divisi;

            header('Location: ./index.php');
        } else {
            $gagal  = "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: 'Email tidak punya access admin!'
                })
            </script>";
        }
    }
    else {
        // echo "error ygy";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS / LINK -->
    <?php include "../../assets/link/link.html"; ?>
    <link href="../../assets/css/admin/login.css" rel="stylesheet">
    <script src="../../assets/js/gsap.js"></script>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <title>Admin CAPITAL 2024 | Login Simulation</title> 
</head>
<body>
    <?php
    if (!empty($gagal))
        echo $gagal;
    ?>
    <div class="wrapper">
        <div class="logo">
            <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG" alt="">
        </div>
        <div class="text-center mt-4 name">
            Admin Games
        </div>
        <div class="flex-column d-flex mt-4 justify-content-center">
            <a class="btn btn-primary mt-2" href="<?= $client->createAuthUrl(); ?>">Sign in with Google</a>
            <p class="text-center mt-3 mb-0 fw-semilight" style="font-size: 15px;">* Gunakan email PCU</p>
        </div>
    </div>
</body>

</html>