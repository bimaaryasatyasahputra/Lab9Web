<?php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers/functions.php';

$routes = [
 'home' => __DIR__.'/views/home.php',
 'profil' => __DIR__.'/views/profil.php',
 'kontak' => __DIR__.'/views/kontak.php',    
 'dashboard' => __DIR__.'/views/dashboard.php',
 'user/list' => __DIR__.'/modules/user/list.php',
 'user/add' => __DIR__.'/modules/user/add.php',
 'user/edit' => __DIR__.'/modules/user/edit.php',
 'user/delete' => __DIR__.'/modules/user/delete.php',
 'auth/login' => __DIR__.'/modules/auth/login.php',
 'auth/logout' => __DIR__.'/modules/auth/logout.php'
];
$page = $_GET['page'] ?? 'dashboard';
$valid = is_string($page) && isset($routes[$page]);
if (!$valid) http_response_code(404);
ob_start();
require __DIR__.'/views/header.php';
require ($valid ? $routes[$page] : __DIR__.'/views/404.php');
require __DIR__.'/views/footer.php';
ob_end_flush();
