# Praktikum 9 - PHP Modular

Project ini melanjutkan CRUD Data Barang dari Praktikum 8 ke struktur PHP Modular.

## Struktur folder
```text
Lab9Web/
├── index.php
├── config/database.php
├── views/header.php
├── views/footer.php
├── views/home.php
├── views/profil.php
├── views/kontak.php
├── views/dashboard.php
├── views/404.php
├── helpers/functions.php
├── modules/user/list.php
├── modules/user/add.php
├── modules/user/edit.php
├── modules/user/delete.php
├── modules/auth/login.php
├── modules/auth/logout.php
├── assets/css/style.css
├── assets/js/script.js
├── gambar/
└── database.sql
```

## Menjalankan
1. Ekstrak folder `Lab9Web` ke `C:\xampp\htdocs\`.
2. Jalankan Apache dan MySQL di XAMPP.
3. Import `database.sql` melalui phpMyAdmin.
4. Buka `http://localhost/Lab9Web/`.

Database mengikuti Praktikum 8: `latihan1`, tabel `data_barang`.
Konfigurasi default XAMPP ada di `config/database.php` (user root, password kosong).

## Fitur
CRUD barang dan upload gambar; template header/footer; helper function; routing whitelist dan 404; contoh session login/logout.

## Helper
`formatRupiah()`, `hitungDiskon()`, `validasiEmail()`, `ringkasTeks()`, `e()`, `uploadGambar()`.
