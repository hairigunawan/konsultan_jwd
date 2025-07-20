<?php
// Memasukkan file koneksi, yang juga akan memulai sesi
require_once '../config/koneksi.php';

// Jika pengguna belum login, hentikan proses dan arahkan ke halaman login
if (!isset($_SESSION['user_id'])) {
      header("Location: Login.php");
      exit();
}

// Memeriksa apakah form telah disubmit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Mengambil ID pengguna dari sesi untuk keamanan
      $user_id = $_SESSION['user_id'];

      // Mengambil data dari form dan membersihkannya untuk mencegah XSS
      $nama_lengkap = htmlspecialchars(trim($_POST['fullname']));
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      // Validasi dasar: nama lengkap tidak boleh kosong
      if (empty($nama_lengkap)) {
            header("Location: edit_akun.php?status=error&msg=Nama lengkap tidak boleh kosong.");
            exit();
      }

      // Menyiapkan query update. Awalnya hanya untuk nama.
      $query_parts = ["nama_lengkap = ?"];
      $params = [$nama_lengkap];
      $types = "s"; // 's' untuk string (nama_lengkap)

      // Memeriksa apakah pengguna ingin mengubah password
      if (!empty($password)) {
            // Validasi: password baru dan konfirmasi harus cocok
            if ($password !== $confirm_password) {
                  header("Location: edit_akun.php?status=error&msg=Password baru dan konfirmasi tidak cocok.");
                  exit();
            }
            // Hash password baru untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Tambahkan bagian update password ke query
            $query_parts[] = "password_regis = ?";
            $params[] = $hashed_password;
            $types .= "s"; // Tambahkan 's' untuk string (password)
      }

      // Tambahkan user_id ke akhir parameter untuk klausa WHERE
      $params[] = $user_id;
      $types .= "i"; // Tambahkan 'i' untuk integer (id_user_regis)

      // Gabungkan semua bagian query menjadi satu string
      $sql = "UPDATE user_regis SET " . implode(", ", $query_parts) . " WHERE id_user_regis = ?";

      // Menyiapkan statement untuk eksekusi yang aman
      $stmt = mysqli_prepare($koneksi, $sql);

      // Mengikat parameter ke statement. Tanda "..." (splat operator) membongkar array $params.
      mysqli_stmt_bind_param($stmt, $types, ...$params);

      // Menjalankan query
      if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, perbarui juga nama di sesi agar langsung tampil
            $_SESSION['user_name'] = $nama_lengkap;
            // Arahkan kembali ke halaman edit dengan pesan sukses
            header("Location: edit_akun.php?status=sukses&msg=Akun berhasil diperbarui.");
      } else {
            // Jika gagal, arahkan kembali dengan pesan error
            header("Location: edit_akun.php?status=error&msg=Terjadi kesalahan saat memperbarui akun.");
      }
      // Menutup statement
      mysqli_stmt_close($stmt);
} else {
      // Jika file ini diakses langsung tanpa metode POST, kembalikan ke halaman edit
      header("Location: edit_akun.php");
}
// Hentikan eksekusi skrip
exit();
