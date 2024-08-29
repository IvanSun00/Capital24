<?php
require_once "../../pendaftaran/conn.php";
// check session 
// if(!isset($_SESSION['nrp']) || $_SESSION['nrp'] == ''){
//     header('Location: ../login.php');
//      exit();
// }

if(isset($_POST['id_kelompok'])){
  $id_kelompok = $_POST['id_kelompok'];
  $sql = "SELECT gk.uang, gk.sisa_pinjaman, k.nama_kelompok FROM game_kelompok gk join kelompok k on gk.id_kelompok = k.id  where id_kelompok = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_kelompok]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  echo json_encode([
    "success" => true,
    "data" => $data
  ]);
  exit();
}

?>