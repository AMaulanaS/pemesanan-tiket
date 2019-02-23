<?php
$con = mysqli_connect('localhost','root','');
//mysqli_select_db('bioskop');
mysqli_select_db($con, 'bioskop') or die(mysqli_error($con));
?>

