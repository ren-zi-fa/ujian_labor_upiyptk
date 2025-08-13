<?php
header("Content-Type:application/json");

require_once __DIR__. "/../config/connection_db.php";

$dataRaw = file_get_contents("php://input");

$data = json_decode($dataRaw, true);
if (empty($data['kode_obat']) || 
    empty($data['nama_obat']) || 
    empty($data['jenis_obat']) || 
    empty($data['harga_obat']) || 
    empty($data['stok_obat'])) 
{
    echo json_encode(["success" => false, "message" => "Data tidak lengkap"]);
    exit;
}


$con = connectToDb();
$query = "INSERT INTO apotik_obat (kode_obat, nama_obat, jenis_obat, harga_obat, stok_obat) VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($query);
$stmt->bind_param("sssdi", $data['kode_obat'], $data['nama_obat'], $data['jenis_obat'], $data['harga_obat'], $data['stok_obat']);

if($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menambahkan data"]);
}
$stmt->close();
$con->close();
