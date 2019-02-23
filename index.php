<html>
	<?php 
		include 'koneksi.php';
		 
		// mengaktifkan session
		session_start();
		 
		// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
		if($_SESSION['status'] !="login"){
			header("location:login/index.php");
		}
		 
		// menampilkan pesan selamat datang
		echo "Hai, Selamat Datang ". $_SESSION['username'];
	?>
	</br>
	</br>
		<a href="pencarian/index.php">Cari Film</a>
	</br>
	</br>
		<a href="daftar/index.php">Daftar Film</a>
	</br>
	</br>
		<a href="logout.php">LOGOUT</a>
</html>