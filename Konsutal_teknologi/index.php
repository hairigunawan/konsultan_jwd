<?php
// Memasukkan file koneksi, yang juga memulai sesi
// Pastikan file ini ada di root folder Anda atau sesuaikan path-nya
require_once 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Nama Perusahaan - Selamat Datang</title>

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome for Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <!-- Custom CSS (asumsi berada di folder assets) -->
      <link rel="stylesheet" href="assets/style.css">
</head>

<body class="full-layout">
      <div class="container site-wrapper">
            <!-- Header Section -->
            <header class="row align-items-center py-2 border-bottom">
                  <div class="col-12">
                        <div class="d-flex align-items-center" style="padding: 10px;">
                              <img src="img/Logo.png" alt="Logo Perusahaan" class="logo me-4" style="height: 50px; width: auto;" onerror="this.onerror=null;this.src='https://placehold.co/150x50/ffffff/343a40?text=Logo';">
                        </div>
                        <div class="d-flex justify-content-center">
                              <h1 class="company-name mb-0 fs-4 fw-bold">Konsultan Teknologi</h1>
                        </div>
                  </div>
            </header>

            <!-- Navigation Bar -->
            <nav class="main-nav">
                  <ul class="nav nav-tabs">
                        <li class="nav-item">
                              <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="#">Visi dan Misi</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="#">Produk kami</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="#">Kontak</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="#">About us</a>
                        </li>
                  </ul>
            </nav>

            <!-- Main Content Area -->
            <div class="row main-content-row">
                  <!-- Sidebar -->
                  <aside class="col-md-3 sidebar">
                        <div class="sidebar-section">
                              <h5>Artikel</h5>
                              <ul>
                                    <li><a href="#">Konsep Teknologi Informasi</a></li>
                                    <li><a href="#">Berita IT Terbaru</a></li>
                                    <li><a href="#">Tips & Trik Koding</a></li>
                              </ul>
                        </div>
                        <div class="sidebar-section">
                              <h5>Lainnya</h5>
                              <ul class="list-unstyled">
                                    <li><a href="#">Event</a></li>
                                    <li><a href="#">Galeri</a></li>
                                    <li><a href="#">Klien Kami</a></li>
                              </ul>
                        </div>
                        <div class="sidebar-section auth-links">
                              <?php if (isset($_SESSION['user_id'])): ?>
                                    <!-- Tampilan Jika Sudah Login -->
                                    <div class="user-info">
                                          <p class="mb-0">Selamat Datang,</p>
                                          <h6 class="fw-bold text-primary"><?php echo htmlspecialchars($_SESSION['user_name']); ?></h6>
                                    </div>
                                    <a href="Auth/edit_akun.php" class="btn-edit-akun">Edit Akun</a>
                                    <a href="Auth/logout.php" class="btn-logout">Logout</a>
                              <?php else: ?>
                                    <!-- Tampilan Jika Belum Login -->
                                    <a href="Auth/Login.php" id="signin-btn">Sign In</a>
                                    <a href="Auth/register.php" id="signup-btn">Sign Up</a>
                              <?php endif; ?>
                        </div>
                  </aside>

                  <!-- Dynamic Content Area -->
                  <main class="col-md-9 content-area">
                        <!-- Konten akan dimuat oleh JavaScript di sini -->
                  </main>
            </div>

            <!-- Footer -->
            <footer class="py-3">
                  <span>projeck buat JWD &copy; 2025</span>
            </footer>
      </div>

      <!-- Bootstrap JS Bundle -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Custom JavaScript -->
      <script src="assets/script.js"></script>
</body>

</html>