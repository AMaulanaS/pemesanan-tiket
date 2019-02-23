<body>
<table border="1" class="table">
	<tr>
		<th>No</th>
		<th>Judul Film</th>
		<th>Studio</th>
		<th>Jam Tayang</th>	
	</tr>
	<?php 
	include "../koneksi.php";
	$query_mysql = mysqli_query($con,"SELECT film.judul_film , jadwal.id_jadwal, jadwal.id_studio , jadwal.id_jam_tayang FROM film JOIN jadwal ON film.id_film = jadwal.id_film")or die(mysql_error());
	$nomor = 1;
	?>
	<h3>Pesan Tiket</h3>
	<?php
	while($data = mysqli_fetch_array($query_mysql)){
	?>
	<tr>
		<td><?php echo $nomor++; ?></td>
		<td><?php echo $data['judul_film']; ?></td>
		<td><?php echo $data['id_studio']; ?></td>
		<td><a class="edit" href="detail_tiket.php?id_jadwal=<?php echo $data['id_jadwal']; ?>"><?php echo $data['id_jam_tayang']; ?></a></td>
		
		<td>
		</td>
	</tr>
	<?php } ?>
</table>
<br>
<a href="index.php">Kembali</a>
<body>