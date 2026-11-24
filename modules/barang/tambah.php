
<?php
require_once __DIR__ . '/../../config/database.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = null;

    // Proses upload gambar
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $destination = __DIR__ . '/../../gambar/' . $filename;

        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    // Menyimpan data ke database
    $sql = "INSERT INTO data_barang
            (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssiiis",
        $nama,
        $kategori,
        $harga_jual,
        $harga_beli,
        $stok,
        $gambar
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>
        alert('Data barang berhasil ditambahkan!');
        window.location.href = 'index.php?page=barang/list';
    </script>";
    exit;
}
?>

<h2>Tambah Barang</h2>

<form method="post" action="index.php?page=barang/tambah" enctype="multipart/form-data">

    <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama" required>
    </div>

    <div class="input">
        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>
    </div>

    <div class="input">
        <label>Harga Jual</label>
        <input type="number" name="harga_jual" required>
    </div>

    <div class="input">
        <label>Harga Beli</label>
        <input type="number" name="harga_beli" required>
    </div>

    <div class="input">
        <label>Stok</label>
        <input type="number" name="stok" required>
    </div>

    <div class="input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar" accept="image/*">
    </div>

    <div class="submit">
        <input type="submit" name="submit" value="Simpan">
    </div>

</form>
