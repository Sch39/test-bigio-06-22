<?php

require './20/connection.php';


function create_databases()
{
  $host = "localhost";
  // port mysql
  $port = 3306;
  $username = "root";
  $password = "";
  $db = "sekolah";

  try {
    $db_conn = new PDO("mysql:host=$host:$port", $username, $password);
    $db_conn->exec("CREATE DATABASE IF NOT EXISTS `$db`;");
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


function create_table(array $querys)
{


  $conn = getConnection();

  try {
    foreach ($querys as $query) {
      $conn->query($query);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}



function query_table(): array
{
  $querys_init = [
    "CREATE TABLE IF NOT EXISTS `kelas` (
      `kelas_id` INT(11) NOT NULL AUTO_INCREMENT,
      `kelas_nama` varchar(50) DEFAULT NULL,
      PRIMARY KEY (`kelas_id`)
    );",

    "INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
    (1, 'X-1'),
    (2, 'X-2'),
    (3, 'X-3'),
    (4, 'X-4'),
    (5, 'X-5'),
    (6, 'X-6');",

    "CREATE TABLE IF NOT EXISTS `nilai` (
      `nilai_id` int(11) NOT NULL AUTO_INCREMENT,
      `id` int(11) DEFAULT NULL,
      `pelajaran_id` int(11) DEFAULT NULL,
      `tahun_id` int(11) DEFAULT NULL,
      `semester_id` int(11) DEFAULT NULL,
      `nilai_kkm` int(11) DEFAULT NULL,
      `nilai_poin` int(11) DEFAULT NULL,
      PRIMARY KEY (`nilai_id`),
      KEY `siswa_id` (`id`),
      KEY `pelajaran_id` (`pelajaran_id`),
      KEY `tahunajaran_id` (`tahun_id`),
      KEY `semester_id` (`semester_id`)
    );",

    "INSERT INTO `nilai` (`nilai_id`, `id`, `pelajaran_id`, `tahun_id`, `semester_id`, `nilai_kkm`, `nilai_poin`) VALUES
    (119, 27, 1, 1, 1, 60, 59),
    (120, 27, 2, 1, 1, 55, 80),
    (122, 25, 1, 1, 1, 60, 88),
    (125, 28, 1, 1, 1, 70, 69),
    (126, 29, 1, 1, 1, 70, 80),
    (127, 28, 1, 1, 1, 89, 56),
    (128, 29, 1, 1, 1, 89, 88),
    (129, 32, 2, 1, 2, 70, 90);",

    "CREATE TABLE IF NOT EXISTS `pelajaran` (
      `pelajaran_id` int(11) NOT NULL AUTO_INCREMENT,
      `pelajaran_nama` varchar(50) NOT NULL,
      PRIMARY KEY (`pelajaran_id`)
    );",

    "INSERT INTO `pelajaran` (`pelajaran_id`, `pelajaran_nama`) VALUES
    (1, 'MTK'),
    (2, 'BIO'),
    (3, 'FIS'),
    (4, 'BHS'),
    (5, 'INGG');",

    "CREATE TABLE IF NOT EXISTS `semester` (
      `semester_id` int(11) NOT NULL AUTO_INCREMENT,
      `semester_nama` int(11) NOT NULL,
      PRIMARY KEY (`semester_id`)
    );",

    "INSERT INTO `semester` (`semester_id`, `semester_nama`) VALUES
    (1, 1),
    (2, 2);",

    "CREATE TABLE IF NOT EXISTS `tahun` (
      `tahun_id` int(11) NOT NULL AUTO_INCREMENT,
      `tahun_nama` varchar(20) DEFAULT NULL,
      PRIMARY KEY (`tahun_id`)
    );",

    "INSERT INTO `tahun` (`tahun_id`, `tahun_nama`) VALUES
    (1, '2014/2015');",

    "CREATE TABLE IF NOT EXISTS `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nomor_induk` varchar(30) DEFAULT NULL,
      `name` varchar(50) DEFAULT NULL,
      `username` varchar(30) DEFAULT NULL,
      `password` varchar(32) DEFAULT NULL,
      `telp` varchar(16) DEFAULT NULL,
      `alamat` text,
      `status` varchar(25) DEFAULT NULL,
      `jenis_kelamin` varchar(25) DEFAULT NULL,
      `kelas_id` int(11) DEFAULT NULL,
      `access` varchar(30) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `kelas_id` (`kelas_id`),
      KEY `kelas_id_2` (`kelas_id`)
    );",

    "INSERT INTO `users` (`id`, `nomor_induk`, `name`, `username`, `password`, `telp`, `alamat`, `status`, `jenis_kelamin`, `kelas_id`, `access`) VALUES
    (10, NULL, 'Administrator', 'admin', 'admin', '085761167894', 'Padang', 'PNS', 'Perempuan', NULL, 'admin'),
    (25, '56', 'siswa', 'siswa', 'siswa', '456', 'frghf', 'PNS', 'Perempuan', 4, 'siswa'),
    (26, 'op', 'guru', 'guru', 'guru', 'op', 'op', 'Honorer', 'Laki-laki', 1, 'guru'),
    (27, '1', 'Ary', 'ary', 'ary', '123422', 'asdas', 'dasdas', 'asdas', 2, 'siswa'),
    (28, '675675', 'hfgh', 'tgfhf', 'sd', '3453', 'sdfsd', 'Aktif', 'Laki-laki', 1, 'siswa'),
    (29, '345', 'fsd', 'sdf', 'sd', '3453', 'sdfsd', 'Aktif', 'Laki-laki', 1, 'siswa'),
    (30, '163051100', 'Udin', 'udin', 'udin', '089699996666', 'Cipulang', 'PNS', 'Laki-laki', 6, 'guru'),
    (31, '1630', 'Siti', 'siti', 'siti', '0819213', 'iti', 'Aktif', 'Perempuan', 5, 'siswa'),
    (32, '1630511', 'nada', 'nada', 'nada', '085255552222', 'Manggarai', 'Aktif', 'Perempuan', 6, 'siswa');",
  ];

  return $querys_init;
}


create_databases();
create_table(query_table());
