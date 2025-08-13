<?php

$host = 'localhost';
$dbname = 'db_apotik';
$username = 'root';
$password = '';

function connectToDb (){
    global $host, $username, $password, $dbname;
    $con = new  mysqli($host,$username,$password,$dbname);
    if ($con->connect_error){
        http_response_code(500);
        echo json_encode("connection_failed");
    }
    return $con;

}

