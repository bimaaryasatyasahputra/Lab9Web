<?php
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
if(!$id){echo '<p>ID barang tidak valid.</p>';return;}
$s=mysqli_prepare($conn,'SELECT * FROM data_barang WHERE id_barang=?');mysqli_stmt_bind_param($s,'i',$id);mysqli_stmt_execute($s);$data=mysqli_fetch_assoc(mysqli_stmt_get_result($s));
if(!$data){echo '<p>Data barang tidak ditemukan.</p>';return;}
$pesan='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $nama=trim($_POST['nama']??'');$kat=$_POST['kategori']??'';$jual=(float)($_POST['harga_jual']??0);$beli=(float)($_POST['harga_beli']??0);$stok=(int)($_POST['stok']??0);$gambar=uploadGambar('file_gambar',$data['gambar']);
 if($nama===''||$kat==='')$pesan='Nama dan kategori wajib diisi.';
 else{$u=mysqli_prepare($conn,'UPDATE data_barang SET nama=?,kategori=?,harga_jual=?,harga_beli=?,stok=?,gambar=? WHERE id_barang=?');mysqli_stmt_bind_param($u,'ssddisi',$nama,$kat,$jual,$beli,$stok,$gambar,$id);
 if(mysqli_stmt_execute($u)){$_SESSION['flash']='Data barang berhasil diubah.';header('Location: index.php?page=user/list');exit;}$pesan='Data gagal diubah.';}
}
?>
<section class="form-box"><h2>Ubah Barang</h2><?php if($pesan): ?><p class="alert"><?= e($pesan) ?></p><?php endif; ?>
<form method="post" enctype="multipart/form-data"><label>Nama Barang<input name="nama" value="<?= e($data['nama']) ?>" required></label>
<label>Kategori<select name="kategori"><?php foreach(['Komputer','Elektronik','Hand Phone'] as $k): ?><option <?= $data['kategori']===$k?'selected':'' ?>><?= e($k) ?></option><?php endforeach; ?></select></label>
<label>Harga Jual<input type="number" name="harga_jual" value="<?= e($data['harga_jual']) ?>" min="0" required></label>
<label>Harga Beli<input type="number" name="harga_beli" value="<?= e($data['harga_beli']) ?>" min="0" required></label>
<label>Stok<input type="number" name="stok" value="<?= e($data['stok']) ?>" min="0" required></label>
<label>Gambar Baru (opsional)<input type="file" name="file_gambar" accept=".jpg,.jpeg,.png,.gif"></label>
<p>Gambar saat ini: <?= e($data['gambar']) ?></p><button>Simpan Perubahan</button> <a class="button secondary" href="index.php?page=user/list">Kembali</a></form></section>
