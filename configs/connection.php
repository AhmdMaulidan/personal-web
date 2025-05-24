<?php
$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$connect = mysqli_connect($servername, $dbuser, $dbpassword);
$dbname = "personalweb_db";
$connect_error = "Koneksi gagal atau Database tidak ada";
mysqli_select_db($connect, $dbname) or die($connect_error);
?>