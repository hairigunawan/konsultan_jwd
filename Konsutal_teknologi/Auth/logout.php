<?php
// Memulai sesi untuk mengakses variabel sesi
session_start();

// Menghapus semua variabel sesi
$_SESSION = array();

// Menghancurkan sesi
session_destroy();

// Mengarahkan pengguna kembali ke halaman utama
header("Location: ../index.php");
exit();
