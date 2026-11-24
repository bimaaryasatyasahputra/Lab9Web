<?php
function e($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function formatRupiah($n): string { return 'Rp '.number_format((float)$n,0,',','.'); }
function hitungDiskon($harga,$persen=10): float { return (float)$harga*((float)$persen/100); }
function validasiEmail($email): bool { return filter_var($email,FILTER_VALIDATE_EMAIL)!==false; }
function ringkasTeks($teks,$batas=50): string { $teks=(string)$teks; return strlen($teks)>$batas ? substr($teks,0,$batas).'...' : $teks; }
function uploadGambar($field,$lama=''): string {
 if (!isset($_FILES[$field]) || $_FILES[$field]['error']===UPLOAD_ERR_NO_FILE) return $lama;
 if ($_FILES[$field]['error']!==UPLOAD_ERR_OK) return $lama;
 $ext=strtolower(pathinfo($_FILES[$field]['name'],PATHINFO_EXTENSION));
 if (!in_array($ext,['jpg','jpeg','png','gif'],true)) return $lama;
 $nama=uniqid('barang_',true).'.'.$ext;
 return move_uploaded_file($_FILES[$field]['tmp_name'],__DIR__.'/../gambar/'.$nama) ? $nama : $lama;
}
