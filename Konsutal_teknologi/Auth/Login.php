<?php
// Memasukkan file koneksi, yang juga memulai sesi
require_once '../config/koneksi.php';

// Jika pengguna sudah login, arahkan ke halaman utama
if (isset($_SESSION['user_id'])) {
      header("Location: ../index.php");
      exit();
}

// Inisialisasi variabel pesan
$message = '';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Mengambil data dari form
      $email = mysqli_real_escape_string($koneksi, $_POST['email']);
      $password = mysqli_real_escape_string($koneksi, $_POST['password']);

      // Mencari pengguna berdasarkan email
      $query = "SELECT id_user_regis, nama_lengkap, password_regis FROM user_regis WHERE email_regis = ?";
      $stmt = mysqli_prepare($koneksi, $query);
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Memeriksa apakah pengguna ditemukan
      if ($user = mysqli_fetch_assoc($result)) {
            // Verifikasi password
            if (password_verify($password, $user['password_regis'])) {
                  // Jika password cocok, simpan data pengguna ke session
                  $_SESSION['user_id'] = $user['id_user_regis'];
                  $_SESSION['user_name'] = $user['nama_lengkap'];

                  // Arahkan ke halaman utama
                  header("Location: ../index.php");
                  exit();
            } else {
                  // Jika password salah
                  $message = '<div class="alert alert-danger mt-3">Email atau password salah.</div>';
            }
      } else {
            // Jika email tidak ditemukan
            $message = '<div class="alert alert-danger mt-3">Email atau password salah.</div>';
      }
      mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign In - Nama Perusahaan</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="auth-wrapper">
      <div class="auth-box">
            <div class="auth-header">
                  <h2>Selamat datang</h2>
            </div>

            <?php echo $message; ?>

            <form action="Login.php" method="POST">
                  <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email or username" required>
                  </div>
                  <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <button type="submit" class="btn-submit">Log in</button>
            </form>
            <div class="auth-footer">
                  <p>Tidak memiliki akun? <a href="register.php">Sign up</a></p>
            </div>
      </div>
</body>

</html>