<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>TJ Indonesia — Conveyor Belt & Kebutuhan Industri</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

<style>

:root{
    --navy:#152238;
    --steel:#3D4C5E;
    --slate:#64748B;
    --offwhite:#F5F6F8;
    --orange:#E8590C;
    --charcoal:#14181D;
    --line:#E3E6EA;
}

*{
    box-sizing:border-box;
}

body{
    background:var(--offwhite);
    font-family:'Inter', Arial, sans-serif;
    color:var(--steel);
}

h1, h2, h3, h4, .brand-mark{
    font-family:'Oswald', Arial, sans-serif;
    color:var(--navy);
    letter-spacing:.3px;
}

.eyebrow{
    font-family:'JetBrains Mono', monospace;
    font-size:12px;
    letter-spacing:2px;
    text-transform:uppercase;
    color:var(--orange);
    font-weight:600;
}

/* ===== NAVBAR ===== */

.navbar{
    background:#fff;
    padding:16px 0;
    box-shadow:0 1px 0 var(--line);
}

.navbar-brand{
    display:flex;
    align-items:center;
    gap:12px;
}

.navbar-brand img{
    height:38px;
    width:auto;
}

.brand-mark{
    font-weight:700;
    font-size:20px;
    line-height:1;
    margin:0;
}

.brand-sub{
    display:block;
    font-family:'Inter', Arial, sans-serif;
    font-size:11px;
    letter-spacing:1.5px;
    color:var(--slate);
    text-transform:uppercase;
}

.btn-cta{
    background:var(--orange);
    border:none;
    color:#fff;
    font-weight:600;
    padding:10px 22px;
    border-radius:2px;
    transition:.2s;
}

.btn-cta:hover{
    background:#c94a09;
    color:#fff;
}

/* ===== HERO ===== */

.hero{
    position:relative;
    min-height:560px;
    display:flex;
    align-items:center;
    background:linear-gradient(180deg, rgba(21,34,56,.88) 0%, rgba(21,34,56,.78) 55%, rgba(21,34,56,.95) 100%),
               url('assets/img/hero-belt.jpg') center/cover no-repeat;
    color:#fff;
    padding:100px 0;
}

.hero h1{
    color:#fff;
    font-size:46px;
    font-weight:700;
    line-height:1.15;
    max-width:640px;
}

.hero p{
    font-size:17px;
    color:#D7DCE3;
    max-width:520px;
    margin-top:18px;
}

.hero-actions{
    margin-top:32px;
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}

.btn-outline-hero{
    border:1px solid rgba(255,255,255,.5);
    color:#fff;
    padding:10px 22px;
    border-radius:2px;
    font-weight:600;
    background:transparent;
    transition:.2s;
}

.btn-outline-hero:hover{
    border-color:#fff;
    background:rgba(255,255,255,.08);
    color:#fff;
}

/* ===== SECTIONS ===== */

.section{
    padding:90px 0;
}

.section-head{
    margin-bottom:44px;
}

.section-head h2{
    font-size:30px;
    font-weight:600;
    margin:8px 0 0;
}

.about-img{
    border-radius:4px;
    width:100%;
    height:380px;
    object-fit:cover;
    box-shadow:0 16px 32px rgba(21,34,56,.12);
}

.about-copy p{
    font-size:15.5px;
    line-height:1.8;
    color:var(--slate);
}

/* Keunggulan */

.bg-white-section{
    background:#fff;
    border-top:1px solid var(--line);
    border-bottom:1px solid var(--line);
}

.feature-card{
    padding:8px 4px;
}

.feature-icon{
    width:52px;
    height:52px;
    border:1.5px solid var(--orange);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--orange);
    margin-bottom:20px;
}

.feature-card h5{
    font-size:17px;
    font-weight:600;
    margin-bottom:8px;
}

.feature-card p{
    font-size:14.5px;
    color:var(--slate);
    line-height:1.7;
    margin:0;
}

/* Produk */

.produk-card{
    position:relative;
    border-radius:4px;
    overflow:hidden;
    height:280px;
    box-shadow:0 10px 24px rgba(21,34,56,.10);
}

.produk-card img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .4s ease;
}

.produk-card:hover img{
    transform:scale(1.06);
}

.produk-caption{
    position:absolute;
    left:0; right:0; bottom:0;
    background:linear-gradient(0deg, rgba(21,34,56,.92) 0%, rgba(21,34,56,0) 100%);
    color:#fff;
    padding:36px 18px 16px;
}

.produk-caption .eyebrow{
    color:#F0A97A;
}

