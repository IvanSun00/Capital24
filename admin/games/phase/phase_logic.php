<?php
require_once '../../pendaftaran/conn.php';
// check session
// if(!isset($_SESSION['nrp']) || $_SESSION['nrp'] == ''){
//     header('Location: ../login.php');
//      exit();
// }

$arr = [
  //phase 1
  [
    [
      'INPC'=>9900,	'ISOL'=>12500,	'BRPO'=>4570,	'CNNI'=>2520,	'FSTI'=>7700,	'BBRX'=>3650,	'MAPA'=>2800,	'INIY'=>3070,	'DNSA'=>14100,	'ITMW'=>20800
    ],
    [
      'INPC'=>9000,	'ISOL'=>12100,	'BRPO'=>4980,	'CNNI'=>2660,	'FSTI'=>10700,	'BBRX'=>3090,	'MAPA'=>3100,	'INIY'=>3470,	'DNSA'=>12000,	'ITMW'=>24000
    ],
    [
      'INPC'=>8900,	'ISOL'=>10900,	'BRPO'=>3470,	'CNNI'=>1860,	'FSTI'=>6300,	'BBRX'=>3390,	'MAPA'=>3240,	'INIY'=>3270,	'DNSA'=>16800,	'ITMW'=>28300,
    ]
  ],

  //phase 2
  [
    [
      'INPC'=>8500,	'ISOL'=>8900,	'BRPO'=>4780,	'CNNI'=>2840,	'FSTI'=>8200,	'BBRX'=>3720,	'MAPA'=>7200,	'INIY'=>1580,	'DNSA'=>13500,	'ITMW'=>20125,
    ],
    [
      'INPC'=>7900,	'ISOL'=>9500,	'BRPO'=>8010,	'CNNI'=>1690,	'FSTI'=>10000,	'BBRX'=>3520,	'MAPA'=>8350,	'INIY'=>1710,	'DNSA'=>14500,	'ITMW'=>19250,
    ],
    [
      'INPC'=>9500,	'ISOL'=>10700,	'BRPO'=>9010,	'CNNI'=>2160,	'FSTI'=>9000,	'BBRX'=>4480,	'MAPA'=>5750,	'INIY'=>1355,	'DNSA'=>19700,	'ITMW'=>13000,
    ]
  ],

  //phase 3
  [
    [
      'INPC'=>9500,	'ISOL'=>9300,	'BRPO'=>15040,	'CNNI'=>1610,	'FSTI'=>6000,	'BBRX'=>3480,	'MAPA'=>4600,	'INIY'=>1195,	'DNSA'=>13600,	'ITMW'=>11450,
    ],
    [
      'INPC'=>9900,	'ISOL'=>6200,	'BRPO'=>14440,	'CNNI'=>1920,	'FSTI'=>5000,	'BBRX'=>1050,	'MAPA'=>4200,	'INIY'=>7400,	'DNSA'=>21000,	'ITMW'=>7100,
    ],
    [
      'INPC'=>11400,	'ISOL'=>8400,	'BRPO'=>8360,	'CNNI'=>1550,	'FSTI'=>5100,	'BBRX'=>1750,	'MAPA'=>5500,	'INIY'=>1025,	'DNSA'=>18600,	'ITMW'=>8400,
    ]
  ],

  //phase 4
  [
    [
      'INPC'=>12000,	'ISOL'=>15700,	'BRPO'=>10950,	'CNNI'=>1220,	'FSTI'=>5200,	'BBRX'=>1720,	'MAPA'=>9950,	'INIY'=>1725,	'DNSA'=>16000,	'ITMW'=>13800,
    ],
    [
      'INPC'=>15000,	'ISOL'=>18700,	'BRPO'=>9910,	'CNNI'=>1810,	'FSTI'=>10700,	'BBRX'=>1190,	'MAPA'=>1265,	'INIY'=>1430,	'DNSA'=>12400,	'ITMW'=>11825,
    ],
    [
      'INPC'=>19100,	'ISOL'=>19300,	'BRPO'=>10660,	'CNNI'=>1310,	'FSTI'=>11000,	'BBRX'=>940,	'MAPA'=>3030,	'INIY'=>1330,	'DNSA'=>17500,	'ITMW'=>16000,
    ]
  ],

  //phase 5
  [
    [
      'INPC'=>23200,	'ISOL'=>17000,	'BRPO'=>8510,	'CNNI'=>1500,	'FSTI'=>10900,	'BBRX'=>1060,	'MAPA'=>5975,	'INIY'=>1540,	'DNSA'=>49000,	'ITMW'=>19350,
    ],
    [
      'INPC'=>34400,	'ISOL'=>16200,	'BRPO'=>8460,	'CNNI'=>1370,	'FSTI'=>10700,	'BBRX'=>1020,	'MAPA'=>3570,	'INIY'=>2710,	'DNSA'=>30000,	'ITMW'=>28800,
    ],
    [
      'INPC'=>35400,	'ISOL'=>15800,	'BRPO'=>8220,	'CNNI'=>950,	'FSTI'=>8300,	'BBRX'=>910,	'MAPA'=>2990,	'INIY'=>2870,	'DNSA'=>32000,	'ITMW'=>39425,
    ]
  ],

  

];
date_default_timezone_set('Asia/Jakarta');

  if(isset($_POST['next'])){
    $sql = "SELECT * FROM game_phase";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $phase = $row['phase'] + 1;
    $state = 0;
    $next45Minutes =  date('Y-m-d H:i:s', strtotime('+45 minutes'));

    if($phase > 5){
      echo json_encode([
        "success" => false,
        "msg" => "Tidak ada phase berikutnya",
        'error' => "",
      ]);
      exit();
    }

    try{
      $conn->beginTransaction();
        $sql = "UPDATE game_phase SET phase = $phase, state=0, phase_end = '$next45Minutes'";
        $stmt = $conn->query($sql);

        $sql = "SELECT id_kelompok,sisa_pinjaman  FROM game_kelompok where sisa_pinjaman > 0";
        $stmt2 = $conn->query($sql);
        $data = $stmt2->fetchAll(PDO::FETCH_KEY_PAIR);
        
    
        // hitung bunga bank 
          // tambahkan bunga bank ke pinjaman 
          $sql = "UPDATE game_kelompok SET sisa_pinjaman= sisa_pinjaman + sisa_pinjaman*0.2";
          $stmt = $conn->query($sql);

          // tambahkan informasi dalam transaksi 
          $map = array_map(function($item){
            return $item = round($item *0.2);
          }, $data);

          $sql = "INSERT INTO game_transaksi VALUES(null,?,?,'IN', 'Bunga Pinjaman',current_timestamp())";
          $stmt = $conn->prepare($sql);
          foreach($map as $id_kelompok => $sisa_pinjaman){
            $stmt->execute([$id_kelompok,$sisa_pinjaman]);
          }

        // update harga saham
        $data= $arr[$phase-1][$state];
        $sql = "UPDATE game_saham SET value = ? WHERE code = ?";
        $stmt = $conn->prepare($sql);
        foreach($data as $code => $value){
          $stmt->execute([$value,$code]);
        }

        $conn->commit();
        $success = true;
        $msg = "Berhasil Update Phase";
        $error= "";
  
    }catch(PDOException $e){
      $success = false;
      $msg = "Gagal Update Phase";
      $error = $e->getMessage();
      $conn->rollBack();
    }

    echo json_encode([
      "success" => $success,
      "msg" => $msg,
      'phase'=> $phase."-".$state,
      'phase_end'=> $next45Minutes,
      'error' => $error,
    ]);
  }


  if(isset($_POST['next_state'])){
    // pertama check phase sekarang 
    $sql = "SELECT * from game_phase";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch();
    $phase = $row['phase'];
    $state = $row['state']+1;

    if($state >= 3 || $phase == 0 || $phase >5){
      echo json_encode([
        "success" => false,
        "msg" => "Tidak ada state berikutnya",
        'error' => "",
      ]);
      exit();
    }

    try{
      // update state
      $conn->beginTransaction();
      $sql = "UPDATE game_phase SET state = $state";
      $stmt = $conn->query($sql);


      // update harga saham
      $data= $arr[$phase-1][$state];
     
      $sql = "UPDATE game_saham SET value = ? WHERE code = ?";
      $stmt = $conn->prepare($sql);
      foreach($data as $code => $value){
        $stmt->execute([$value,$code]);
      }
      $conn->commit();

      $success = true;
      $msg = "Berhasil Update State";
      $error= "";

    }catch(PDOException $e){
      $conn->rollBack();
      $success = false;
      $msg = "Gagal Update State";
      $error = $e->getMessage();
    }
    

    echo json_encode([
      "success" => true,
      "msg" => "Berhasil Update State",
      'error' => $error,
      'phase'=> $phase."-".($state),
    ]);
  }


  
  exit();
?>