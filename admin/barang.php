<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Simpan Barang
if (isset($_POST['simpan'])) {

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);

    mysqli_query($koneksi, "
        INSERT INTO barang (nama_barang, tanggal_update)
        VALUES ('$nama', CURDATE())
    ");

    header("Location: barang.php");
    exit;
}

// Ambil Data Barang
$data = mysqli_query($koneksi, "
SELECT *
FROM barang
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Kelola Barang — TJ Indonesia</title>

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

h2, .brand-mark{
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

.btn-dashboard{
    border:1px solid var(--line);
    color:var(--navy);
    background:#fff;
    font-weight:600;
    padding:9px 20px;
    border-radius:2px;
    transition:.2s;
}

.btn-dashboard:hover{
    background:var(--offwhite);
    color:var(--navy);
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

.btn-simpan{
    background:var(--orange);
    border:none;
    color:#fff;
    font-weight:600;
    padding:10px 24px;
    border-radius:2px;
    transition:.2s;
}

.btn-simpan:hover{
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
    color:var(--steel);
}

.table-produk tbody tr:hover{
    background:#FBEFE8;
}

.btn-roll{
    background:var(--navy);
    border:none;
    color:#fff;
    font-weight:600;
    padding:6px 16px;
    border-radius:2px;
    font-size:13px;
    transition:.2s;
}

.btn-roll:hover{
    background:#0d1728;
    color:#fff;
}

</style>

</head>

<body>

<div class="container page-header">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

<div>

<span class="eyebrow">Panel Admin</span>

<h2>Kelola Barang</h2>

</div>

<div class="d-flex gap-2">

<a href="dashboard.php" class="btn btn-dashboard">
← Dashboard
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

Nama Barang

</label>

<input
type="text"
name="nama_barang"
class="form-control"
placeholder="Contoh : 300 x 4 PLY (3+1,5)"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-simpan">

Simpan Barang

</button>

</form>

</div>

</div>

<div class="card">

<div class="card-body">

<table class="table table-hover align-middle table-produk">

<thead>

<tr>

<th width="10%">No</th>

<th>Nama Barang</th>

<th width="20%">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($row['nama_barang']); ?></td>

<td>

<a
href="roll.php?id=<?= $row['id']; ?>"
class="btn btn-roll">

Kelola Roll

</a>

</td>

</tr>

<?php } ?>

<?php if(mysqli_num_rows($data) == 0){ ?>

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

</body>

</html>