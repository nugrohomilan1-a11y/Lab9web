
<?php
require_once __DIR__ . '/../../config/database.php';

// Mengambil ID barang
$id = $_GET['id'] ?? $_POST['id'] ?? null;

if ($id === null) {
    die('ID barang tidak ditemukan.');
}

// Mengambil data barang berdasarkan ID
$sql = "SELECT * FROM data_barang WHERE id_barang = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$data) {
    die('Error: Data tidak tersedia.');
}

// Proses menyimpan perubahan
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    // Menggunakan gambar lama jika tidak upload gambar baru
    $gambar = $data['gambar'];

    if (isset($_FILES['file_gambar']) &&
        $_FILES['file_gambar']['error'] == 0) {

        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $destination = __DIR__ . '/../../gambar/' . $filename;

        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    // Update data barang
    $sql = "UPDATE data_barang SET
            nama = ?,
            kategori = ?,
            harga_jual = ?,
            harga_beli = ?,
            stok = ?,
            gambar = ?
            WHERE id_barang = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssiiisi",
        $nama,
        $kategori,
        $harga_jual,
        $harga_beli,
        $stok,
        $gambar,
        $id
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>
        alert('Data barang berhasil diubah!');
        window.location.href = 'index.php?page=barang/list';
    </script>";
    exit;
}

// Fungsi memilih kategori
function is_select($var, $val) {
    return ($var == $val) ? 'selected="selected"' : '';
}
?>

<h2>Ubah Barang</h2>

<form method="post"
      action="index.php?page=barang/ubah&id=<?= (int)$id; ?>"
      enctype="multipart/form-data">

    <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama"
               value="<?= htmlspecialchars($data['nama']); ?>" required>
    </div>

    <div class="input">
        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Komputer"
                <?= is_select('Komputer', $data['kategori']); ?>>
                Komputer
            </option>

            <option value="Elektronik"
                <?= is_select('Elektronik', $data['kategori']); ?>>
                Elektronik
            </option>

            <option value="Hand Phone"
                <?= is_select('Hand Phone', $data['kategori']); ?>>
                Hand Phone
            </option>
        </select>
    </div>

    <div class="input">
        <label>Harga Jual</label>
        <input type="number" name="harga_jual"
               value="<?= htmlspecialchars($data['harga_jual']); ?>" required>
    </div>

    <div class="input">
        <label>Harga Beli</label>
        <input type="number" name="harga_beli"
               value="<?= htmlspecialchars($data['harga_beli']); ?>" required>
    </div>

    <div class="input">
        <label>Stok</label>
        <input type="number" name="stok"
               value="<?= htmlspecialchars($data['stok']); ?>" required>
    </div>

    <div class="input">
        <label>Gambar Saat Ini</label><br>
        <?php if (!empty($data['gambar'])): ?>
            <img src="gambar/<?= htmlspecialchars($data['gambar']); ?>"
                 width="100" alt="Gambar barang">
        <?php else: ?>
            <p>Belum ada gambar.</p>
        <?php endif; ?>
    </div>

    <div class="input">
        <label>Ganti Gambar (Opsional)</label>
        <input type="file" name="file_gambar" accept="image/*">
    </div>

    <div class="submit">
        <input type="hidden" name="id"
               value="<?= (int)$data['id_barang']; ?>">

        <input type="submit" name="submit" value="Simpan">
    </div>

</form>
