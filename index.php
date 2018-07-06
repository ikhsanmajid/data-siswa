<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['nama'])){
	header('Location: visitor.php');
	die();
}
elseif (isset($_SESSION['nama'])) {
	if ($_SESSION['level']='siswa'){
		header('Location: siswa.php');
	}
	elseif ($_SESSION['level']='guru') {
		header('Location: guru.php');
	}
	elseif ($_SESSION['level']='administrator') {
		header('Location: admin.php');
	}
}
else{
	session_destroy();
	die('tidak dikenal');
}
?>