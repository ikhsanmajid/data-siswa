<!--DOCTYPE html-->
<html>
<head>
	<title>ADMINISTRATOR PAGE</title>
	<link href="../assets/css/bootstrap.css" type="text/css" rel="stylesheet"/>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/jQuery.js"></script>
	<script src="../assets/js/datatables.js"></script>
</head>
<body>
<?php
define('BASEPATH',dirname(__FILE__));
include('../assets/header.php');
include('../koneksi/koneksi.php');
echo "\n \n \n";
?>
<div class="container">
<form action="" method="POST">
	<div class="form-group">
		<label>KELAS :</label>
	<input class="form-control" type="text" placeholder="kelas" name="kelas"/>
	</div>
	<div class="form-group">
		<label>WALI KELAS :</label>
	<input class="form-control" type="text" placeholder="walikelas" name="wali"/>
	</div>
	<div class="form-group">
		<label>JUMLAH SISWA :</label>
	<input class="form-control" type="text" placeholder="jumlahsiswa" name="jumlah"/>
	</div>	
	<div class="form-group">
		<label>KETUA KELAS :</label>
	<input class="form-control" type="text" placeholder="ketua" name="ketua"/>
	</div>
	<div class="form-group">
		<label>WAKIL KETUA :</label>
	<input class="form-control" type="text" placeholder="wakil" name="wakil"/>
	</div>	
	<div class="form-group">
		<label>BENDAHARA :</label>
	<input class="form-control" type="text" placeholder="bendahara" name="bendahara"/>
	</div>
	<div class="form-group">
		<label>SEKRETARIS :</label>
	<input class="form-control" type="text" placeholder="sekretaris" name="sekretaris"/>	
	</div>
	<input type="submit" name="submit" value="submit"/>
</form>
<?php
if (isset($_POST['submit'])){
	$id=NULL;
	$kelas=$_POST['kelas'];
	$wali=$_POST['wali'];
	$jumlah=$_POST['jumlah'];
	$ketua=$_POST['ketua'];
	$wakil=$_POST['wakil'];
	$bendahara=$_POST['bendahara'];
	$sekretaris=$_POST['sekretaris'];
	//CHECK IF "KELAS" EXIST
	$stmt = "SELECT `kelas` FROM data_kelas WHERE `kelas` = '".$kelas."'";
	//echo $stmt;
	$check = $koneksi->query($stmt);
	$checking = $check->rowCount();
	if ($checking > 0){
		echo "DATA SUDAH ADA";
	}
	else if($checking == 0){

		if(!empty($kelas) && !empty($wali) && !empty($jumlah) && !empty($ketua) && !empty($wakil) && !empty($bendahara) && !empty($sekretaris)){
		$query = $koneksi->prepare('INSERT INTO data_kelas (`id`, `kelas`, `wali_kelas`, `jumlah_siswa`, `ketua_kelas`, `wakil`, `bendahara`, `sekretaris`) VALUES (?,?,?,?,?,?,?,?)');
		$query->bindParam(1, $id);
		$query->bindParam(2, $kelas);
		$query->bindParam(3, $wali);
		$query->bindParam(4, $jumlah);
		$query->bindParam(5, $ketua);
		$query->bindParam(6, $wakil);
		$query->bindParam(7, $bendahara);
		$query->bindParam(8, $sekretaris);
		$query->execute();
			if ($query->rowCount()>0){
				echo "DATA TELAH MASUK !";
			}
		}
		else{
			echo " DATA TIDAK BOLEH KOSONG";
		}
	}
}
?>
</body>
<?php
include('../assets/footer.php');
?>
</div>
</html>