<?php
// Memasukkan file koneksi, yang juga memulai sesi
require_once '../config/koneksi.php';

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION['user_id'])) {
      header("Location: Login.php");
      exit();
}

// Mengambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Mengambil data pengguna saat ini dari database
$query = "SELECT nama_lengkap, email_regis FROM user_regis WHERE id_user_regis = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Inisialisasi variabel pesan
$message = '';
if (isset($_GET['status']) && isset($_GET['msg'])) {
      $status = $_GET['status'];
      $msg = htmlspecialchars($_GET['msg']);
      $alert_class = $status == 'sukses' ? 'alert-success' : 'alert-danger';
      $message = "<div class='alert $alert_class mt-3'>$msg</div>";
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Akun - Nama Perusahaan</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="auth-wrapper">
      <div class="auth-box">
            <div class="auth-header">
                  <h2>Edit Account</h2>
            </div>

            <?php echo $message; ?>

            <form action="proses_edit_akun.php" method="POST">
                  <div class="mb-3">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name" value="<?php echo htmlspecialchars($user['nama_lengkap']); ?>" required>
                  </div>
                  <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email_regis']); ?>" readonly disabled>
                  </div>
                  <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password (optional)">
                  </div>
                  <button type="submit" class="btn-submit">Save Changes</button>
            </form>
            <div class="auth-footer">
                  <p><a href="../index.php">Back to Home</a></p>
            </div>
      </div>
</body>

</html>