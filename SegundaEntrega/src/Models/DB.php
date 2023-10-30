<?php

const HOST = "mysql:host=localhost;dbname=mydb";
const USER_DB = "root";
const DATABASE_NAME = "mydb";

$conn = new PDO(HOST, USER_DB, null);

if ($conn->errorCode()) {
    throw new Exception($conn->errorInfo(), $conn->errorCode());
}

// Nos permite setear por default el schema que queramos, para que en las querys no tener que hacer mydb.tabla

//echo "🚀 Conexión establecida";