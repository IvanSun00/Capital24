<?php
require "../conn.php";

$sql = "SELECT COUNT(id) as count FROM kelompok";
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count >= 52) {
    echo 'closed'; 
} else {
    header("Location: ../register/register.php");
}
?>