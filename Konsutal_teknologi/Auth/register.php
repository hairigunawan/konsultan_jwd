<?php
// Memasukkan file koneksi untuk menghubungkan ke database
require_once '../config/koneksi.php';

// Inisialisasi variabel untuk pesan error atau sukses
$message = '';

// Memeriksa apakah form telah disubmit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Mengambil data dari form dan membersihkannya
      $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['fullname']);
      $email = mysqli_real_escape_string($koneksi, $_POST['email']);
      $password = mysqli_real_escape_string($koneksi, $_POST['password']);
      $confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirm_password']);

      // Validasi: Periksa apakah password dan konfirmasi password cocok
      if ($password !== $confirm_password) {
            $message = '<div class="alert alert-danger mt-3">Password dan konfirmasi password tidak cocok.</div>';
      } else {
            // Validasi: Periksa apakah email sudah terdaftar
            $check_email_query = "SELECT email_regis FROM user_regis WHERE email_regis = ?";
            $stmt_check = mysqli_prepare($koneksi, $check_email_query);
            mysqli_stmt_bind_param($stmt_check, "s", $email);
            mysqli_stmt_execute($stmt_check);
            mysqli_stmt_store_result($stmt_check);

            if (mysqli_stmt_num_rows($stmt_check) > 0) {
                  $message = '<div class="alert alert-danger mt-3">Email sudah terdaftar. Silakan gunakan email lain.</div>';
            } else {
                  // Hash password untuk keamanan sebelum disimpan ke database
                  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                  // Menyiapkan query INSERT menggunakan prepared statement untuk mencegah SQL Injection
                  $query = "INSERT INTO user_regis (nama_lengkap, email_regis, password_regis) VALUES (?, ?, ?)";

                  $stmt = mysqli_prepare($koneksi, $query);

                  // Mengikat parameter ke statement
                  mysqli_stmt_bind_param($stmt, "sss", $nama_lengkap, $email, $hashed_password);

                  // Menjalankan statement
                  if (mysqli_stmt_execute($stmt)) {
                        $message = '<div class="alert alert-success mt-3">Registrasi berhasil! Silakan <a href="Login.php">Log in</a>.</div>';
                  } else {
                        $message = '<div class="alert alert-danger mt-3">Terjadi kesalahan: ' . mysqli_error($koneksi) . '</div>';
                  }

                  // Menutup statement
                  mysqli_stmt_close($stmt);
            }
            mysqli_stmt_close($stmt_check);
      }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign Up - Nama Perusahaan</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="auth-wrapper">
      <div class="auth-box">
            <div class="auth-header">
                  <h2>Buat akun anda</h2>
            </div>

            <?php echo $message; ?>

            <form action="register.php" method="POST">
                  <div class="mb-3">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name" required>
                  </div>
                  <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                  </div>
                  <button type="submit" class="btn-submit">Sign up</button>
            </form>
            <div class="auth-footer">
                  <p>Apakah kamu sudah punya akun? <a href="Login.php">Log in</a></p>
            </div>
      </div>
</body>

</html>