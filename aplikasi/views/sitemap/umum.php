<?= '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url>
    <loc><?= site_url(); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('belajar'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('belajar-html/teori'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('belajar-css/teori'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('belajar-php/teori'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('belajar-mysql/teori'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('belajar-javascript/teori'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.9</priority>
    <changefreq>daily</changefreq>
  </url>
  <url>
    <loc><?= site_url('masuk'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.8</priority>
    <changefreq>daily</changefreq>
  </url>
  <?php if (ang_integration_enabled('smtp')): ?>
<url>
    <loc><?= site_url('daftar'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.7</priority>
    <changefreq>daily</changefreq>
  </url>
  <?php endif; ?>
  <?php if (ang_integration_enabled('smtp')): ?>
<url>
    <loc><?= site_url('lupa-kata-sandi'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.6</priority>
    <changefreq>daily</changefreq>
  </url>
  <?php endif; ?>
  <url>
    <loc><?= site_url('lowongan-kerja'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.5</priority>
    <changefreq>hourly</changefreq>
  </url>
  <?php foreach ($loker as $dl): ?>
    <url>
      <loc><?= site_url("lowongan-kerja/{$dl->id_loker}/{$dl->slug}"); ?></loc>
      <lastmod><?= date('Y-m-d\TH:i:sP', strtotime($dl->terakhir_diperbaharui)); ?></lastmod>
      <priority>0.5</priority>
      <changefreq>hourly</changefreq>
    </url>
	<?php endforeach; ?>
  <?php if (ang_integration_enabled('midtrans')): ?>
<url>
    <loc><?= site_url('donasi'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.5</priority>
    <changefreq>monthly</changefreq>
  </url>
  <?php endif; ?>
  <url>
    <loc><?= site_url('tentang'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.4</priority>
    <changefreq>monthly</changefreq>
  </url>
  <url>
    <loc><?= site_url('pertanyaan-umum'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.4</priority>
    <changefreq>monthly</changefreq>
  </url>
  <url>
    <loc><?= site_url('syarat-dan-ketentuan'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.4</priority>
    <changefreq>monthly</changefreq>
  </url>
  <url>
    <loc><?= site_url('partner'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.3</priority>
    <changefreq>monthly</changefreq>
  </url>
  <url>
    <loc><?= site_url('tim'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.3</priority>
    <changefreq>monthly</changefreq>
  </url>
  <url>
    <loc><?= site_url('kebijakan-privasi'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.1</priority>
    <changefreq>monthly</changefreq>
  </url>
</urlset>