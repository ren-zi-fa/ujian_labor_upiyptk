<?php
header("Content-Type:application/json");
require_once __DIR__."/../config/connection_db.php";

$con = connectToDb();

$sql = "SELECT * FROM `apotik_transaksi` WHERE 1";

$result = $con->query($sql);

$rows = [];

while ($row = $result->fetch_assoc()){
    $rows[] = $row;
}

echo json_encode(["data"=>$rows]);

$con->close();