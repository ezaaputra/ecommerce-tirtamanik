<?php
// proteksi halaman admin dengan fungsi cek login yang ada di libraries simple_login
$this->simple_login->cek_login();
// Gabung Semua Bagian Layout
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');