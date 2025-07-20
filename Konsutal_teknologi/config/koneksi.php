<?php
// Memulai sesi untuk manajemen login
session_start();

// --- Konfigurasi Koneksi Database ---
// Ganti nilai-nilai berikut dengan detail koneksi database Anda.

// Nama server database (biasanya "localhost")
$servername = "localhost";

// Username untuk mengakses database (biasanya "root" untuk pengembangan lokal)
$username = "root";

// Password untuk username database (biasanya kosong untuk pengembangan lokal)
$password = "";

// Nama database yang ingin dihubungkan
$database = "register_db";


// --- Membuat Koneksi ---
$koneksi = mysqli_connect($servername, $username, $password, $database);


// --- Memeriksa Status Koneksi ---
if (!$koneksi) {
      die("Koneksi ke database gagal: " . mysqli_connect_error());
}
