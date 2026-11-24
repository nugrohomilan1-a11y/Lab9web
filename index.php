
<?php
// Memanggil file fungsi
require_once __DIR__ . '/helpers/functions.php';

// Daftar halaman yang diizinkan
$routes = [
    'dashboard'    => __DIR__ . '/views/dashboard.php',
    'barang/list'  => __DIR__ . '/modules/barang/list.php',
    'barang/tambah'=> __DIR__ . '/modules/barang/tambah.php',
    'barang/ubah'  => __DIR__ . '/modules/barang/ubah.php',
    'barang/hapus' => __DIR__ . '/modules/barang/hapus.php',
    'home'    => __DIR__ . '/views/home.php',
    'profil'  => __DIR__ . '/views/profil.php',
    'kontak'  => __DIR__ . '/views/kontak.php',
];

// Mengambil halaman dari URL
$page = $_GET['page'] ?? 'dashboard';

// Memeriksa halaman yang diminta
if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';
} else {
    $contentFile = $routes[$page];
}

// Menampilkan header
require_once __DIR__ . '/views/header.php';

// Menampilkan isi halaman
require $contentFile;

// Menampilkan footer
require_once __DIR__ . '/views/footer.php';
?>
