<?php
$host='localhost'; $user='root'; $pass=''; $db='latihan1';
$conn=mysqli_connect($host,$user,$pass,$db);
if (!$conn) { http_response_code(500); exit('Koneksi database gagal. Periksa XAMPP dan config/database.php.'); }
mysqli_set_charset($conn,'utf8mb4');
