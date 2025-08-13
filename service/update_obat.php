<?php
header("Content-Type: application/json");
require_once __DIR__ . "/../config/connection_db.php";

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['id'])) {
    echo json_encode(["success" => false, "message" => "ID tidak ditemukan"]);
    exit;
}

$con = connectToDb();
$stmt = $con->prepare("UPDATE apotik_obat SET kode_obat=?, nama_obat=?, jenis_obat=?, harga_obat=?, stok_obat=? WHERE id=?");
$stmt->bind_param("sssdii", 
    $data['kode_obat'], 
    $data['nama_obat'], 
    $data['jenis_obat'], 
    $data['harga_obat'], 
    $data['stok_obat'],
    $data['id']
);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil diubah"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal mengubah data"]);
}

$stmt->close();
$con->close();