.produk-caption h6{
    font-family:'Oswald', Arial, sans-serif;
    font-size:16px;
    margin:4px 0 0;
    font-weight:600;
}

/* Kontak */

.kontak-card{
    background:#fff;
    border-left:3px solid var(--orange);
    border-radius:3px;
    padding:26px 24px;
    height:100%;
    box-shadow:0 6px 16px rgba(21,34,56,.06);
}

.kontak-card .eyebrow{
    display:block;
    margin-bottom:10px;
}

.kontak-card p{
    color:var(--navy);
    font-weight:500;
    margin:0;
    font-size:15px;
}

/* Footer */

footer{
    background:var(--charcoal);
    color:#9AA3AF;
    padding:50px 0 22px;
}

footer .footer-brand{
    color:#fff;
    font-family:'Oswald', Arial, sans-serif;
    font-weight:600;
    font-size:20px;
}

footer .footer-tag{
    font-size:13.5px;
    color:#7C8794;
    margin-top:8px;
    max-width:320px;
}

footer h6{
    color:#fff;
    font-size:13px;
    letter-spacing:1.5px;
    text-transform:uppercase;
    margin-bottom:16px;
}

footer a{
    color:#9AA3AF;
    text-decoration:none;
    font-size:14px;
    display:block;
    margin-bottom:10px;
}

footer a:hover{
    color:#fff;
}

.footer-bottom{
    border-top:1px solid #2A2F36;
    margin-top:34px;
    padding-top:18px;
    font-size:12.5px;
    color:#6B7480;
}

