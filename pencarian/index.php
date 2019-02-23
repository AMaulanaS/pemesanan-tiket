<?php 
include '../koneksi.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:login/index.php");
}
 
?>
 
<h3>Form Pencarian</h3>
 
<form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
	<tr>
		<th>No</th>
		<th>Judul Film</th>
		<th>Durasi</th>
		<th>Kategori Film</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($con,"select * from film where judul_film like '%".$cari."%'");				
	}else{
		$data = mysqli_query($con,"select * from film");		
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['judul_film']; ?></td>
		<td><?php echo $d['durasi']; ?></td>
		<td><?php echo $d['kategori_film']; ?></td>
	</tr>
	<?php } ?>
</table>

<a href="../">kembali</a>