<?php
$res=mysqli_query($conn,'SELECT * FROM data_barang ORDER BY id_barang ASC');
?>
<section><div class="heading"><h2>Daftar Barang</h2><a class="button" href="index.php?page=user/add">+ Tambah Barang</a></div>
<div class="table-wrap"><table><thead><tr><th>Gambar</th><th>Nama Barang</th><th>Kategori</th><th>Harga Beli</th><th>Harga Jual</th><th>Stok</th><th>Aksi</th></tr></thead><tbody>
<?php if ($res && mysqli_num_rows($res)): while($r=mysqli_fetch_assoc($res)): ?><tr>
<td><?php if($r['gambar'] && file_exists(__DIR__.'/../../gambar/'.$r['gambar'])): ?><img class="product-image" src="gambar/<?= e($r['gambar']) ?>" alt="<?= e($r['nama']) ?>"><?php else: ?>Tidak ada gambar<?php endif; ?></td>
<td><?= e($r['nama']) ?></td><td><?= e($r['kategori']) ?></td><td><?= formatRupiah($r['harga_beli']) ?></td><td><?= formatRupiah($r['harga_jual']) ?></td><td><?= (int)$r['stok'] ?></td>
<td><a class="button small" href="index.php?page=user/edit&id=<?= (int)$r['id_barang'] ?>">Ubah</a>
<form class="inline" method="post" action="index.php?page=user/delete" onsubmit="return confirmHapus()"><input type="hidden" name="id" value="<?= (int)$r['id_barang'] ?>"><button class="button small danger">Hapus</button></form></td></tr>
<?php endwhile; else: ?><tr><td colspan="7">Belum ada data barang.</td></tr><?php endif; ?></tbody></table></div></section>
