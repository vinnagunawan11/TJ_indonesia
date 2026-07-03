<?php

session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

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

<title>Dashboard — TJ Indonesia</title>

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

h2, h4, .brand-mark{
    font-family:'Oswald', Arial, sans-serif;
    color:var(--navy);
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

.navbar-tj{
    background:var(--navy);
    padding:16px 0;
}

.navbar-tj .brand-mark{
    color:#fff;
    font-weight:600;
    font-size:19px;
    margin:0;
}

.navbar-tj .brand-sub{
    display:block;
    font-family:'JetBrains Mono', monospace;
    font-size:10.5px;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:#AEB8C7;
}

.btn-logout{
    border:1px solid rgba(255,255,255,.4);
    color:#fff;
    background:transparent;
    font-weight:600;
    padding:8px 20px;
    border-radius:2px;
    transition:.2s;
}

.btn-logout:hover{
    background:rgba(255,255,255,.1);
    color:#fff;
}

/* ===== PAGE HEADER ===== */

.page-header{
    padding:44px 0 8px;
}

.page-header h2{
    font-size:26px;
    font-weight:600;
    margin:6px 0 0;
}

.btn-add{
    background:var(--orange);
    border:none;
    color:#fff;
    font-weight:600;
    padding:10px 22px;
    border-radius:2px;
    transition:.2s;
}

.btn-add:hover{
    background:#c94a09;
    color:#fff;
}

/* ===== CARD / TABLE ===== */

.card{
    border:1px solid var(--line);
    border-radius:6px;
    box-shadow:0 4px 16px rgba(21,34,56,.06);
}

.card-body h4{
    font-size:18px;
    font-weight:600;
}

.table-produk thead{
    background:var(--navy);
}

.table-produk thead th{
    color:#fff;
    font-family:'JetBrains Mono', monospace;
    font-size:11.5px;
    letter-spacing:1px;
    text-transform:uppercase;
    font-weight:600;
    border:none;
    padding:14px 16px;
}

.table-produk tbody tr{
    cursor:pointer;
    transition:.15s;
}

.table-produk tbody tr:hover{
    background:#FBEFE8;
}

.table-produk td{
    padding:14px 16px;
    vertical-align:middle;
    font-size:14.5px;
    color:var(--steel);
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

.btn-success{
    background:var(--navy);
    border:none;
}

.btn-success:hover{
    background:#0d1728;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark navbar-tj">

<div class="container d-flex justify-content-between align-items-center">

<span>
<span class="brand-mark">DASHBOARD ADMIN</span>
<span class="brand-sub">TJ Indonesia</span>
</span>

<a
href="logout.php"
class="btn btn-logout">

Logout

</a>

</div>

</nav>

<div class="container page-header">

<span class="eyebrow">Panel Admin</span>

<h2>

Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?>

</h2>

</div>

<div class="container mt-4 mb-5">

<a
href="barang.php"
class="btn btn-add mb-4">

+ Tambah Barang

</a>

<div class="card">

<div class="card-body">

<h4 class="mb-3">Stok Barang</h4>

<table class="table table-hover align-middle table-produk">

<thead>

<tr>

<th width="10%">No</th>

<th>Nama Barang</th>

<th width="20%">Update Terakhir</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

while($row = mysqli_fetch_assoc($barang)){

?>

<tr
data-bs-toggle="modal"
data-bs-target="#modal<?= $row['id']; ?>">

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($row['nama_barang']); ?></td>

<td><?= date('d-m-Y', strtotime($row['tanggal_update'])) ?></td>

</tr>

<?php } ?>

<?php if(mysqli_num_rows($barang) == 0){ ?>

<tr>

<td colspan="3" class="text-center">

Belum ada data barang.

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<?php

$barang2 = mysqli_query($koneksi,"
SELECT *
FROM barang
ORDER BY nama_barang ASC
");

while($b = mysqli_fetch_assoc($barang2)){

$total = 0;

?>

<div
class="modal fade"
id="modal<?= $b['id']; ?>"
tabindex="-1">

<div class="modal-dialog modal-dialog-centered">

<div class="modal-content">

<div class="modal-header text-white">

<h5 class="modal-title">

<?= htmlspecialchars($b['nama_barang']); ?>

</h5>

<button
class="btn-close btn-close-white"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

<?php

$roll = mysqli_query($koneksi,"
SELECT *
FROM detail_roll
WHERE barang_id='".$b['id']."'
ORDER BY no_roll ASC
");

if(mysqli_num_rows($roll) > 0){

while($r = mysqli_fetch_assoc($roll)){

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

<a
href="roll.php?id=<?= $b['id']; ?>"
class="btn btn-success">

Kelola Roll

</a>

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

</body>
</html>