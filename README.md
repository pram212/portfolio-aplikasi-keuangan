# latar belakang
Aplikasi ini dibuat sebagai study kasus untuk melatih dan mengimplementasikan tutorial laravel 6 yang telah saya pelajari. Sekaligus sebagai portofolio.

# fungsi
- berfungsi untuk mengelola data transaksi keuangan
- melihat laporan transaksi perperiode

# fitur
- CRUD transaksi dan kategori transaksi
- pencarian data transaksi
- export/import data transaksi
- dasbor data
- pagination data transaksi
- filter laporan transaksi
- cetak laporan transaksi
- export excel laporan transaksi
- ganti password user
- database relationship (one to many)

# bahasa 
- PHP mysql
- javascript

# framework
- laravel v.6
- bootstrap
- jquery

# library packages
- faker PHP
- maatwebsite/laravel-excel

# design ERD
![ERD-keuangan](https://user-images.githubusercontent.com/75150113/127984571-d35d77c0-6ae7-4a0a-8d0d-d0ab9e5b8014.png)

# requirement
- PHP >= 7.4
- sudah terinstall git
- sudah terinstall composer
- sudah terinstall web server (xampp/mampp/wampp/lainnya)

# instalasi
- buat database dengan nama sc_keuangan
- sesuaikan DB_UERNAME dan DB_PASSWORD di file .env
- buka command prompt ketikan git clone https://github.com/pram212/portfolio-aplikasi-keuangan.git
- ketikan php artisan key:generate
- ketikan composer install
- ketikan php artisan migrate
- ubah file web.php pada bagian Auth::routes(['register'=>false, 'reset'=> false]); menjadi Auth::routes(['reset'=> false]); untuk mengaktifkan register user.
- ketikan php artisan serve
- daftarkan user
- selesai
