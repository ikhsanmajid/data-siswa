<?php
error_reporting(1);
define('BASEPATH',dirname(__FILE__));
include('koneksi/koneksi.php');
$result=$koneksi->query('SELECT kelas FROM data_kelas');
?>
<form action="" method="POST">
	<select name='kelas'>
		<?php
		while($hasilk=$result->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='".$hasilk['kelas']."'>".$hasilk['kelas']."</option>"."\n";
		}
		?>
	</select>
	<input type="submit" value="SEARCH" name="SUBMIT"/>
</form>
<?php
//IF SUBMIT BUTTON PRESSED
if (isset($_POST['SUBMIT'])){
	$kelas = $_POST['kelas'];
	echo $kelas." ";
	$isi = "SELECT noabs,nama,kelas FROM data_siswa WHERE `kelas`= '".$kelas."' ORDER BY noabs asc";
	$query = $koneksi->query($isi);
//	var_dump($query);
	$i=1;
	if ($query->rowCount()>0){
	?>
		<table border=1>
			<thead>
				<tr>
				<th>NO</th>
				<th>nama</th>
				<th>kelas</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($hasil = $query->fetch(PDO::FETCH_OBJ)) {
					echo '<tr>';
					//echo '<td>'.$i.'</td>';
					echo '<td>'.$hasil->noabs.'</td>';
				    echo '<td>'.$hasil->nama.'</td>';
				    echo '<td>'.$hasil->kelas.'</td>';
				    echo '</tr>';
				    $i++;
				}
				?>
			</tbody>
	<?php
	}
else {
	echo "DATA KOSONG";
	}
}
?>