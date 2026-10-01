<?= '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
    <loc><?= site_url('diskusi'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.6</priority>
    <changefreq>hourly</changefreq>
  </url>
  <url>
    <loc><?= site_url('diskusi/terpopuler'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.6</priority>
    <changefreq>hourly</changefreq>
  </url>
  <url>
    <loc><?= site_url('diskusi/belum-dijawab'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.6</priority>
    <changefreq>hourly</changefreq>
  </url>
	<?php foreach ($data as $hasil): ?>
    <url>
      <loc><?= site_url("diskusi/{$hasil->id_diskusi}/{$hasil->slug}"); ?></loc>
      <lastmod><?= date('Y-m-d\TH:i:sP', strtotime($hasil->terakhir_diperbaharui)); ?></lastmod>
      <priority>0.6</priority>
      <changefreq>hourly</changefreq>
    </url>
	<?php endforeach; ?>
</urlset>