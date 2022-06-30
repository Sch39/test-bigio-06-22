<?php
session_start();
require_once "connection.php";
$user = $_POST['user'];
$pass = $_POST['pass'];
$conn = Getconnection();
try{
	$cari = $conn->query("select *,'siswa' as level from siswa where nis='$user' and password_siswa='$pass' 
								union 
							   select *,'ortu' as level from siswa where nis='$user' and password_ortu='$pass' ");
}catch(PDOException $e){
	$e->getMessage();
}
	$htng = $cari->fetchColumn();
	if(($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]))
	{ header('location:index.php?pass=capca&user='.$user); }
	else if($htng!=0)
	{
		$u= $cari->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id']= $u['nis'];
			$_SESSION['nama']= $u['nama'];
			$_SESSION['level']= $u['level'];
		header('location:administrator/home.php');
	}else{
		header('location:index.php?pass=cek');
	}