@media (max-width:768px){

    .hero{
        padding:70px 0;
        min-height:unset;
    }

    .hero h1{
        font-size:32px;
    }
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="index.php">

<!-- Taruh file logo di assets/img/logo.png (disarankan PNG transparan, tinggi ±80px) -->
<img src="assets/img/logo.jpeg" alt="Logo TJ Indonesia">

<span>
<span class="brand-mark">TJ INDONESIA</span>
<span class="brand-sub">Conveyor Belt & Industrial Supply</span>
</span>

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse"
id="menu">

<ul class="navbar-nav ms-auto align-items-lg-center">

<li class="nav-item">

<a class="btn btn-cta" href="stok.php">

Lihat Stok

</a>

</li>

</ul>

</div>

</div>

</nav>

<!-- HERO -->
<!-- Taruh foto latar (conveyor belt / area pabrik) di assets/img/hero-belt.jpg, disarankan ukuran min. 1600x900px -->

<section class="hero">

<div class="container">

<span class="eyebrow">Supplier Conveyor Belt Terpercaya</span>

<h1 class="mt-3">

Conveyor Belt Andal untuk Menjaga Produksi Tetap Berjalan

</h1>

<p>

TJ Indonesia menyediakan conveyor belt dan kebutuhan komponen industri dengan berbagai ukuran, stok yang termonitor, dan siap dikirim ke lokasi Anda.

</p>

<div class="hero-actions">

<a href="stok.php" class="btn btn-cta btn-lg">

Lihat Stok Barang

</a>

<a href="#kontak" class="btn btn-outline-hero btn-lg">

Hubungi Kami

</a>

</div>

</div>

</section>

<!-- TENTANG -->

<section class="section">

<div class="container">

<div class="row align-items-center g-5">

<div class="col-lg-6 about-copy">

<span class="eyebrow">Tentang Kami</span>

<h2 class="mt-2 mb-3">Mitra Industri untuk Kebutuhan Conveyor Belt</h2>

<p>

TJ Indonesia bergerak di bidang penyediaan conveyor belt dan kebutuhan industri lainnya. Kami melayani berbagai ukuran dan spesifikasi belt dengan kualitas yang terjaga.

</p>

<p>

Informasi stok kami diperbarui secara berkala agar pelanggan dapat mengecek ketersediaan barang kapan saja tanpa harus menghubungi kami terlebih dahulu.

</p>

</div>

<div class="col-lg-6">

<!-- Taruh foto pabrik/gudang/proses produksi di assets/img/tentang-pabrik.jpg -->
<img src="assets/img/tj.jpeg" alt="Fasilitas TJ Indonesia" class="about-img">

</div>

</div>

</div>

</section>

<!-- KEUNGGULAN -->

<section class="section bg-white-section">

<div class="container">

<div class="section-head text-center mx-auto" style="max-width:560px;">

<span class="eyebrow">Kenapa Memilih Kami</span>

<h2>Dibangun untuk Kebutuhan Operasional Anda</h2>

</div>

<div class="row g-4">

<div class="col-md-6 col-lg-3">
<div class="feature-card">

<div class="feature-icon">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
</div>

<h5>Stok Selalu Update</h5>
<p>Ketersediaan barang tercatat dan diperbarui secara berkala.</p>

</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="feature-card">

<div class="feature-icon">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 2l8 3v6c0 5-3.5 8.5-8 11-4.5-2.5-8-6-8-11V5l8-3z"/><path d="M9 12l2 2 4-4"/></svg>
</div>

<h5>Produk Berkualitas</h5>
<p>Setiap barang melalui pengecekan sebelum dikirim ke pelanggan.</p>

</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="feature-card">

<div class="feature-icon">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="1" y="7" width="14" height="10" rx="1"/><path d="M15 10h4l3 3v4h-7z"/><circle cx="6" cy="19" r="2"/><circle cx="18" cy="19" r="2"/></svg>
</div>

<h5>Pengiriman Cepat</h5>
<p>Proses pengiriman dikoordinasikan agar barang sampai tepat waktu.</p>

</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="feature-card">

<div class="feature-icon">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 18v-6a9 9 0 0118 0v6"/><path d="M21 19a2 2 0 01-2 2h-1v-6h3z"/><path d="M3 19a2 2 0 002 2h1v-6H3z"/></svg>
</div>

<h5>Pelayanan Terbaik</h5>
<p>Tim kami siap membantu menjawab kebutuhan dan pertanyaan Anda.</p>

</div>
</div>

</div>

</div>

</section>

<!-- PRODUK -->

<section class="section">

<div class="container">

<div class="section-head text-center mx-auto" style="max-width:560px;">

<span class="eyebrow">Produk Kami</span>

<h2>Beberapa Jenis Belt yang Tersedia</h2>

</div>

<div class="row g-4">

<div class="col-md-4">
<!-- Taruh foto produk di assets/img/produk-1.jpg -->
<div class="produk-card">
<img src="assets/img/polos.jpeg" alt="Conveyor belt tipe standar">
<div class="produk-caption">
<h6>polos</h6>
<span class="eyebrow">Belt Standar</span>
</div>
</div>
</div>

<div class="col-md-4">
<!-- Taruh foto produk di assets/img/produk-2.jpg -->
<div class="produk-card">
<img src="assets/img/sersan.jpeg" alt="Conveyor belt heavy duty">
<div class="produk-caption">
<h6>sersan</h6>
<span class="eyebrow">Belt Heavy Duty</span>
</div>
</div>
</div>

<div class="col-md-4">
<!-- Taruh foto produk di assets/img/produk-3.jpg -->
<div class="produk-card">
<img src="assets/img/speed.jpeg" alt="Komponen industri lainnya">
<div class="produk-caption">
<h6>produk lainya</h6>
<span class="eyebrow">hubungi kami untuk info lanjutnya
</span>
</div>
</div>
</div>

</div>

</div>

</section>

<!-- KONTAK -->

<section class="section bg-white-section" id="kontak">

<div class="container">

<div class="section-head text-center mx-auto" style="max-width:560px;">

<span class="eyebrow">Hubungi Kami</span>

<h2>Kami Siap Membantu Kebutuhan Anda</h2>

</div>

<div class="row g-4">

<div class="col-md-4">
<div class="kontak-card">
<span class="eyebrow">Alamat</span>
<p>Jakarta, Indonesia</p>
</div>
</div>

<div class="col-md-4">
<div class="kontak-card">
<span class="eyebrow">Telepon</span>
<p>088296148591</p>
</div>
</div>

<div class="col-md-4">
<div class="kontak-card">
<span class="eyebrow">Email</span>
<p>tianjirubberindonesia@gamil.com</p>
</div>
</div>

</div>

</div>

</section>

<!-- FOOTER -->

<footer>

<div class="container">

<div class="row g-4">

<div class="col-lg-5">
<div class="footer-brand">TJ INDONESIA</div>
<p class="footer-tag">Penyedia conveyor belt dan kebutuhan industri dengan informasi stok yang selalu diperbarui.</p>
</div>

<div class="col-6 col-lg-3">
<h6>Navigasi</h6>
<a href="index.php">Beranda</a>
<a href="stok.php">Stok Barang</a>
<a href="#kontak">Kontak</a>
</div>

<div class="col-6 col-lg-4">
<h6>Kontak</h6>
<a href="tel:088296148591">08829614859</a>
<a href="mailto:tianjirubberndonesia@gamil.com">tianjirubberndonesia@gamil.com</a>
<a href="#">Jakarta, Indonesia</a>
</div>

</div>

<div class="footer-bottom">

© 2026 TJ Indonesia. Seluruh hak cipta dilindungi.

</div>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>