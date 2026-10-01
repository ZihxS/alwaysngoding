<?php $app_konfigurasi = $this->campuran->konfigurasi(); ?>
<!--<div class="iwa-ribbon"><a href="https://www.iwa.id/2021/winners?sort=2" target="_blank"><img class="img-iwa-ribbon" src="https://www.iwa.id/ribbon/iwa-sotm-ribbon.png" alt="Indonesia Website Awards"></a></div>-->
<div class="kc_fab_wrapper"></div>
<footer class="hideung bg-abu">
  <div class="footer-header">Always Ngoding</div>
  <div class="footer-1"><q>Belajar coding di Always Ngoding</q> - <q>Belajar koding di Always Ngoding</q> - <q>Belajar pemrograman di Always Ngoding</q></div>
  <div class="footer-2"><q>Perluas pengetahuan dan rasakan manfaatnya</q> - <q>Perbanyak kenalan dan rasakan keajaibannya</q></div>
  <div class="footer-3"><q>Belajar coding berbahasa indonesia</q> - <q>Belajar koding berbahasa indonesia</q></div>
  <div class="row footer-4">
    <div class="col-lg-4">
      <div class="judul-col-footer">Belajar</div>
      <ul>
        <li><a href="<?= site_url('belajar-html/teori'); ?>" rel="nofollow" data-toggle="tooltip" title="Belajar HTML Gratis">Belajar HTML</a></li>
        <li><a href="<?= site_url('belajar-css/teori'); ?>" rel="nofollow" data-toggle="tooltip" title="Belajar CSS Gratis">Belajar CSS</a></li>
        <li><a href="<?= site_url('belajar-php/teori'); ?>" rel="nofollow" data-toggle="tooltip" title="Belajar PHP Gratis">Belajar PHP</a></li>
        <li><a href="<?= site_url('belajar-mysql/teori'); ?>" rel="nofollow" data-toggle="tooltip" title="Belajar MySQL Gratis">Belajar MySQL</a></li>
        <li><a href="<?= site_url('belajar'); ?>" rel="nofollow" data-toggle="tooltip" title="Belajar Python Gratis">Belajar Python</a></li>
        <li><a href="<?= site_url('belajar-javascript/teori'); ?>" rel="nofollow" data-toggle="tooltip" title="Belajar JavaScript Gratis">Belajar JavaScript</a></li>
      </ul>
    </div>
    <div class="col-lg-4">
      <div class="judul-col-footer">Komunitas</div>
      <ul>
        <li><a href="<?= site_url('diskusi'); ?>" data-toggle="tooltip" title="Diskusi di Always Ngoding">Diskusi</a></li>
        <li><a href="<?= site_url('partner'); ?>" data-toggle="tooltip" title="Partner Always Ngoding">Partner Kami</a></li>
        <li><a href="<?= site_url('lowongan-kerja'); ?>" data-toggle="tooltip" title="Lowongan Kerja di Bidang Teknologi">Lowongan Kerja</a></li>
        <li><a href="https://forms.gle/qE5LFUu7zKBoonVU9" target="_blank" data-toggle="tooltip" title="Berikan Kritik dan Saran Untuk Always Ngoding">Kritik dan Saran</a></li>
        <?php if (ang_integration_enabled('midtrans')): ?><li><a href="<?= site_url('donasi'); ?>" data-toggle="tooltip" title="Donasi untuk Always Ngoding">Donasi</a></li><?php endif; ?>
        <li><a href="<?= site_url('tim'); ?>" data-toggle="tooltip" title="Tim Always Ngoding">Tim</a></li>
      </ul>
    </div>
    <div class="col-lg-4">
      <div class="judul-col-footer">Informasi</div>
      <ul>
        <li><a href="<?= site_url('tentang'); ?>" data-toggle="tooltip" title="Tentang Always Ngoding">Tentang</a></li>
        <li><a href="<?= site_url('hall-of-fame'); ?>" target="_blank" data-toggle="tooltip" title="Hall of Fame Always Ngoding">Hall of Fame</a></li>
        <li><a href="<?= site_url('pertanyaan-umum'); ?>" data-toggle="tooltip" title="FAQ">Pertanyaan Umum</a></li>
        <li><a href="<?= site_url('syarat-dan-ketentuan'); ?>" data-toggle="tooltip" title="Syarat dan Ketentuan Always Ngoding">Syarat &amp; Ketentuan</a></li>
        <li><a href="<?= site_url('kebijakan-privasi'); ?>" data-toggle="tooltip" title="Kebijakan Privasi Always Ngoding">Kebijakan Privasi</a></li>
        <li><a href="https://wa.me/62<?= substr($app_konfigurasi->whatsapp,1); ?>" target="_blank" data-toggle="tooltip" title="Hubungi Tim Always Ngoding">Hubungi Kami</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-5">
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->facebook; ?>" target="_blank" data-toggle="tooltip" title="Facebook Always Ngoding" aria-label="Facebook Always Ngoding">
      <i class="fab fa-facebook-f"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->twitter; ?>" target="_blank" data-toggle="tooltip" title="Twitter Always Ngoding" aria-label="Twitter Always Ngoding">
      <i class="fab fa-twitter"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->instagram; ?>" target="_blank" data-toggle="tooltip" title="Instagram Always Ngoding" aria-label="Instagram Always Ngoding">
      <i class="fab fa-instagram"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="https://t.me/alwaysngoding" target="_blank" data-toggle="tooltip" title="Komunitas Telegram Always Ngoding" aria-label="Komunitas Telegram Always Ngoding">
      <i class="fab fa-telegram"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="https://discord.gg/scVnD8nHQG" target="_blank" data-toggle="tooltip" title="Discord Always Ngoding" aria-label="Discord Always Ngoding">
      <i class="fab fa-discord"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="https://wa.me/62<?= substr($app_konfigurasi->whatsapp,1); ?>" target="_blank" data-toggle="tooltip" title="Hubungi Tim Always Ngoding" aria-label="Hubungi Tim Always Ngoding">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->github; ?>" target="_blank" data-toggle="tooltip" title="Github Always Ngoding" aria-label="Github Always Ngoding">
      <i class="fab fa-github"></i>
    </a>
    <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->youtube; ?>" target="_blank" data-toggle="tooltip" title="Youtube Always Ngoding" aria-label="Youtube Always Ngoding">
      <i class="fab fa-youtube"></i>
    </a>
  </div>
  <div class="footer-6">Always Ngoding dibuat dengan 👨‍💻 🤔 ❤️ 🎶 ☕<br>Always Ngoding dibuat di kota <span data-toggle="tooltip" title="Bogor">🌧️</span></div>
  <div class="footer-7"><span data-toggle='tooltip' title="All Rights Reserved" style="cursor: default;">&copy; 2019 - <?= date('Y'); ?> Muhammad Saleh Solahudin</span></div>
</footer>
