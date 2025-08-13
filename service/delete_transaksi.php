<?php
header("Content-Type:application/json");

require_once __DIR__. "/../config/connection_db.php";

$dataRaw = file_get_contents("php://input");

$data = json_decode($dataRaw, true);

if (!isset($data['id_transaksi'])) {
    echo json_encode(["success" => false, "message" => "ID tidak dikirim"]);
    exit;
}

$con = connectToDb();

$query =  "DELETE FROM apotik_transaksi WHERE `apotik_transaksi`.`id_transaksi` = ?";

$stmt = $con->prepare($query);


$stmt->bind_param("s", $data['id_transaksi']);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil dihapus"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menghapus data"]);
}

$stmt->close();
$con->close();