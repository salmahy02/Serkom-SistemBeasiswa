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

## Panduan Pengkodean

Agar kode tetap terstruktur dan mudah dimengerti oleh semua anggota tim, kami mengikuti pedoman pengkodean berikut:

### Penamaan File

- Gunakan huruf kecil dan pisahkan kata dengan tanda underscore (\_) untuk penamaan file.
- Berikan nama file yang deskriptif dan mencerminkan fungsi utama dari file tersebut.

### Penamaan Variabel dan Fungsi

- Gunakan gaya camelCase untuk penamaan variabel dan fungsi (contoh: `ipkInput`, `jmlAkademik`).
- Berikan nama yang singkat dan deskriptif, menggambarkan tujuan atau isi variabel/fungsi.

## Tech Stack
- Bootstrap5 or latest version
- Javascript & Jquery
- PHP 7.4 or latest version
- XAMPP v3.3.0 or latest version
- Vs.Code
- Mysql