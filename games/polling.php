<?php
require_once "../user/conn.php";
// check session



if($_SERVER['REQUEST_METHOD'] === 'POST'){

  if(isset($_POST['phase_end'])){
    // query db
    $sql = "SELECT * FROM game_phase";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch();
    $phase_end_new = strtotime($row['phase_end']);
    $phase_end_old = strtotime($_POST['phase_end']);
    if($phase_end_new != $phase_end_old){
      echo json_encode([
        'success' => true,
        'phase_end' => $row['phase_end'],
        'phase' => $row['phase']
      ]);
      exit();
    }

    echo json_encode([
      'success' => false,
      'phase_end' => $row['phase_end']
    ]);
  }
}



?>