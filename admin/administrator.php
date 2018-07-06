<?php
define('BASEPATH',dirname(__FILE__));
include('../koneksi/koneksi.php');
?>
<form action="" method="POST">
	<input class="form-control" class="textbox" type="text" placeholder="kelas" name="kelas">
	<input class="form-control" class="textbox" type="text" placeholder="walikelas" name="wali">
	<input class="form-control" class="textbox" type="text" placeholder="jumlahsiswa" name="jumlah">
	<input class="form-control" class="textbox" type="text" placeholder="ketua" name="ketua">
	<input class="form-control" class="textbox" type="text" placeholder="wakil" name="wakil">
	<input class="form-control" class="textbox" type="text" placeholder="bendahara" name="bendahara">
	<input class="form-control" class="textbox" type="text" placeholder="sekretaris" name="sekretaris">	
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

	if(!empty($kelas AND $wali AND $jumlah AND $ketua AND $wakil AND $bendahara AND $sekretaris)){
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
	echo $query->rowCount();
	}
	elseif(empty($kelas AND $wali AND $jumlah AND $ketua AND $wakil AND $bendahara AND $sekretaris)){
		echo "DATA TIDAK BOLEH KOSONG !";
	}
	else{
		echo "MANIPULATED SERVER DETECTED !! :(";
	}
}
?>