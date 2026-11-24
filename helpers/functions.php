
<?php

// 1. Mengubah angka menjadi format Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// 2. Menghitung harga setelah diskon
function hitungDiskon($harga, $persen) {
    return $harga - ($harga * $persen / 100);
}

// 3. Memvalidasi alamat email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// 4. Meringkas teks
function ringkasTeks($teks, $batas = 50) {
    if (strlen($teks) > $batas) {
        return substr($teks, 0, $batas) . "...";
    }

    return $teks;
}

?>
