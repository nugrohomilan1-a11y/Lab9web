# Lab9weba
# Praktikum 9 - PHP Modular

## Deskripsi
Project ini dibuat untuk memenuhi tugas Praktikum 9 Pemrograman Web tentang modularisasi PHP. Project ini menggunakan PHP dan MySQL untuk mengelola data barang.

## Teknologi yang Digunakan
- PHP
- MySQL
- HTML
- CSS
- XAMPP

## Struktur Folder
```text
Lab9Web/
├── index.php
├── config/
│   └── database.php
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── dashboard.php
│   ├── home.php
│   ├── profil.php
│   ├── kontak.php
│   └── 404.php
├── helpers/
│   └── functions.php
├── modules/
│   └── barang/
│       ├── list.php
│       ├── tambah.php
│       ├── ubah.php
│       └── hapus.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
└── gambar/
```

## Fitur
1. Template halaman menggunakan header dan footer.
2. Library function PHP.
3. Routing halaman menggunakan index.php.
4. Halaman 404 jika halaman tidak ditemukan.
5. Menampilkan data barang.
6. Menambahkan data barang.
7. Mengubah data barang.
8. Menghapus data barang.
9. Mengunggah dan menampilkan gambar barang.

## Cara Menjalankan
1. Install dan jalankan Apache serta MySQL melalui XAMPP.
2. Letakkan folder Lab9Web di dalam folder htdocs.
3. Buat database bernama `latihan1` melalui phpMyAdmin.
4. Pastikan tabel `data_barang` sudah tersedia.
5. Sesuaikan konfigurasi database pada `config/database.php`.
6. Buka browser dan akses:

`http://localhost/Lab9Web/`

## Daftar Halaman
- `index.php?page=dashboard`
- `index.php?page=home`
- `index.php?page=profil`
- `index.php?page=kontak`
- `index.php?page=barang/list`

## Kesimpulan
Praktikum ini membantu memahami konsep modularisasi PHP dengan memisahkan konfigurasi database, tampilan, fungsi bantuan, dan proses CRUD ke dalam file yang berbeda agar program lebih terstruktur dan mudah dikelola.
