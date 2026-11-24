
<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/functions.php';

// Mengambil data barang dari database
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);
?>

<h2>Data Barang</h2>

<p>Daftar barang yang tersimpan di database.</p>

<a href="index.php?page=barang/tambah">+ Tambah Barang</a>

<br><br>

<?php if (!$result): ?>
    <p>Terjadi kesalahan: <?= htmlspecialchars(mysqli_error($conn)); ?></p>

<?php else: ?>

<table>
    <tr>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Opsi</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0): ?>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>
                <?php if (!empty($row['gambar'])): ?>
                    <img src="gambar/<?= htmlspecialchars($row['gambar']); ?>"
                         alt="<?= htmlspecialchars($row['nama']); ?>"
                         width="100">
                <?php else: ?>
                    Tidak ada gambar
                <?php endif; ?>
            </td>

            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['kategori']); ?></td>
            <td><?= formatRupiah($row['harga_beli']); ?></td>
            <td><?= formatRupiah($row['harga_jual']); ?></td>
            <td><?= htmlspecialchars($row['stok']); ?></td>

            <td>
                <a href="index.php?page=barang/ubah&id=<?= (int)$row['id_barang']; ?>">Ubah</a> |
                <a href="index.php?page=barang/hapus&id=<?= (int)$row['id_barang']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>

    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada data barang.</td>
        </tr>
    <?php endif; ?>
</table>

<?php endif; ?>
