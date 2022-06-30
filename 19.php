<?php
$host = "localhost";
// port mysql
$port = 3306;
$username = "root";
$password = "";
$db = "point_of_sales";

try {
  $db_conn = new PDO("mysql:host=$host:$port", $username, $password);
  $db_conn->exec("CREATE DATABASE IF NOT EXISTS `$db`;");
} catch (PDOException $e) {
  echo $e->getMessage();
}

function getConnection(): PDO
{
  global $host, $port, $username, $password, $db;
  $charset = 'utf8mb4';
  $conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset;port=$port", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($conn) {
    echo "Connected to the $db database successfully!" . PHP_EOL . PHP_EOL;
  }
  return $conn;
}

$connect = getConnection();



$querys_init = [
  "CREATE TABLE IF NOT EXISTS `user`(
    `kode_karyawan` VARCHAR(6) NOT NULL,
    `username` VARCHAR(30) NOT NULL,
    `password` VARCHAR(30) NOT NULL,
    `nama` VARCHAR(30) NOT NULL,
    `level` ENUM('admin', 'pegawai', 'kasir') NOT NULL,
    PRIMARY KEY(`kode_karyawan`)
    );",

  "CREATE TABLE IF NOT EXISTS `user_detail`(
    `kode_karyawan` VARCHAR(6) NOT NULL,
    `tgl_lahir` DATE NOT NULL,
    `alamat` VARCHAR(120) NOT NULL,
    `no_telp` VARCHAR(15) NOT NULL,
    FOREIGN KEY(`kode_karyawan`) REFERENCES `user`(`kode_karyawan`)
  );",

  "CREATE TABLE IF NOT EXISTS `toko_cabang`(
    `kode_pelanggan` VARCHAR(6) NOT NULL,
    `nama_toko` VARCHAR(20) NOT NULL,
    `alamat` VARCHAR(100) NOT NULL,
    `no_telp` VARCHAR(15) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    PRIMARY KEY(`kode_pelanggan`)
  );",

  "CREATE TABLE IF NOT EXISTS `produk`(
    `kode_produk` VARCHAR(10) NOT NULL,
    `nama_produk` VARCHAR(30) NOT NULL,
    `detail_produk` VARCHAR(20) NOT NULL,
    `harga` INT(10) NOT NULL,
    `stok` INT(3) NOT NULL,
    PRIMARY KEY(`kode_produk`)
  );",

  "CREATE TABLE IF NOT EXISTS `transaksi`(
    `kode_transaksi` VARCHAR(5) NOT NULL,
    `tgl_transaksi` DATE NOT NULL,
    `total` INT(15) NOT NULL,
    `bayar` INT(15) NOT NULL,
    `kembalian` INT(15) NOT NULL,
    PRIMARY KEY(`kode_transaksi`) 
  );",

  "CREATE TABLE IF NOT EXISTS `transaksi_detail`(
    `kode_transaksi` VARCHAR(5) NOT NULL,
    `kode_produk` VARCHAR(10) NOT NULL,
    `nama_produk` VARCHAR(30) NOT NULL,
    `sub_total` INT(10) NOT NULL,
    FOREIGN KEY(`kode_transaksi`) REFERENCES `transaksi`(`kode_transaksi`),
    FOREIGN KEY(`kode_produk`) REFERENCES `produk`(`kode_produk`)
  );",

  "CREATE TABLE IF NOT EXISTS `pesanan`(
    `kode_pelanggan` VARCHAR(5) NOT NULL,
    `kode_pesan` VARCHAR(6) NOT NULL,
    `tgl_pesan` DATE NOT NULL,
    `total` INT(15) NOT NULL,
    PRIMARY KEY(`kode_pesan`)
  );",

  "CREATE TABLE IF NOT EXISTS `pesanan_detail`(
    `kode_pesan` VARCHAR(6) NOT NULL,
    `kode_produk` VARCHAR(10) NOT NULL,
    `nama_produk` VARCHAR(30) NOT NULL,
    `qty` INT(10) NOT NULL,
    `sub_total` INT(10) NOT NULL,
    FOREIGN KEY(`kode_pesan`) REFERENCES `pesanan`(`kode_pesan`),
    FOREIGN KEY(`kode_produk`) REFERENCES `produk`(`kode_produk`)
  );"
];

try {
  foreach ($querys_init as $query) {
    $connect->query($query);
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
