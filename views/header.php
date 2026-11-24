<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lab9Web - PHP Modular</title><link rel="stylesheet" href="assets/css/style.css"></head><body>
<div class="container"><header><h1>Aplikasi PHP Modular</h1><p>Praktikum 9 - PHP Modular</p></header>
<nav>
<a href="index.php?page=dashboard">Dashboard</a>
<a href="index.php?page=home">Home</a>
<a href="index.php?page=profil">Profil</a>
<a href="index.php?page=kontak">Kontak</a>
<a href="index.php?page=user/list">Data Barang</a>
<?php if (!empty($_SESSION['login'])): ?><span>Login: <?= e($_SESSION['nama'] ?? 'Pengguna') ?></span><a href="index.php?page=auth/logout">Logout</a>
<?php else: ?><a href="index.php?page=auth/login">Login</a><?php endif; ?></nav>
<?php if (!empty($_SESSION['flash'])): ?><p class="alert"><?= e($_SESSION['flash']) ?></p><?php unset($_SESSION['flash']); endif; ?><main>
