# Website Ecommerce Tirta Manik

Sistem informasi penjualan ini ditujukan untuk memudahkan pemilik Toko Tirta Manik dalam melakukan transaksi secara online serta memudahkan dalam melakukan pengolahan laporan transaksi. Sistem ini terbagi menjadi dua bagian, yaitu bagian admin dan bagian user. Admin pada sistem ini adalah pihak pengelola toko sedangkan user adalah pihak pembeli. Pada bagian admin terdapat menu transaksi, produk, data rekening, pengguna, dan konfigurasi web. Pada bagian user terdapat menu kategori produk, keranjang belanja, dan pengaturan akun. Pada menu pengaturan akun terdapat menu riwayat belanja serta pengaturan profil akun user.

Dalam melakukan transaksi, sistem ini memiliki beberapa tahapan. Admin harus harus terlebih dahulu melakukan konfigurasi website user dan memasukkan data produk. Setelah data dimasukkan, pembeli dapat melihat produk dan memasukkan produk ke keranjang melalui halaman user. Pembeli baru dapat melakukan pemesanan produk yang telah dimasukkan ke keranjang setelah melakukan login. Pemilik toko akan menerima laporan pemesanan barang pada menu admin.

## Server Requirements

* XAMPP v3.2.4 (PHP 7.4)

## Installation

Download [program](https://codeload.github.com/ezaaputra/ecommerce-tirtamanik/zip/master).

* Extract ecommerce-tirtamanik-master.zip
* Letakkan folder ecommerce-tirtamanik-master kedalam C:\xampp\htdocs
* Nyalakan server apache dan mysql pada xampp
* Buka browser dan pergi ke alamat localhost/phpmyadmin
* Import tirtamanik_db.sql (ada di dalam folder) kedalam database pada phpMyAdmin

## Usage

Buka browser dan akses halaman berikut
* Halaman user: localhost/ecommerce-tirtamanik-master
* Halaman admin: localhost/ecommerce-tirtamanik-master/login (username: eza.a.putra | password: 123)
