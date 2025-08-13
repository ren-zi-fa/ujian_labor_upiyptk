<?php
header("Content-Type:application/json");

require_once __DIR__ . "/../config/connection_db.php";

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID tidak ditemukan"]);
    exit;
}
$id = (int) $_GET['id']; 
$connection = connectToDb();

$query = "SELECT `kode_obat`, `nama_obat`, `jenis_obat`, `harga_obat`, `stok_obat`, `id` FROM `apotik_obat` WHERE id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

echo json_encode(["data"=>$result->fetch_assoc()]);
$stmt->close();
$connection->close();