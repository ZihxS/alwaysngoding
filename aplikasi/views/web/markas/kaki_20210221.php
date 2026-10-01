<?php $app_konfigurasi = $this->campuran->konfigurasi(); ?>
<div class="kc_fab_wrapper"></div>
<footer class="hideung">
  <div class="footer-header">Always Ngoding</div>
  <div class="footer-1"><q>Belajar coding di Always Ngoding</q> - <q>Belajar koding di Always Ngoding</q> - <q>Belajar pemrograman di Always Ngoding</q></div>
  <div class="footer-2"><q>Perluas pengetahuan dan rasakan manfaatnya</q> - <q>Perbanyak kenalan dan rasakan keajaibannya</q></div>
  <div class="footer-3"><q>Belajar coding berbahasa indonesia</q> - <q>Belajar koding berbahasa indonesia</q></div>
  <div class="row footer-4">
    <div class="col-lg-4">
      <div class="judul-col-footer">Belajar</div>
      <ul>
        <li><a href="<?= site_url('artikel'); ?>">Artikel</a></li>
        <li><a href="<?= site_url('belajar-html/teori'); ?>" rel="nofollow">Belajar HTML</a></li>
        <li><a href="<?= site_url('belajar-css/teori'); ?>" rel="nofollow">Belajar CSS</a></li>
        <li><a href="<?= site_url('belajar-php/teori'); ?>" rel="nofollow">Belajar PHP</a></li>
        <li><a href="<?= site_url('belajar-mysql/teori'); ?>" rel="nofollow">Belajar MySQL</a></li>
      </ul>
    </div>
    <div class="col-lg-4">
      <div class="judul-col-footer">Komunitas</div>
      <ul>
        <li><a href="<?= site_url('diskusi'); ?>">Diskusi</a></li>
        <li><a href="<?= site_url('partner'); ?>">Partner Kami</a></li>
        <li><a href="<?= site_url('lowongan-kerja'); ?>">Lowongan Kerja</a></li>
        <li><a href="https://forms.gle/qE5LFUu7zKBoonVU9" target="_blank">Kritik dan Saran</a></li>
        <li><a href="https://discord.gg/scVnD8nHQG" target='_blank'>Server Discord</a></li>
        <?php if (ang_integration_enabled('midtrans')): ?><li><a href="<?= site_url('donasi'); ?>">Donasi</a></li><?php endif; ?>
        <li><a href="<?= site_url('tim'); ?>">Tim</a></li>
      </ul>
    </div>
    <div class="col-lg-4">
      <div class="judul-col-footer">Informasi</div>
      <ul>
        <li><a href="<?= site_url('tentang'); ?>">Tentang</a></li>
        <li><a href="<?= site_url('pertanyaan-umum'); ?>">Pertanyaan Umum</a></li>
        <li><a href="<?= site_url('syarat-dan-ketentuan'); ?>">Syarat &amp; Ketentuan</a></li>
        <li><a href="<?= site_url('kebijakan-privasi'); ?>">Kebijakan Privasi</a></li>
        <li><a href="https://wa.me/62<?= substr($app_konfigurasi->whatsapp,1); ?>" target="_blank">Hubungi Kami</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-5">
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->facebook; ?>" target="_blank">
      <i class="fab fa-facebook-f"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->twitter; ?>" target="_blank">
      <i class="fab fa-twitter"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->instagram; ?>" target="_blank">
      <i class="fab fa-instagram"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="https://wa.me/62<?= substr($app_konfigurasi->whatsapp,1); ?>" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->github; ?>" target="_blank">
      <i class="fab fa-github"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->youtube; ?>" target="_blank">
      <i class="fab fa-youtube"></i>
    </a>
  </div>
  <div class="footer-6">Always Ngoding dibuat dengan 👨‍💻 🤔 ❤️ 🎶 ☕<br>Always Ngoding dibuat di kota 🌧️</div>
  <div class="footer-7"><span data-toggle='tooltip' title="All Rights Reserved" style="cursor: default;">&copy; 2019 - <?= date('Y'); ?> Muhammad Saleh Solahudin</span></div>
</footer>