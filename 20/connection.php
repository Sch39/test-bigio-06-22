<?php
function getConnection(): PDO
{
  $host = "localhost";
  // port mysql
  $port = 3306;
  $username = "root";
  $password = "";
  $db = "sekolah";


  $charset = 'utf8mb4';
  $conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset;port=$port", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($conn) {
    echo "Connected to the $db database successfully!" . PHP_EOL . PHP_EOL;
  }
  return $conn;
}
