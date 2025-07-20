// Wait for the DOM to be fully loaded before running the script
document.addEventListener('DOMContentLoaded', function () {

    // Select necessary elements from the DOM
    const navLinks = document.querySelectorAll('.main-nav .nav-link');
    const contentArea = document.querySelector('.content-area');

    // An object to store the HTML content for each page
    const pageContent = {
        'Home': `
            <h2>Membawa Inovasi Digital ke Depan</h2>
            <p>Selamat datang di Konsultan Teknologi. Kami adalah mitra terpercaya Anda dalam perjalanan transformasi digital. Kami menggabungkan keahlian teknologi dengan pemahaman bisnis yang mendalam untuk memberikan solusi yang tidak hanya canggih, tetapi juga tepat sasaran.</p>
            <p>Jelajahi layanan kami dan temukan bagaimana kami dapat membantu bisnis Anda tumbuh dan beradaptasi di era digital yang terus berubah.</p>
            <button class="btn-submit mt-3">Jelajahi Layanan Kami</button>
        `,
        'Profile': `
            <h2>Mengenal Kami Lebih Dekat</h2>
            <p>Didirikan pada tahun 2020 di Banjarmasin, Konsultan Teknologi lahir dari semangat untuk membuat teknologi dapat diakses dan bermanfaat bagi semua jenis bisnis. Kami memulai sebagai tim kecil yang bersemangat dan telah berkembang menjadi perusahaan solusi digital yang melayani klien di berbagai industri.</p>
    
            <h3>Tim Kami</h3>
            <p>Tim kami terdiri dari para profesional berpengalaman di bidang pengembangan perangkat lunak, desain, dan strategi digital. Kami bekerja secara kolaboratif untuk memastikan setiap proyek mencapai standar keunggulan tertinggi.</p>
    
            <h3>Nilai-Nilai Kami</h3>
            <ul>
            <li><strong>Inovasi:</strong> Kami tidak pernah berhenti mencari cara baru dan lebih baik untuk menyelesaikan masalah.</li>
            <li><strong>Kualitas:</strong> Komitmen kami adalah memberikan produk dan layanan dengan kualitas terbaik tanpa kompromi.</li>
            <li><strong>Kemitraan:</strong> Kami melihat klien kami sebagai mitra. Kesuksesan Anda adalah kesuksesan kami.</li>
            </ul>

            <h3 class="mt-5">Portofolio Klien Kami</h3>
            <p>Kami bangga telah bekerja sama dengan berbagai perusahaan terkemuka, membantu mereka mencapai tujuan digital mereka.</p>
            <div class="row text-center align-items-center client-logos mt-4">
            <div class="col-md-3 col-6 mb-4">
                <img src="img/img1.png" class="img-fluid" alt="Logo PT Maju Logistik">
                <h6 class="mt-2 fw-normal text-muted">PT Maju Logistik</h6>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img src="img/img3.jpg" class="img-fluid" alt="Logo PT Maju Logistik">
                <h6 class="mt-2 fw-normal text-muted">PT Maju Logistik</h6>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img src="img/img2.jpg" alt="Logo Klien Toko Modern" class="img-fluid" title="Toko Modern">
                <h6 class="mt-2 fw-normal text-muted">Toko Modern</h6>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <img src="img/img3.jpg" alt="Logo Klien Warung Kita" class="img-fluid" title="Warung Kita">
                <h6 class="mt-2 fw-normal text-muted">Warung Kita</h6>
            </div>
        </div>
        `,
        'Visi dan Misi': `
            <h2>Arah dan Tujuan Kami</h2>
            <h3>Visi</h3>
            <p>Menjadi perusahaan teknologi terdepan di Kalimantan yang memberdayakan bisnis melalui solusi digital inovatif dan terpercaya.</p>
            <h3>Misi</h3>
            <ul>
                <li>Menyediakan produk dan layanan teknologi berkualitas tinggi yang menjawab tantangan bisnis modern.</li>
                <li>Membangun hubungan kemitraan jangka panjang dengan klien berdasarkan kepercayaan dan hasil yang terukur.</li>
                <li>Mendorong budaya inovasi, pembelajaran berkelanjutan, dan keunggulan di dalam tim kami.</li>
                <li>Berkontribusi secara positif terhadap perkembangan ekosistem digital di Indonesia, khususnya di Kalimantan Selatan.</li>
            </ul>
        `,
        'Produk kami': `
            <h2>Solusi untuk Kebutuhan Anda</h2>
            <p>Kami menawarkan berbagai layanan yang dirancang untuk meningkatkan efisiensi dan jangkauan bisnis Anda.</p>
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="product-card">
                        <div class="icon"><i class="fas fa-code"></i></div>
                        <h5>Pengembangan Web & Aplikasi</h5>
                        <p>Situs web modern, aplikasi seluler, dan sistem internal yang dirancang khusus untuk bisnis Anda.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="product-card">
                        <div class="icon"><i class="fas fa-search-dollar"></i></div>
                        <h5>Pemasaran Digital</h5>
                        <p>Strategi SEO, media sosial, dan kampanye iklan yang efektif untuk menjangkau audiens target Anda.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="product-card">
                        <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        <h5>Konsultasi IT</h5>
                        <p>Dapatkan panduan ahli untuk merencanakan infrastruktur dan strategi teknologi jangka panjang Anda.</p>
                    </div>
                </div>
            </div>
        `,
        'Kontak': `
            <h2>Hubungi Kami</h2>
            <p>Kami senang mendengar dari Anda. Silakan hubungi kami melalui detail di bawah ini atau isi formulir di samping.</p>
            <div class="row mt-4">
                <div class="col-md-5">
                    <p><strong><i class="fas fa-map-marker-alt me-2"></i>Alamat:</strong><br>Jl. Jenderal Sudirman No. 123<br>Banjarmasin, Kalimantan Selatan, Indonesia</p>
                    <p><strong><i class="fas fa-phone me-2"></i>Telepon:</strong><br>(0511) 123-4567</p>
                    <p><strong><i class="fas fa-envelope me-2"></i>Email:</strong><br>info@konsultanteknologi.com</p>
                </div>
                <div class="col-md-7">
                    <form class="contact-form">
                        <input type="text" class="form-control" placeholder="Nama Anda" required>
                        <input type="email" class="form-control" placeholder="Email Anda" required>
                        <textarea class="form-control" rows="4" placeholder="Pesan Anda" required></textarea>
                        <button type="submit" class="btn-submit">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        `,
        'About us': `
            <h2>Cerita di Balik Layar</h2>
            <p>Lebih dari sekadar perusahaan teknologi, kami adalah sekelompok individu yang memiliki hasrat untuk memecahkan masalah. Di Konsultan Teknologi, kami percaya bahwa teknologi terbaik adalah teknologi yang terasa manusiawi—intuitif, membantu, dan memberdayakan.</p>
            <p>Setiap baris kode yang kami tulis, setiap desain yang kami buat, dan setiap strategi yang kami rancang didasari oleh satu tujuan sederhana: membantu Anda mencapai tujuan Anda. Kami bangga dengan pekerjaan kami, dan kami lebih bangga lagi ketika melihat klien kami berhasil.</p>
        `
    };

    /**
     * Updates the main content area with HTML based on the provided page key.
     * @param {string} pageKey - The key corresponding to the page content in the pageContent object.
     */
    function updateContent(pageKey) {
        // If contentArea exists, update its HTML. Provide a fallback for unknown keys.
        if (contentArea) {
            contentArea.innerHTML = pageContent[pageKey] || `<h2>Halaman Tidak Ditemukan</h2><p>Maaf, konten yang Anda cari tidak tersedia.</p>`;
        }
    }

    // Add a click event listener to each navigation link
    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the browser from following the href

            // Remove 'active' class from all nav links
            navLinks.forEach(nav => nav.classList.remove('active'));
            
            // Add 'active' class to the clicked link
            this.classList.add('active');
            
            // Update the content area based on the link's text content
            const pageKey = this.textContent.trim();
            updateContent(pageKey);
        });
    });
    
    // Load the initial content for the "Home" page when the site loads
    if (contentArea) {
        updateContent('Home');
    }

    // Add an event listener for the contact form submission using event delegation
    if (contentArea) {
        contentArea.addEventListener('submit', function(event) {
            // Check if the submitted element is the contact form
            if (event.target.classList.contains('contact-form')) {
                event.preventDefault(); // Prevent the form from actually submitting
                alert('Terima kasih! Pesan Anda telah terkirim.');
                event.target.reset(); // Clear the form fields
            }
        });
    }
});
