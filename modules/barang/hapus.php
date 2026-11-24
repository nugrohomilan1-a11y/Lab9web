
<?php
require_once __DIR__ . '/../../config/database.php';

// Mengambil ID barang dari URL
$id = $_GET['id'] ?? null;

if ($id === null || !is_numeric($id)) {
    die('ID barang tidak valid.');
}

// Query untuk menghapus data
$sql = "DELETE FROM data_barang WHERE id_barang = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

// Kembali ke halaman daftar barang

echo "<script>
    window.location.href = 'index.php?page=barang/list';
</script>";
exit;
