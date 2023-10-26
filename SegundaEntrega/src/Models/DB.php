<?php
namespace App\Models;
const HOST = "localhost";
const USER_DB = "root";
const DATABASE_NAME = "mydb";

$conn = new mysqli(HOST, USER_DB, null, DATABASE_NAME);

if ($conn->connect_error) {
    throw new Exception($conn->connect_error, $conn->connect_errno);
}

// Nos permite setear por default el schema que queramos, para que en las querys no tener que hacer mydb.tabla
mysqli_select_db($conn, "mydb");

//echo "🚀 Conexión establecida";