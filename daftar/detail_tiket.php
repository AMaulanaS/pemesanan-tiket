<html>
<head>
	<title>Detail Tiket</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	
	<br/>
	
	
 
	<br/>
	<h3>Film</h3>
 
	<?php 
	include "../koneksi.php";
	
	$id_jadwal = $_GET['id_jadwal'];
	$query_mysql = mysqli_query($con,"SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'")or die(mysql_error());
	$nomor = 1;

	$data = mysqli_fetch_array($query_mysql);

	$id_film = $data['id_film'];
	$query_mysql2 = mysqli_query($con,"SELECT * FROM film WHERE id_film= '$id_film'")or die(mysql_error());
	$data2 = mysqli_fetch_array($query_mysql2);
	
	$jml_kursi=50;
	?>
	<form action="cetak_tiket.php?id_jadwal=<?php echo $data['id_jadwal']; ?>" method="post">		
		<table border="1" class="table">
			<tr>
				<td>Film</td>
				<td><?php $id_jadwal = $data['id_jadwal']; echo $data2['judul_film']; ?></td>					
			</tr>	
			<tr>
				<td>Studio</td>
				<td><?php echo $data['id_studio']; ?></td>					
			</tr>	
			<tr>
				<td>Jam Tayang</td>
				<td><?php echo $data['id_jam_tayang']; ?></td>					
			</tr>	
			<tr>
				<td>Jumlah Kursi tersedia</td>
				<td><?php echo $jml_kursi?></td>					
			</tr>
			<tr>
				<td>Jumlah Tiket yang Dipesan</td>
				<td><input name="jmltiket" type="number" id="jumlahtiket" required min="1"></td>					
			</tr>
			<tr>
				
				<td><a href="pesan_tiket.php">kembali </a></td>			
				<td><input type="submit" value="Simpan"></td>					
			</tr>
		</table>
	</form>
</body>
</html>