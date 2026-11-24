<?php
$_SESSION=[];session_destroy();session_start();$_SESSION['flash']='Anda berhasil logout.';header('Location: index.php?page=dashboard');exit;
