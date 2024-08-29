<?php
require_once '../../pendaftaran/conn.php';
// check session
// if(!isset($_SESSION['nrp']) || $_SESSION['nrp'] == ''){
//     header('Location: ../login.php');
//      exit();
// }

if(isset($_POST['id_kelompok']) && isset($_POST['nominal'])){
  $id_kelompok = $_POST['id_kelompok'];
  $nominal = $_POST['nominal'];
  if(!is_numeric($nominal) || $nominal <= 0){
    echo json_encode([
      "success" => false,
      "msg" => "Nominal tidak boleh kurang dari 0"
    ]);
    exit();
  }

  // logic
  $sql = "SELECT * FROM game_kelompok where id_kelompok = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_kelompok]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);

  //cek apakah punya hutang
  if($data['sisa_pinjaman'] <= 0){
    echo json_encode([
      "success" => false,
      "msg" => "Tidak ada hutang"
    ]);
    exit();
  }
  //cek apakah bayar > sisa hutang
  if($data['sisa_pinjaman'] < $nominal){
    echo json_encode([
      "success" => false,
      "msg" => "Bayar terlalu banyak"
    ]);
    exit();
  }
  //cek dana mencukupi
  if($data['uang'] < ($nominal)){
    echo json_encode([
      "success" => false,
      "msg" => "Dana tidak mencukupi"
    ]);
    exit();
  }
  
  try{
    $conn->beginTransaction();
    // update data kelompok
    $sql = "UPDATE game_kelompok SET uang = uang - ?, sisa_pinjaman = sisa_pinjaman - ?  where id_kelompok = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nominal,$nominal,$id_kelompok]);

    // input tabel transaksi
    $sql = "INSERT INTO game_transaksi VALUES(null,?,?, 'OUT', 'Bayar Pinjaman',current_timestamp())";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_kelompok,$nominal]);
    
    $conn->commit();
    echo json_encode([
      'success' => true, 
      'msg' => 'Berhasil bayar pinjaman',
    ]);
  }catch(\PDOException $e){
    $conn->rollBack();
    die($e->getMessage());
  }

}

?>