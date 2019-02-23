<?php 
	include "../koneksi.php";
	$id_jadwal = $_GET['id_jadwal'];
	$query_mysql2 = mysqli_query($con,"SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'")or die(mysql_error());
	$data2 = mysqli_fetch_array($query_mysql2);
	
	$id_film=$data2['id_film'];
	$query_mysql = mysqli_query($con,"SELECT film.judul_film , jadwal.id_studio , jadwal.id_jam_tayang FROM film JOIN jadwal ON film.id_film = '$id_film'")or die(mysql_error());
	$nomor = 1;
	$data = mysqli_fetch_array($query_mysql);
	$jml_tiket = $_POST['jmltiket'];
	$date = date("Y-m-d");
	mysqli_query($con,"INSERT INTO tiket VALUES('','$id_jadwal','$date','$jml_tiket')");

	$query_mysql3 = mysqli_query($con,"SELECT * FROM tiket ORDER BY id_tiket DESC LIMIT 1")or die(mysql_error());
	$data3 = mysqli_fetch_array($query_mysql3);

	$id_tiket = $data3['id_tiket'];
	
	?>
<center><body>
	<br/>
	<br/>
<h2>CETAK TIKET</h2>	
	<br/>
	<div class="login">
	<br/>
		<div id="printableArea">
		<form method="post">
			<table border="1" class="table">
			<tr>
				<td>ID Tiket : <?php echo $id_tiket; ?></td>
			</tr>
			<tr>
				<td><h5>Studio: <?php echo $data2['id_studio']; ?></h5></td>
			</tr>	
			<tr>
				<td>Jam Tayang <?php echo $data2['id_jam_tayang']; ?></td>
			</tr>	
			 
			<tr>
				<td><?php echo $data['judul_film']; ?></td>
			</tr>	
			<tr>
				<td>Jumlah Tiket : <?php echo $jml_tiket ?></td>
			</tr>	
			<tr>
				<td>Tanggal : <?php echo $date ?></td>
			</tr>	
		</table>
		</form>
		</div>
		<button onclick="printDiv()">Print</button>
		<br>
		<td><a href="./pesan_tiket.php">kembali </a></td>
	</div>
</body>

<script>
	function printDiv(){
		var printContents = document.getElementById("printableArea").innerHTML;
		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
		console.log("ditekan");
	}


</script>