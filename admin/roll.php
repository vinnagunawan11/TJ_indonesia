<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$barang = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'")
);

if (!$barang) {
    die("Barang tidak ditemukan.");
}

// Simpan Roll
if (isset($_POST['simpan'])) {

    $meter = (int) $_POST['panjang_meter'];

    // Nomor roll otomatis
    $cek = mysqli_query($koneksi, "
        SELECT MAX(no_roll) AS nomor
        FROM detail_roll
        WHERE barang_id='$id'
    ");

    $hasil = mysqli_fetch_assoc($cek);

    $no_roll = ($hasil['nomor'] ?? 0) + 1;

    mysqli_query($koneksi, "
        INSERT INTO detail_roll(barang_id, no_roll, panjang_meter)
        VALUES('$id','$no_roll','$meter')
    ");

    mysqli_query($koneksi, "
        UPDATE barang
        SET tanggal_update = CURDATE()
        WHERE id='$id'
    ");

    header("Location: roll.php?id=".$id);
    exit;
}

$data = mysqli_query($koneksi, "
SELECT *
FROM detail_roll
WHERE barang_id='$id'
ORDER BY no_roll ASC
");

$total = 0;
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Kelola Roll — TJ Indonesia</title>

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

h2, h4{
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

/* ===== PAGE HEADER ===== */

.page-header{
    padding:44px 0 8px;
}

.page-header h2{
    font-size:26px;
    font-weight:600;
    margin:6px 0 0;
}

.btn-outline-tj{
    border:1px solid var(--line);
    color:var(--navy);
    background:#fff;
    font-weight:600;
    padding:9px 20px;
    border-radius:2px;
    transition:.2s;
}

.btn-outline-tj:hover{
    background:var(--offwhite);
    color:var(--navy);
}

.btn-dashboard{
    background:var(--navy);
    border:none;
    color:#fff;
    font-weight:600;
    padding:9px 20px;
    border-radius:2px;
    transition:.2s;
}

.btn-dashboard:hover{
    background:#0d1728;
    color:#fff;
}

.btn-logout{
    border:1px solid #E4B7A9;
    color:#B23A1B;
    background:#fff;
    font-weight:600;
    padding:9px 20px;
    border-radius:2px;
    transition:.2s;
}

.btn-logout:hover{
    background:#FBEFE8;
    color:#B23A1B;
}

/* ===== CARD / FORM ===== */

.card{
    border:1px solid var(--line);
    border-radius:6px;
    box-shadow:0 4px 16px rgba(21,34,56,.06);
}

.form-label{
    font-weight:600;
    color:var(--navy);
    font-size:14px;
}

.form-control{
    border-radius:4px;
    border:1px solid var(--line);
    padding:11px 14px;
}

.form-control:focus{
    border-color:var(--orange);
    box-shadow:0 0 0 .2rem rgba(232,89,12,.12);
}

.btn-tambah{
    background:var(--orange);
    border:none;
    color:#fff;
    font-weight:600;
    padding:10px 24px;
    border-radius:2px;
    transition:.2s;
}

.btn-tambah:hover{
    background:#c94a09;
    color:#fff;
}

/* ===== TABLE ===== */

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

.table-produk td{
    padding:14px 16px;
    vertical-align:middle;
    font-size:14.5px;
    font-family:'JetBrains Mono', monospace;
    color:var(--steel);
}

.table-produk tbody tr:hover{
    background:#FBEFE8;
}

/* ===== TOTAL ===== */

.total-meter{
    font-family:'JetBrains Mono', monospace;
    font-size:24px;
    color:var(--orange);
    font-weight:600;
}

.update-text{
    color:var(--slate);
    font-size:13px;
}

</style>

</head>

<body>

<div class="container page-header">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

<div>

<span class="eyebrow">Detail Barang</span>

<h2><?= htmlspecialchars($barang['nama_barang']); ?></h2>

</div>

<div class="d-flex gap-2 flex-wrap">

<a href="barang.php" class="btn btn-outline-tj">
← Kelola Barang
</a>

<a href="dashboard.php" class="btn btn-dashboard">
Dashboard
</a>

<a href="logout.php" class="btn btn-logout">
Logout
</a>

</div>

</div>

</div>

<div class="container mt-4 mb-5">

<div class="card mb-4">

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">

Panjang Roll (Meter)

</label>

<input
type="number"
name="panjang_meter"
class="form-control"
placeholder="Contoh : 300"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-tambah">

+ Tambah Roll

</button>

</form>

</div>

</div>

<div class="card">

<div class="card-body">

<table class="table table-hover align-middle table-produk">

<thead>

<tr>

<th width="20%">No Roll</th>

<th>Panjang</th>

</tr>

</thead>

<tbody>

<?php if(mysqli_num_rows($data)>0){ ?>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>

<td>

Roll <?= $row['no_roll']; ?>

</td>

<td>

<?= number_format($row['panjang_meter']); ?> Meter

</td>

</tr>

<?php

$total += $row['panjang_meter'];

} ?>

<?php }else{ ?>

<tr>

<td colspan="2" class="text-center">

Belum ada data roll.

</td>

</tr>

<?php } ?>

</tbody>

</table>

<hr>

<div class="text-end">

<h4 class="mb-1">

Total Meter :
<span class="total-meter">

<?= number_format($total); ?> Meter

</span>

</h4>

<p class="update-text">

Update Terakhir :
<?= date('d-m-Y', strtotime($barang['tanggal_update'])) ?>

</p>

</div>

</div>

</div>

</div>

</body>

</html>