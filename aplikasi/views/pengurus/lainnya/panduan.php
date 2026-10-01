<!-- ELAPSED:{elapsed_time} DETIK | MEMORY USAGE:{memory_usage} -->
<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /*
  Created And Writed BY Muhammad Saleh Solahudin
  Dont Change Credits
  Dont Steal My Logic
  Note: Script / Syntax / Code Bisa Di CoPas, Tetapi Keahlian, Pengetahuan, SkillS, Imagination And Logic Tidak Bisa Di CoPas :D
  Special ThankS To: (Allah S.W.T | My Father and Mother | <3 KarmilaSriwulan <3)
  Kata-kata Mutiara: "Stay Hungry","Stay Tired","Stay Code","Stay Foolish".
  */

  $nama_penggunanya = $this->session->ang_nama_pengguna;
  $jenis_kelaminnya = strtolower($this->pengguna->ambil_jenis_kelamin($nama_penggunanya));
  $foto_pengurusnya = $this->pengguna->ambil_foto($nama_penggunanya);
  $foto_pengurusnya = $foto_pengurusnya !== NULL ? $foto_pengurusnya : "{$jenis_kelaminnya}.png";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->load->view('head-pengurus', NULL, FALSE); ?>
    <title>Area Pengurus - Always Ngoding</title>
    <link href="<?= base_url('media/website/logo.png'); ?>" rel="icon" type="image/x-icon">
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/animate-css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="theme-red">
    <?php $this->load->view('pengurus/markas/atas'); ?>
    <section>
      <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
          <div class="image">
            <img src="<?= base_url('media/foto-pengguna/'.$foto_pengurusnya); ?>" width="48" height="48" alt="Foto Pengurus">
          </div>
          <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->pengguna->ambil_nama_lengkap($nama_penggunanya); ?>
            </div>
            <div class="email">
              <?= $nama_penggunanya; ?>
            </div>
            <div class="btn-group user-helper-dropdown hidden-xs hidden-sm">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/data-diri'); ?>"><i class="material-icons">person</i>Data Diri</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?= site_url('area-pengurus/keluar'); ?>"><i class="material-icons">input</i>Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('pengurus/markas/menu'); ?>
      </aside>
      <?php $this->load->view('pengurus/markas/tema'); ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <h2 class="judul-halaman">PANDUAN</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li class="active">
                  <i class="material-icons">help</i> Panduan
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div id="panduan">
          <div class="card">
            <div class="header">
              <h2>CARA MENGUBAH DATA DIRI</h2>
            </div>
            <div class="body">
              <ol class="m-b-0">
                <li>Silahkan menuju ke halaman: <a href="<?= site_url('area-pengurus/data-diri'); ?>" target="_blank"><?= site_url('area-pengurus/data-diri'); ?></a>.</li>
                <li>
                  Masukkan data diri Anda:
                  <ul>
                    <li>Foto (boleh dikosongkan jika tidak ingin diubah)</li>
                    <li>Nama Lengkap</li>
                    <li>Tentang</li>
                    <li>Alamat</li>
                    <li>Website Pribadi (boleh dikosongkan jika belum ada)</li>
                    <li>Akun Media Sosial</li>
                    <li>
                      Jenis Kelamin:
                      <ul>
                        <li>Laki-laki</li>
                        <li>Perempuan</li>
                      </ul>
                    </li>
                    <li>
                      Status:
                      <ul>
                        <li>Lajang</li>
                        <li>Berpacaran</li>
                        <li>Nikah</li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>Klik tombol <q>UBAH DATA</q> dan selesai 😉</li>
              </ol>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h2>CARA MENGUBAH KATA SANDI</h2>
            </div>
            <div class="body">
              <ol class="m-b-0">
                <li>Silahkan menuju ke halaman: <a href="<?= site_url('area-pengurus/data-diri'); ?>" target="_blank"><?= site_url('area-pengurus/data-diri'); ?></a>.</li>
                <li>
                  Pastikan kalian memilih menu <q>Ganti Kata Sandi</q> (<a href="https://ibb.co/bdwmQx2" target="_blank">lihat petunjuk gambarnya</a>).
                </li>
                <li>
                  Masukkan:
                  <ul>
                    <li>Kata Sandi Lama Anda</li>
                    <li>Kata Sandi Baru Anda</li>
                    <li>Konfirmasi Kata Sandi Baru Anda</li>
                  </ul>
                </li>
                <li>Klik tombol <q>UBAH KATA SANDI</q> dan selesai 😉</li>
              </ol>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h2>CARA MEMBUAT ARTIKEL</h2>
            </div>
            <div class="body">
              <ol class="m-b-0">
                <li>Silahkan menuju ke halaman: <a href="<?= site_url('area-pengurus/artikel/tambah'); ?>" target="_blank"><?= site_url('area-pengurus/artikel/tambah'); ?></a>.</li>
                <li>Masukkan judul artikel.</li>
                <li>Pilih kategori artikel.</li>
                <li>Masukkan label artikel (maksimal 10).</li>
                <li>
                  Masukkan isi artikel di text editor yang telah kami sediakan, di text editor yang kami sediakan kalian bisa:
                  <ul>
                    <li>Copy, paste, find dan replace text.</li>
                    <li>
                      Menambah gambar, Anda harus mengupload dulu di:
                      <ul>
                        <li><a href="https://imgur.com/upload" target="_blank">https://imgur.com/upload</a></li>
                        <li><a href="https://imgbb.com/upload" target="_blank">https://imgbb.com/upload</a></li>
                      </ul>
                    </li>
                    <li>Membuat tabel.</li>
                    <li>Mencantumkan link.</li>
                    <li>Mencantumkan media.</li>
                    <li>Mencantumkan kode/syntax/script.</li>
                    <li>
                      Memformat text antara lain:
                      <ul>
                        <li>Membuat cetak tebal.</li>
                        <li>Membuat cetak miring.</li>
                        <li>Memberi garis bawah.</li>
                        <li>Mengatur align text.</li>
                        <li>Mencoret text.</li>
                        <li>Menggunakan heading html (h1 ~ h6).</li>
                        <li>Mengubah warna text.</li>
                      </ul>
                    </li>
                    <li>Mengubah warna latar belakang.</li>
                    <li>Melakukan preview.</li>
                  </ul>
                </li>
                <li>
                  Pilih aksi:
                  <ul>
                    <li>SIMPAN SEBAGAI KONSEP (jika belum selesai dan jika belum ingin di posting).</li>
                    <li>AJUKAN ARTIKEL (jika ingin langsung di posting).</li>
                  </ul>
                </li>
                <li>Klik tombol <q>PROSES</q> dan selesai 😉</li>
              </ol>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h2>CARA MEMBUKA DISKUSI</h2>
            </div>
            <div class="body">
              <ol class="m-b-0">
                <li>Silahkan menuju ke halaman: <a href="<?= site_url('area-pengurus/diskusi/tambah'); ?>" target="_blank"><?= site_url('area-pengurus/diskusi/tambah'); ?></a>.</li>
                <li>Masukkan judul diskusi.</li>
                <li>Masukkan label diskusi (maksimal 10).</li>
                <li>
                  Masukkan isi diskusi di text editor yang telah kami sediakan, di text editor yang kami sediakan kalian bisa:
                  <ul>
                    <li>Copy, paste.</li>
                    <li>
                      Menambah gambar, Anda harus mengupload dulu di:
                      <ul>
                        <li><a href="https://imgur.com/upload" target="_blank">https://imgur.com/upload</a></li>
                        <li><a href="https://imgbb.com/upload" target="_blank">https://imgbb.com/upload</a></li>
                      </ul>
                    </li>
                    <li>Membuat tabel.</li>
                    <li>Mencantumkan link.</li>
                    <li>Mencantumkan media.</li>
                    <li>Mencantumkan kode/syntax/script.</li>
                    <li>
                      Memformat text antara lain:
                      <ul>
                        <li>Membuat cetak tebal.</li>
                        <li>Membuat cetak miring.</li>
                        <li>Memberi garis bawah.</li>
                        <li>Mencoret text.</li>
                      </ul>
                    </li>
                    <li>Melakukan preview.</li>
                  </ul>
                </li>
                <li>Klik tombol <q>TAMBAH</q> dan selesai 😉</li>
              </ol>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h2>CARA MEMPOSTING LOWONGAN KERJA</h2>
            </div>
            <div class="body">
              <ol class="m-b-0">
                <li>Silahkan menuju ke halaman: <a href="<?= site_url('area-pengurus/lowongan-kerja/tambah'); ?>" target="_blank"><?= site_url('area-pengurus/lowongan-kerja/tambah'); ?></a>.</li>
                <li>Masukkan nama perusahaan.</li>
                <li>Masukkan alamat atau lokasi perusahaan.</li>
                <li>Masukkan posisi pekerjaan.</li>
                <li>
                  Masukkan catatan untuk calon pelamar di text editor yang telah kami sediakan, di text editor yang kami sediakan kalian bisa:
                  <ul>
                    <li>Copy, paste.</li>
                    <li>
                      Memformat text antara lain:
                      <ul>
                        <li>Membuat cetak tebal.</li>
                        <li>Membuat cetak miring.</li>
                        <li>Memberi garis bawah.</li>
                        <li>Mengatur align text.</li>
                        <li>Mencoret text.</li>
                        <li>Menggunakan heading html (h1 ~ h6).</li>
                        <li>Mengubah warna text.</li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  Masukkan syarat dan ketentuan untuk calon pelamar di text editor yang telah kami sediakan, di text editor yang kami sediakan kalian bisa:
                  <ul>
                    <li>Copy, paste.</li>
                    <li>
                      Memformat text antara lain:
                      <ul>
                        <li>Membuat cetak tebal.</li>
                        <li>Membuat cetak miring.</li>
                        <li>Memberi garis bawah.</li>
                        <li>Mengatur align text.</li>
                        <li>Mencoret text.</li>
                        <li>Menggunakan heading html (h1 ~ h6).</li>
                        <li>Mengubah warna text.</li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  Masukkan nilai tambah untuk calon pelamar di text editor yang telah kami sediakan, di text editor yang kami sediakan kalian bisa:
                  <ul>
                    <li>Copy, paste.</li>
                    <li>
                      Memformat text antara lain:
                      <ul>
                        <li>Membuat cetak tebal.</li>
                        <li>Membuat cetak miring.</li>
                        <li>Memberi garis bawah.</li>
                        <li>Mengatur align text.</li>
                        <li>Mencoret text.</li>
                        <li>Menggunakan heading html (h1 ~ h6).</li>
                        <li>Mengubah warna text.</li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>Masukkan gaji minimal (dalam rupiah).</li>
                <li>Masukkan gaji maksimal (dalam rupiah).</li>
                <li>Upload bangunan atau gedung atau kantor perusahaan.</li>
                <li>Upload poster lowongan kerja.</li>
                <li>Masukkan kemana CV harus dikirim (bisa berupa alamat perusahaan atau alamat website).</li>
                <li>Tentukan tanggal jatuh tempo lowongan kerja.</li>
                <li>Klik tombol <q>TAMBAH</q> untuk mengajukan lowongan kerja dan selesai 😉</li>
              </ol>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h2>CARA MENJAWAB SOAL DI ALWAYS NGODING</h2>
            </div>
            <div class="body">
              <ul class="m-b-0">
                <li>Untuk tipe soal ke 1 dan 2 kalian diharuskan untuk menjawab soal dengan cara mengisi semua inputan yang sudah disediakan.</li>
                <li>Untuk tipe soal ke 3 kalian diharuskan untuk menjawab soal dengan cara memilih hanya satu pilihan.</li>
                <li>Untuk tipe soal ke 4 kalian diharuskan untuk menjawab soal dengan cara memilih satu atau lebih pilihan.</li>
                <li>Untuk tipe soal ke 5 kalian diharuskan untuk menjawab soal dengan cara merangkai rangkaian secara berurutan.</li>
              </ul>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h2>CARA BERDONASI UNTUK ALWAYS NGODING</h2>
            </div>
            <div class="body">
              <ol>
                <li>Silahkan menuju ke halaman: <a href="<?= site_url('donasi'); ?>" target="_blank"><?= site_url('donasi'); ?></a>.</li>
                <li>Klik tombol <q>Saya Ingin Donasi</q>.</li>
                <li>Masukkan jumlah yang ingin Anda donasikan (dalam rupiah dan minimal Rp10.000,-).</li>
                <li>Masukkan catatan untuk Always Ngoding (opsional).</li>
                <li>
                  Anda bisa donasi atas nama:
                  <ul>
                    <li>Akun Always Ngoding Anda (akan ditampilkan di halaman: <a href="<?= site_url('tim'); ?>" target="_blank"><?= site_url('tim'); ?></a>).</li>
                    <li>Anonim (tidak akan ditampilkan di halaman: <a href="<?= site_url('tim'); ?>" target="_blank"><?= site_url('tim'); ?></a>).</li>
                  </ul>
                </li>
                <li>Klik tombol <q>Submit</q>.</li>
                <li>
                  Pilih cara pembayaran:
                  <ul>
                    <li>Jika kalian ingin donasi menggunakan e-wallet (GoPay, OVO, DANA, TCASH, ShopeePay dan lain-lain) maka pilih <q>GoPay/e-Wallet lainnya</q>.</li>
                    <li>Jika kalian ingin donasi menggunakan saldo di rekening bank Anda maka pilih <q>ATM/Bank Trasnfer</q>.</li>
                  </ul>
                </li>
                <li>Ikuti langkah-langkah selanjutnya.</li>
                <li>Lakukan pembayaran dan selesai 😉</li>
              </ol>
              <div class="alert alert-success m-b-0">
                Jika menggunakan e-Wallet kalian bisa scan QR yang telah disediakan melalui GoPay, OVO, DANA, TCASH, ShopeePay (jadi bukan hanya GoPay saja).
              </div>
            </div>
          </div>
          <div class="alert alert-info" style="margin-top: 0; margin-bottom: 5px;">
            Untuk kedepannya halaman panduan akan disertakan dengan video penjelasannya (agar lebih jelas). Kami belum bisa membuat video panduan untuk saat ini dikarenakan belum ada tempat dan alat yang mumpuni.
          </div>
          <div class="alert alert-info">
            Kami akan selalu memperbaharui halaman ini jika ada pembaharuan yang harus kami sesuaikan dengan halaman ini.
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
  </body>
</html>
