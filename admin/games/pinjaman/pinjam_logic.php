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
  //update jumlah uang dan pinjaman di tabel kelompok 
  try{
    $conn->beginTransaction();
    $query = "UPDATE game_kelompok SET sisa_pinjaman = sisa_pinjaman + ?, uang = uang + ? where id_kelompok=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nominal,$nominal,$id_kelompok]);
    
    // input tabel transaksi
    $query = "INSERT INTO game_transaksi VALUES(null,?,?,'IN', 'Pinjam Bank',current_timestamp())";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id_kelompok,$nominal]);

    $conn->commit();
    echo json_encode([
      'success' => true, 
      'msg' => 'berhasil tambah pinjaman',
    ]);
    return;
    
  }catch(\PDOException $e){
    $conn->rollBack();

    die($e->getMessage());
  }



  echo json_encode([
    "success" => false,
    "msg" => "Unexpected Error ",
  ]);

  exit();
}

?>