<?php
defined('BASEPATH') or die("FILE PROTECTED !! <br> DILARANG DIRECT ACCESS");
try {
	$koneksi = new PDO("mysql:host=127.0.0.1;dbname=data_sekolah","root","123");
	$koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $gagal){
	echo $gagal->getMessage();
	die();
}