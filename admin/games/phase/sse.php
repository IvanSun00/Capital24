<?php
try{
    // Set file mime type event-stream
    // session_start();
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    ob_end_flush();
// flush();


// header("Connection: keep-alive");
// // connection
$host = "127.0.0.1";
$db = "capital";
$user = "root";
$pass = "";
$charset = "utf8mb4";
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Error Connect to Database Msg: " . $e->getMessage();
    exit();
}


// Loop until the client close the stream
$sql = "SELECT * FROM game_phase";
$result = $conn->query($sql);
$row = $result->fetch();
$last_update = $row['updated_at'];
while(true) { 
    if (connection_aborted()) {
        break;
    }
    $sql = "SELECT * FROM game_phase";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $updated_at = $row['updated_at'];
    // last update
    if($last_update != $updated_at){
        // echo "data: {$updated_at} and last {$last_update}\n\n";
        echo "data: {$row['phase_end']}\n\n";
        // break;
        flush();
        $last_update = $updated_at;
    }
    sleep(1);
}
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// $time = date('r');
// // echo "data: The server time is: {$time}\n\n";
// // flush();
// $sql = "SELECT * FROM game_phase";
// $result = $conn->query($sql);
// $row = $result->fetch();
// $last_update = $row['updated_at'];
// // last update
// echo "data: {$last_update}\n\n";
// flush();
// Close the SSE connection when the client reloads
// if (connection_aborted()) {
//     exit();
// }

// while (true) {
//     $sql = "SELECT * FROM game_phase";
//     $result = $conn->query($sql);
//     $row = $result->fetch();
//     $updated_at = $row['updated_at'];
//     $time = date('r');

//     echo "data: The server time is: {$time}\n\n";
//         flush();
//     // Check if there is an update
//     // if ($updated_at > $last_update) {
//     //     $last_update = $updated_at;
        
//     // }

//     // Adjust the sleep duration as needed
//     sleep(1); // Sleep for 1 second before checking for updates again
// }

// $flag = true;
// do{
//     $sql = "SELECT * FROM game_phase";
//     $result = $conn->query($sql);
//     $row = $result->fetch();
//     $updated_at = $row['updated_at'];
//     if($last_update != $updated_at){
//         $last_update = $updated_at;
//         $time = date('r');
//         echo "data: The server time is: {$time}\n\n";
//         $flag = false;
//     }
//     // sleep(10);
// }while($flag);
// flush();

// Loop 
?>