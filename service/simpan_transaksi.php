<?php 
header("Content-Type:application/json");
require_once __DIR__ . "/../config/connection_db.php";

$con = connectToDb();
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (
    !isset($data['id_transaksi']) || $data['id_transaksi'] === "" ||
    !isset($data['tgl_transaksi']) || $data['tgl_transaksi'] === "" ||
    !isset($data['kode_obat']) || $data['kode_obat'] === "" ||
    !isset($data['nama_obat']) || $data['nama_obat'] === "" ||
    !isset($data['stok_obat']) || $data['stok_obat'] === "" ||
    !isset($data['harga_obat']) || $data['harga_obat'] === "" ||
    !isset($data['jumlah_beli']) || $data['jumlah_beli'] === "" ||
    !isset($data['total']) || $data['total'] === "" ||
    !isset($data['diskon']) || $data['diskon'] === "" ||
    !isset($data['total_bayar']) || $data['total_bayar'] === ""
) {
    echo json_encode(["success" => false,"message" => "Data tidak lengkap" ]);
    exit;
}

$sql = "INSERT INTO `apotik_transaksi`(`id_transaksi`, `tgl_transaksi`, `kode_obat`, `jumlah_beli`, `total`, `diskon`, `total_bayar`) VALUES (?,?,?,?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param(
    "sssiddd",
    $data["id_transaksi"],
    $data["tgl_transaksi"],
    $data["kode_obat"],
    $data["jumlah_beli"],
    $data["total"],
    $data["diskon"],
    $data["total_bayar"]
);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil disimpan"]);
} else {
    echo json_encode(["success" => false, "message" => $stmt->error]);
}

$stmt->close();
$con->close();
