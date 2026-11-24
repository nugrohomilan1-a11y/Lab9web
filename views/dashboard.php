
<h2>Dashboard</h2>

<p>Selamat datang di aplikasi pengelolaan data barang.</p>

<div class="dashboard-card">
    <h3>Contoh Library Function</h3>

    <p>Harga barang: <?= formatRupiah(150000); ?></p>

    <p>Harga setelah diskon 10%:
        <?= formatRupiah(hitungDiskon(150000, 10)); ?>
    </p>

    <p>Status email:
        <?= validasiEmail("milan@gmail.com") ? "Valid" : "Tidak valid"; ?>
    </p>

    <p>Ringkasan teks:
        <?= htmlspecialchars(ringkasTeks("Aplikasi pengelolaan data barang Praktikum 9", 25)); ?>
    </p>
</div>

<br>

<a href="index.php?page=barang/list">Lihat Data Barang</a>
