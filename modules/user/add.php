<?php
$pesan='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $nama=trim($_POST['nama']??''); $kat=$_POST['kategori']??''; $jual=(float)($_POST['harga_jual']??0); $beli=(float)($_POST['harga_beli']??0); $stok=(int)($_POST['stok']??0); $gambar=uploadGambar('file_gambar');
 if($nama===''||$kat==='') $pesan='Nama dan kategori wajib diisi.';
 else { $s=mysqli_prepare($conn,'INSERT INTO data_barang(nama,kategori,harga_jual,harga_beli,stok,gambar) VALUES(?,?,?,?,?,?)'); mysqli_stmt_bind_param($s,'ssddis',$nama,$kat,$jual,$beli,$stok,$gambar);
 if(mysqli_stmt_execute($s)){$_SESSION['flash']='Data barang berhasil ditambahkan.';header('Location: index.php?page=user/list');exit;} $pesan='Data gagal disimpan.'; }
}
?>
<section class="form-box"><h2>Tambah Barang</h2><?php if($pesan): ?><p class="alert"><?= e($pesan) ?></p><?php endif; ?>
<form method="post" enctype="multipart/form-data"><label>Nama Barang<input name="nama" required></label>
<label>Kategori<select name="kategori"><option>Komputer</option><option>Elektronik</option><option>Hand Phone</option></select></label>
<label>Harga Jual<input type="number" name="harga_jual" min="0" required></label><label>Harga Beli<input type="number" name="harga_beli" min="0" required></label>
<label>Stok<input type="number" name="stok" min="0" required></label><label>File Gambar<input type="file" name="file_gambar" accept=".jpg,.jpeg,.png,.gif"></label>
<button>Simpan</button> <a class="button secondary" href="index.php?page=user/list">Kembali</a></form></section>
