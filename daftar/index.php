<?php 
include '../koneksi.php';
?>
DAFTAR FILM
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
<a href="pesan_tiket.php">Pesan Tiket</a>
</br>
<a href="../">kembali</a>