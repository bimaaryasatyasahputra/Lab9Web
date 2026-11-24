<?php
$pesan='';
if($_SERVER['REQUEST_METHOD']==='POST'){$nama=trim($_POST['nama']??'');if($nama!==''){session_regenerate_id(true);$_SESSION['login']=true;$_SESSION['nama']=$nama;$_SESSION['flash']='Login berhasil.';header('Location: index.php?page=dashboard');exit;}$pesan='Nama wajib diisi.';}
?>
<section class="form-box"><h2>Login</h2><p>Login sederhana untuk demonstrasi session praktikum.</p><?php if($pesan): ?><p class="alert"><?= e($pesan) ?></p><?php endif; ?>
<form method="post"><label>Nama<input name="nama" required></label><button>Login</button></form></section>
