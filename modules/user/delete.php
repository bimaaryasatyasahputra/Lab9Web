<?php
if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);echo '<p>Metode tidak diizinkan.</p>';return;}
$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
if($id){$s=mysqli_prepare($conn,'DELETE FROM data_barang WHERE id_barang=?');mysqli_stmt_bind_param($s,'i',$id);mysqli_stmt_execute($s);$_SESSION['flash']='Data barang berhasil dihapus.';}
else $_SESSION['flash']='ID barang tidak valid.';
header('Location: index.php?page=user/list');exit;
