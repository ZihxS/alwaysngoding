<?= '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
    <loc><?= site_url('artikel'); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.7</priority>
    <changefreq>hourly</changefreq>
  </url>
  <?php foreach ($kategori as $k): ?>
    <url>
      <loc><?= site_url('artikel/kategori/'.str_replace(' ', '-', $k->kategori)); ?></loc>
      <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
      <priority>0.7</priority>
      <changefreq>hourly</changefreq>
    </url>
	<?php endforeach; ?>
	<?php foreach ($data as $hasil): ?>
    <url>
      <loc><?= site_url("artikel/{$hasil->id_artikel}/{$hasil->slug}"); ?></loc>
      <lastmod><?= date('Y-m-d\TH:i:sP', strtotime($hasil->terakhir_diperbaharui)); ?></lastmod>
      <priority>0.7</priority>
      <changefreq>hourly</changefreq>
    </url>
	<?php endforeach; ?>
</urlset>