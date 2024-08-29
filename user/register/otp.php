<?php
include '../conn.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once '../../admin/pendaftaran/api/PHPMailer/PHPMailer.php';
require_once '../../admin/pendaftaran/api/PHPMailer/SMTP.php';
require_once '../../admin/pendaftaran/api/PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // kalau tidak terdaftar   
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = $_SESSION['email'];
    }
    $stmt = $conn->prepare("SELECT * FROM kelompok WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) <= 0) {
        echo 'tdkterdaftar';
    } else {
        if ($_POST['type'] == 'getOTP') {
            $_SESSION['otp'] = rand(100000, 999999);
            $_SESSION['email'] = $email;
            //EMAIL
            $mail = new PHPMailer();
            $name = 'CAPITAL 2024 OTP';
            $subject = 'OTP for Change Password';

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'capital.cbi@petra.ac.id';
            $mail->Password = 'zxlo exht siha ppaa';
            $mail->Port = 587; 
            $mail->SMTPSecure = 'tls'; 

            //Email Setting
            $mail->isHTML(true);
            $mail->setFrom($mail->Username, $name);
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $isi = '<div>Hai! 👋<br>
            Berikut ini merupakan kode OTP untuk akun CAPITAL kalian ✨<br>
            <br>
            Kode: ' . $_SESSION['otp'] . '<br>
            <br>
            Salam hangat, <br>
            CAPITAL 2024</div>
            <br>
            ————————————————————————————————————————————<br>
            <br>
            Hello! 👋<br>
            Here is the OTP code for your CAPITAL account ✨<br>
            <br>
            Code: ' . $_SESSION['otp'] . '<br>
            <br>
            Best regards,<br>
            CAPITAL 2024 <br>
            ';
            $body = $isi;
            $mail->Body = $body;


            if (!$mail->send()) { 
                echo 'gagal';
            } else {
                echo 'success';
            }
        } else if ($_POST['type'] == 'verifyOTP') {
            if ($_SESSION['otp'] ==  $_POST['thisdata']) {
                $_SESSION['otp'] = 'valid';
                echo 'success';
            } else {
                echo 'gagal';
            }
        } else if ($_POST['type'] == 'newPass' and $_SESSION['otp'] == 'valid') {
            $newPass = $_POST['pass'];
            $hash = password_hash($newPass, PASSWORD_DEFAULT);
            $email = $_SESSION['email'];
            if (strlen($newPass) >= 8) {
                $stmt = $conn->prepare("UPDATE kelompok set password = ? where email = ?");
                $berhasil = $stmt->execute([$hash, $email]);
                if ($berhasil) {
                    echo 'success';
                } else {
                    echo 'gagal';
                }
            } else {
                echo 'gagal';
            }
        } else {
            echo 'gagal';
        }
    }
}
?>