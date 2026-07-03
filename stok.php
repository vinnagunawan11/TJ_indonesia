<?php
include "config/koneksi.php";

$barang = mysqli_query($koneksi,"
SELECT *
FROM barang
ORDER BY nama_barang ASC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Stok Barang — TJ Indonesia</title>

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

/* ===== NAVBAR (shared look with index.php) ===== */

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

/* ===== PAGE HEADER ===== */

.page-header{
    background:var(--navy);
    padding:56px 0 90px;
    color:#fff;
}

.page-header h1{
    color:#fff;
    font-size:32px;
    font-weight:600;
    margin:8px 0 0;
}

.search-wrap{
    margin-top:-40px;
    position:relative;
    z-index:2;
}

.search-card{
    background:#fff;
    border-radius:6px;
    box-shadow:0 16px 32px rgba(21,34,56,.14);
    padding:10px;
}

#cariBarang{
    border:none;
    border-radius:4px;
    padding:14px 20px;
    font-size:15px;
}

#cariBarang:focus{
    box-shadow:none;
    outline:2px solid var(--orange);
    outline-offset:-2px;
}

/* ===== PRODUK LIST ===== */

.produk-section{
    padding:56px 0 90px;
}

.card-produk{
    cursor:pointer;
    transition:.2s ease;
    border:1px solid var(--line);
    border-radius:6px;
    box-shadow:0 4px 12px rgba(21,34,56,.05);
}

.card-produk:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(21,34,56,.12);
    border-color:var(--orange);
}

.card-produk .card-body{
    padding:26px 22px;
}

.produk-icon{
    width:44px;
    height:44px;
    border:1.5px solid var(--orange);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--orange);
    margin:0 auto 16px;
}

.card-produk h5{
    font-family:'Oswald', Arial, sans-serif;
    font-weight:600;
    font-size:17px;
    color:var(--navy);
    margin-bottom:6px;
}

.card-produk p{
    color:var(--slate);
    font-size:13.5px;
    margin:0;
}

.empty-state{
    text-align:center;
    padding:60px 20px;
    color:var(--slate);
}

/* ===== MODAL ===== */

.modal-content{
    border-radius:6px;
    border:none;
    overflow:hidden;
}

.modal-header{
    background:var(--navy);
    border-bottom:none;
    padding:20px 24px;
}

.modal-header .modal-title{
    font-family:'Oswald', Arial, sans-serif;
    font-weight:600;
    font-size:18px;
}

.modal-body{
    padding:24px;
}

.roll-row{
    font-family:'JetBrains Mono', monospace;
    font-size:14px;
}

.roll-row b{
    font-family:'Inter', Arial, sans-serif;
    font-weight:600;
    color:var(--navy);
}

.total-meter{
    font-family:'JetBrains Mono', monospace;
    font-size:24px;
    color:var(--orange);
    font-weight:600;
}

.total-label{
    font-family:'JetBrains Mono', monospace;
    font-size:11px;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:var(--slate);
}

.update{
    color:var(--slate);
    font-size:13px;
}

.modal-footer{
    border-top:1px solid var(--line);
}

</style>

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<!-- PAGE HEADER -->

<section class="page-header">

<div class="container">

<span class="eyebrow">Informasi Stok</span>

<h1>Daftar Stok Barang</h1>

</div>

</section>

<!-- SEARCH -->

<div class="container search-wrap">

<div class="search-card">

<input
type="text"
id="cariBarang"
class="form-control form-control-lg"
placeholder="Cari nama produk...">

</div>

</div>

<!-- PRODUK LIST -->

<div class="container produk-section">

<div class="row">

<?php while($row=mysqli_fetch_assoc($barang)){ ?>

<div class="col-md-4 mb-4 produk-item">

<div
class="card card-produk h-100"
data-bs-toggle="modal"
data-bs-target="#modal<?= $row['id']; ?>">

<div class="card-body text-center">

<div class="produk-icon">
<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
</div>

<h5>

<?= $row['nama_barang']; ?>

</h5>

<p>

Klik untuk melihat detail

</p>

</div>

</div>

</div>

<?php } ?>

<?php if(mysqli_num_rows($barang) == 0){ ?>

<div class="col-12">

<div class="empty-state">

Belum ada data barang.

</div>

</div>

<?php } ?>

</div>

</div>

<?php

$barang2=mysqli_query($koneksi,"
SELECT *
FROM barang
ORDER BY nama_barang ASC
");

while($b=mysqli_fetch_assoc($barang2)){

$total=0;

?>

<div
class="modal fade"
id="modal<?= $b['id']; ?>"
tabindex="-1">

<div class="modal-dialog modal-dialog-centered">

<div class="modal-content">

<div class="modal-header text-white">

<h5 class="modal-title">

<?= $b['nama_barang']; ?>

</h5>

<button
class="btn-close btn-close-white"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

<?php

$roll=mysqli_query($koneksi,"
SELECT *
FROM detail_roll
WHERE barang_id='".$b['id']."'
ORDER BY no_roll ASC
");

if(mysqli_num_rows($roll)>0){

while($r=mysqli_fetch_assoc($roll)){

$total += $r['panjang_meter'];

?>

<div class="d-flex justify-content-between border-bottom py-2 roll-row">

<div>

<b>Roll <?= $r['no_roll']; ?></b>

</div>

<div>

<?= number_format($r['panjang_meter']); ?> Meter

</div>

</div>

<?php
}

}else{

?>

<div class="alert alert-warning text-center">

Belum ada data roll.

</div>

<?php } ?>

<hr>

<div class="text-center">

<div class="total-label">Total Meter</div>

<div class="total-meter">

<?= number_format($total); ?> Meter

</div>

</div>

<hr>

<div class="update text-center">

Update Terakhir :

<?= date('d-m-Y', strtotime($b['tanggal_update'])) ?>

</div>

</div>

<div class="modal-footer">

<button
class="btn btn-secondary"
data-bs-dismiss="modal">

Tutup

</button>

</div>

</div>

</div>

</div>

<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.getElementById("cariBarang").addEventListener("keyup",function(){

let keyword=this.value.toLowerCase();

let produk=document.querySelectorAll(".produk-item");

produk.forEach(function(item){

let text=item.innerText.toLowerCase();

if(text.includes(keyword)){

item.style.display="block";

}else{

item.style.display="none";

}

});

});

</script>

</body>

</html>