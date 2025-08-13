<?php
header("Content-Type:application/json");

require_once __DIR__ . "/../config/connection_db.php";

$connection = connectToDb();

$query = "SELECT `kode_obat`, `nama_obat`, `jenis_obat`, `harga_obat`, `stok_obat`, `id` FROM `apotik_obat` WHERE 1";

$result = $connection->query($query);

$rows = [];

while ($row = $result->fetch_assoc()){
    $rows[] = $row;
}

echo json_encode(["data"=>$rows]);

$connection->close();