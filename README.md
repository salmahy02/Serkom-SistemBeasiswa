# form-beasiswa
Form Pendaftaran Beasiswa Untuk Mahasiswa Sederhana &amp; Simple Dengan PHP 

## Details
- IPK tidak diinput tetapi otomatis muncul, ketika klik registrasi beasiswa.
- IPK <= 3 maka tidak bisa melanjutkan pilihan beasiswa dan elemen pilihan beassiwa, upload berkas dan tombol simpan tidak aktif.
- IPK >= 3 maka secara otomatis berada pilihan beasiswa.
- Syarat upload berkas berupa pdf, jpg, & zip.
- di Menu hasil terdapat `Status Ajuan` diasumsikan setelah daftar `belum terverifikasi`.

## Struktur Direktori

Berikut adalah struktur direktori yang digunakan dalam proyek ini:

- `index.php`: Halaman utama aplikasi, memberikan informasi umum tentang program beasiswa.
- `pendaftaran.php`: Halaman formulir pendaftaran beasiswa.
- `tabel_pendaftaran.php`: Halaman hasil pendaftaran beasiswa, menampilkan informasi pendaftaran terakhir.
- `verifikasi.php`: Halaman untuk mengedit verifikasi status beasiswa atau status ajuan.
- `grafik.php`: Halaman untuk membuat visualisasi data pendaftaran dalam bentuk grafik.
- `proses_pendaftaran.php`: Halaman untuk memproses pendaftaran beasiswa

## Tech Stack
- Bootstrap5 or latest version
- Javascript & Jquery
- PHP 7.4 or latest version
- XAMPP v3.3.0 or latest version
- Vs.Code
- Mysql