<?php
defined('BASEPATH') or die("FILE PROTECTED !! <br> DILARANG DIRECT ACCESS");
try {
	$koneksi = new PDO("mysql:host=db4free.net;dbname=ikhsanmajid","sandaljebat7","7jebatsendal");
	$koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $gagal){
	echo $gagal->getMessage();
	die();
}
